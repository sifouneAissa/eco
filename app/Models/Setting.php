<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'code',
        'content',
    ];

    protected $appends = [
        'modal_ids'
    ];

    public  function getModalIdsAttribute(){
        return [
            'edit' => 'edit-setting',
            'delete' => 'delete-setting',
            'add' => 'add-setting',
            'show' => 'show-setting'
        ];
    }

}
