<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Laravel\Fortify\Contracts\RegisterResponse;

class RegisterResponseC implements RegisterResponse
{

    /**
     * @param  $request
     * @return mixed
     */
    public function toResponse($request)
    {
        if($request->wishlist) return back();
    }

}
