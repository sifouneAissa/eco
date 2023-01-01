<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class setPassword
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
        $shopping = getShoppingSession();

        $shopping_user = $shopping?->user;
        $time = Session::get('time');
        $skipped = false;

        if($time){
            $time = Carbon::parse($time);
            $date = Carbon::now();
            $min = $date->diffInMinutes($time);

            if($min>=5) {
                Session::put('setPassword', true);
                Session::forget('time');
                $skipped = false;
            }else {
                Session::put('setPassword', false);
                Session::put('time', $time);
                $skipped = true;
            }
         }

        if(!auth()->user() && $shopping && $shopping_user && !$shopping_user->passwordExist() && !$skipped) {
            Session::put('setPassword', true);
        }
        else Session::put('setPassword',false);

        return $next($request);
    }
}
