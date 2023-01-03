<?php

namespace App\Http\Controllers;

use App\Events\NewOrder;
use App\Http\Requests\UserOrderRequest;
use App\Models\CartItem;
use App\Models\InventoryOrderItem;
use App\Models\OrderDetail;
use App\Models\OrderItem;
use App\Models\PaymentDetail;
use App\Models\Product;
use App\Models\ShoppingSession;
use App\Models\User;
use App\Models\UserAddress;
use Carbon\Carbon;
use Faker\Provider\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class UserOrderController extends Controller
{
    public function store(UserOrderRequest $request)
    {

        return startTransaction(function () use ($request) {

            $withProduct = $request->input('withProduct');

            if ($withProduct) return $this->payOnProduct($request);

            $shopping = getShoppingSession();
            $cartItems = $shopping->cartItems;
            $q_av = true;

            foreach ($cartItems as $item) {
                $product = Product::find($item->product_id);
                $q_av = $product->isA()['remain'] >= $item->quantity;
                if (!$q_av) break;
            }

            if (!$q_av)
                return redirect()->back()->withErrors([
                    'error' => 'Quantity is not available'
                ]);

            $user = $request->user();
            $inputs = $request->all();

            if (!auth()->user()) {
                // create address , account for the user
                $paymentInfo = $request->input('paymentInfo');
                if(!$shopping->user_id)
                    $user = User::query()->create(filterRequest($paymentInfo, User::class));
                else $user = User::find($shopping->user_id);

                if (is_array($addressInputs = $request->input('address_id'))) {
                    $addressInputs['user_id'] = $user->id;
                    $inputs['address_id'] = UserAddress::query()->create(filterRequest($addressInputs, UserAddress::class))->id;
                }
            }


            $inputs['user_id'] = $user->id;
            $inputs['total'] = $shopping->ptotal;
            // if payment method === credit
            $this->stripeAmount($shopping->ptotal, $request, $user);
            // create the order
            $order = OrderDetail::query()->create(filterRequest($inputs, OrderDetail::class));

            $isPaid = $request->input('provider') === 'payondelivery';
            // create order items
            foreach ($cartItems as $item) {
                $orderItem = OrderItem::query()->create([
                    'quantity' => $item->quantity,
                    'product_id' => $item->product_id,
                    'order_id' => $order->id,
                ]);
                // attach every order item with his inventory
                InventoryOrderItem::query()->create([
                    'inventory_id' => $item->product->product_inventory_id,
                    'order_item_id' => $orderItem->id
                ]);

            }

            // create the payment
            PaymentDetail::query()->create([
                'amount' => $shopping->ptotal,
                'provider' => $request->input('provider'),
                'status' => $isPaid ? 'waiting' : 'paid',
                'order_id' => $order->id
            ]);
            // make it not the current
            $shopping->is_current = false;
            $shopping->save();

            ShoppingSession::query()->create([
                'user_id' => $user->id,
                'total' => 0,
                'current' => true,
                'ip' => $request->ip()
            ]);


            event(new NewOrder($order));


            return redirect()->route('listing', [
                'query' => $order->products->first()->category->name
            ])->with('thanks',true);
        });

    }

    public function addProduct(Request $request)
    {

        $item = $request->all();

        $is_auth = auth()->user();
        if ($is_auth)
            $s_session = auth()->user()->shopping_session;


        else {
            $s_session = ShoppingSession::where('ip', $request->ip())->first();
            $s_session->cartItems()->delete();
            $s_session->is_current = true;
            $s_session->save();
        }

        if (!$s_session) {
            $data = [
                'total' => 0,
                'user_id' => $is_auth ? auth()->user()->id : 0
            ];

            if (!$is_auth) {
                $data ['type'] = 'guest';
                $data['ip'] = $request->ip();
            }

            $s_session = ShoppingSession::create($data);
        }

        // add item
        CartItem::create([
            'quantity' => isset($item['quantity']) ? $item['quantity'] : 1,
            'product_id' => $item['product_id'],
            'shopping_session_id' => $s_session->id
        ]);
    }


    public function checkout()
    {

        $callbackIsA = function ($item) {
            return $item->isA()['isA'];
        };

        $callback = function ($item) {
            $item['isA'] = $item->isA();
            $item['quantity'] = 1;
            return $item;
        };


        $products = null;

        $shopping_session = getShoppingSession();

//        $addresses = auth() ?->user() ?->addresses;
//        if(!$addresses) $addresses = $shopping_session?->user?->addresess;

        $categories = $shopping_session ?->products->map(function ($item) {
        return $item->category->id;
    })->unique();

        if ($categories?->isNotEmpty()) $products = Product::query()->whereIn('product_category_id', $categories)->get()->filter($callbackIsA)->map($callback);
        else $products = Product::query()->get()->filter($callbackIsA)->map($callback);


        return Inertia::render('Checkout', [
//            'addresses' => $addresses,
            'products' => $products
        ]);
    }


    private function stripeAmount($amount, $request, $user)
    {

        $is_credit = $request->input('provider') === 'credit';

        if ($is_credit) {
            $paymentInfo = $request->input('paymentInfo');
            $paymentMethod = $paymentInfo['paymentMethod'];

            try {
                $user->createOrGetStripeCustomer();
                if (!$user->hasPaymentMethod())
                    $user->addPaymentMethod($paymentMethod);
                else
                    $user->updateDefaultPaymentMethod($paymentMethod);

                $user->charge(priceByDollar($amount) * 100, $paymentMethod);

            } catch (\Exception $exception) {
                dd($exception->getMessage());
            }
        }

    }

    public function payOnProduct($request)
    {

        $data = $request->input('withProduct');
        $product_id = $data['product_id'];
        $quantity = $data['quantity'];
        $product = Product::find($product_id);
        $shopping_session = getShoppingSession();

        if ($product->isA()['remain'] < $quantity)
            return redirect()->back()->withErrors([
                'error' => 'Quantity is not available'
            ]);

        $user = $request->user();
        $inputs = $request->all();

        if (!auth()->user()) {
            // create address , account for the user
            $paymentInfo = $request->input('paymentInfo');
            if(!$shopping_session->user_id)
            $user = User::query()->create(filterRequest($paymentInfo, User::class));
            else $user = User::find($shopping_session->user_id);

            if (is_array($addressInputs = $request->input('address_id'))) {
                $addressInputs['user_id'] = $user->id;
                $inputs['address_id'] = UserAddress::query()->create(filterRequest($addressInputs, UserAddress::class))->id;
            }
        }

        $inputs['user_id'] = $user->id;
        $inputs['total'] = $product->price * $quantity;
        // if payment method === credit
        $this->stripeAmount($product->price * $quantity, $request, $user);
        // create the order
        $order = OrderDetail::query()->create(filterRequest($inputs, OrderDetail::class));

        $isPaid = $request->input('provider') === 'payondelivery';

        $orderItem = OrderItem::query()->create([
            'quantity' => $quantity,
            'product_id' => $product_id,
            'order_id' => $order->id,
        ]);
        // attach every order item with his inventory
        InventoryOrderItem::query()->create([
            'inventory_id' => $product->product_inventory_id,
            'order_item_id' => $orderItem->id
        ]);


        // create the payment
        PaymentDetail::query()->create([
            'amount' => $inputs['total'],
            'provider' => $request->input('provider'),
            'status' => $isPaid ? 'waiting' : 'paid',
            'order_id' => $order->id
        ]);

        $shopping_session->user_id = $user->id;
        $shopping_session->save();

        event(new NewOrder($order));

        return redirect()->route('listing', [
            'query' => $order->products->first()->category->name
        ])->with('thanks',true);

    }
}
