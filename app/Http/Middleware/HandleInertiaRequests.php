<?php

namespace App\Http\Middleware;

use App\Events\NewMessage;
use App\Events\NewOrder;
use App\Events\UpdateOrder;
use App\Models\Currency;
use App\Models\OrderDetail;
use App\Models\ShoppingSession;
use App\Models\User;
use App\Notifications\NewMessageNotification;
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

        $notifications = auth()->user()?->notifications()->whereIn('type',[
                \App\Notifications\NewOrder::class,
                \App\Notifications\UpdateOrder::class
        ])->orderBy('id','desc')->get();


        $messages = auth()->user()?->notifications()->whereIn('type',[
                 NewMessageNotification::class
        ])->orderBy('id','desc')->get();

        $wcount = auth()->user()?->wishlists?->count();

        $shopping = getShoppingSession();

        if($notifications)
            $notifications = $notifications->map(function ($item){
                $item['date'] = translateDate($item->created_at);
                return $item;
            });
        if($messages)
            $messages = $messages->map(function ($item){
                $item['date'] = translateDate($item->created_at);
                return $item;
            });

//        dd($messages->pluck('data.message'));

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
            'nmessages' => $messages,
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
            'facebook' => getSetting('facebook_link')->facebook,
            'instagram' => getSetting('instagram_link')->instagram,
            'twitter' => getSetting('twitter_link')->twitter,
            'youtube' => getSetting('youtube_link')->youtube,
            'wcount' => $wcount,
            'buyer' => $buyer,
            'company_name' => getSetting('company_name')->company_name,
            'company_description' => getSetting('company_description')?->lcontent,
            'shopping_user' => $shopping?->user,
            'home_page_sub_header_1' => getSetting('home_page_sub_header_1')?->lcontent,
            'home_page_header_1' => getSetting('home_page_header_1')?->lcontent,
            'home_page_header_2' => getSetting('home_page_header_2')?->lcontent,
            'home_page_header_3' => getSetting('home_page_header_3')?->lcontent,
            'home_page_sub_header_3' => getSetting('home_page_sub_header_3')?->lcontent,
            'home_page_section_1_sub_header_1' => getSetting('home_page_section_1_sub_header_1')?->lcontent,
            'home_page_section_1_header_1' => getSetting('home_page_section_1_header_1')?->lcontent,
            'home_page_section_1_description_1' => getSetting('home_page_section_1_description_1')?->lcontent,
            'home_page_section_1_description_2' => getSetting('home_page_section_1_description_2')?->lcontent,
            'home_page_section_2_header_left' => getSetting('home_page_section_2_header_left')?->lcontent,
            'home_page_section_2_header_2_left' => getSetting('home_page_section_2_header_2_left')?->lcontent,
            'home_page_section_2_header_right' => getSetting('home_page_section_2_header_right')?->lcontent,
            'home_page_section_2_header_2_right' => getSetting('home_page_section_2_header_2_right')?->lcontent,
            'home_page_section_3_header' => getSetting('home_page_section_3_header')?->lcontent,
            'home_page_section_3_sub_header' => getSetting('home_page_section_3_sub_header')?->lcontent

        ]);
    }
}
