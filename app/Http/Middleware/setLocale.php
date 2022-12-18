<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class setLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $lang = config('app.locale');
        $currency = config('app.currency');

        if(Session::has('locale'))
            $lang =  Session::get('locale');

        if(Session::has('currency'))
            $currency =  Session::get('currency');

        App::setLocale($lang);


        Carbon::setLocale($lang);

        Session::put('currency',$currency);

//        $user = auth()->user();
//
//        if($user) {
//            if ($lang !== $user->lang)
//                $user->update([
//                    'lang' => $lang
//                ]);
//
//            if ($currency !== $user->currency)
//                $user->update([
//                    'currency' => $currency
//                ]);
//        }




        return $next($request);
    }
}
