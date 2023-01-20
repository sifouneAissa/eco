<?php

namespace App\Http\Middleware;

use App\Models\Blog;
use App\Models\Currency;
use App\Models\OrderDetail;
use App\Models\ShoppingSession;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        $cLocale= Session::get('locale') ? Session::get('locale') : config("app.locale");

        $currency = Session::get('currency') ? Session::get('currency') : config('app.currency');

        $code = Currency::where("code",$currency)->first()->currency_code;
        $notifications = auth()->user()?->notifications()->orderBy('id','desc')->get();
        $wcount = auth()->user()?->wishlists?->count();

        $shopping = getShoppingSession();
        if($notifications)
            $notifications = $notifications->map(function ($item){
                $item['date'] = translateDate($item->created_at);
                return $item;
            });

        $client_secret = null;

        try {
            if($user = auth()->user()) $client_secret = $user?->createSetupIntent()->client_secret;
            else $client_secret = app(User::class)?->createSetupIntent()->client_secret;
        }catch (\Exception $exception){}

        $addresses = auth()->user()?->addresses;

        if(!$addresses) $addresses = $shopping?->user?->addresses;
        $set_password = false;

        $buyer = Session::get('buyer');

        if($buyer) {
            $time = OrderDetail::find($buyer['order_id'])->created_at;
            $date = Carbon::now();
            $min = $date->diffInMinutes($time);
            if($min >= 10) {
                Session::forget('buyer');
                $buyer = null;
            };
        }
//        if($min >= 10) abort(404);
        if(Session::get('setPassword'))
            $set_password = true;
//        dd($shopping->toArray());
        return array_merge(parent::share($request), [
            //
            'locale' => $cLocale,
            'locales' => config('app.locales.all'),
            'auth' => auth()->user(),
            'notifications' => $notifications,
            'isRtl' => isRtl($cLocale),
            'currency' => $currency,
            'currencies' => config('app.currencies'),
            'currency_code' => $code,
            'shopping_session' => $shopping,
            'STRIPE_KEY' => env('STRIPE_KEY'),
            'client_secret' => $client_secret,
            'addresses' => $addresses,
            'setPassword' => $set_password,
            'logo' => getSetting('logo')->fimage,
            'login_image' => getSetting('login_image')->fimage,
            'register_image' => getSetting('register_image')->fimage,
            'address' => getSetting('address')->address,
            'email' => getSetting('email')->email,
            'phone' => getSetting('phone')->phone,
            'wcount' => $wcount,
            'buyer' => $buyer,
            'company_name' => getSetting('company_name')->company_name,
            'shopping_user' => $shopping?->user,
            'blogs' => Blog::query()->get(),
        ]);
    }
}
