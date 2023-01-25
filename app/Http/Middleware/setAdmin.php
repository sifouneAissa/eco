<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\App;

class setAdmin
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
        $user = $request->user() ;
           if(!($user && $user->is_admin)){

            if($request->route()->getPrefix()===config("app.admin-prefix"))
                return redirect()->route('admin.login');
            abort(404);
        }

        App::setLocale('en');
        \Illuminate\Support\Carbon::setLocale('en');


        return $next($request);
    }
}
