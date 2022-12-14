<?php

namespace App\Models;

use App\Traits\OrdersTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use Billable;
    use OrdersTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'lang',
        'currency',
        'is_admin'
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
        'shopping_session',
        'modal_ids',
        'unregistered'
    ];

    public function shoppingSessions(){
        return $this->hasMany(ShoppingSession::class,'user_id');
    }


    public function getShoppingSessionAttribute(){
        return $this->shoppingSessions()->with(['cartItems.product'])->where('is_current',true)->first();
    }



    public  function getModalIdsAttribute(){
        return [
            'edit' => 'edit-user',
            'delete' => 'delete-user',
            'add' => 'add-user',
            'show' => 'show-user'
        ];
    }

    public function addresses(){
        return $this->hasMany(UserAddress::class,'user_id');
    }

    public function orders(){
        return $this->hasMany(OrderDetail::class,'user_id');
    }


    public function ordersCount($count){
        return $this->orders->count() >= $count;
    }

    public function stars($count,$min){
        $stars  = [
            1,
            2,
            3,
            4,
            5
        ];
        $i = 1;
        $best = $this->ordersCount($count);
        $count = $this->orders->count();

        if($best) return $stars[$i+3];
        else if(!$best && $count>$min) return $stars[$i+2];
        else if(!$best && $count === $min ) return $stars[$i+1];
        else if(!$best && $count<$min && $count>$min + 1) return $stars[$i];

        return 0;

    }

    public function passwordExist(){
        return $this->password !==null;
    }

    public function getUnregisteredAttribute(){
        return !$this->passwordExist();
    }
}
