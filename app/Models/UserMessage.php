<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message'
    ];

    protected  $appends = [
        'date'
    ];


    public function getDateAttribute(){
        return translateDate($this->created_at);
    }

}
