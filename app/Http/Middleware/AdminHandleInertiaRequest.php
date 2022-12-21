<?php

namespace App\Http\Middleware;

use App\Models\Currency;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class AdminHandleInertiaRequest extends HandleInertiaRequests
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'admin';



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
        $user = auth()->user();

        return array_merge(parent::share($request), [
            'auth' => $user,
            'auth.permissions' => $user ? $user->getAllPermissions()->pluck("name") : null,
            'auth.roles' => $user ? $user->getRoleNames() : null,
            'route.current.name' => Route::currentRouteName()
        ]);
    }
}
