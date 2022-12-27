<?php

namespace App\Http\Middleware;

use App\Models\Currency;
use App\Models\ShoppingSession;
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

        if($notifications)
            $notifications = $notifications->map(function ($item){
                $item['date'] = translateDate($item->created_at);
                return $item;
            });
        return array_merge(parent::share($request), [

            //
            'locale' => $cLocale,
            'locales' => config('app.locales.all'),
            'auth' => auth()->user(),
            'auth.notifications' => $notifications,
            'isRtl' => isRtl($cLocale),
            'currency' => $currency,
            'currencies' => config('app.currencies'),
            'currency_code' => $code,
            'shopping_session' => auth()->user() ? auth()->user()->shoppingSession : ShoppingSession::where('ip',$request->ip())->with(['cartItems.product'])->first()
        ]);
    }
}
