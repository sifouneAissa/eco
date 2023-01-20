<?php

namespace App\Actions\Fortify;

use App\Models\ShoppingSession;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;


    public function create(array $input)
    {

        $with_shopping = key_exists('check_shopping', $input) && $input['check_shopping'];
        $check_email = key_exists('check_email', $input) && $input['check_email'];
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',

        ];
        if ($with_shopping) {
            if ($user = getShoppingSession() ?->user)
                if ($user->email !== $input['email'])
                    $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:users'];
        } elseif($check_email && $user = User::query()->where('email',$input['email'])->first()) {
            if(!$user->passwordExist())
            $rules['email'] = ['required', 'string', 'email', 'max:255'];
            else $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:users'];
        }
        else $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:users'];



        Validator::make($input, $rules)->validate();
        $user = null;

        if ($check_email && $user = User::query()->where('email', $input['email'])->first()) {

            if(!$user->passwordExist())
            $user->update([
                'name' => $input['name'],
                'password' => Hash::make($input['password']),
            ]);
            else $user = null;
        };

        if ($with_shopping) {

            $user = User::query()->where('email', $input['email'])->first();
            $user->update([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);
        } elseif(!$user) $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        // check shopping session
        // after login check if the user has a shopping list
        if(!$user->shoppingSession && $current_shopping = getShoppingSession()) {
            $current_shopping->user_id = $user->id;
            $current_shopping->save();
        }

        return $user;
    }
}
