<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_line_1',
        'address_line_2',
        'city',
        'postal_code',
        'country',
        'mobile',
        'telephone',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }


}
