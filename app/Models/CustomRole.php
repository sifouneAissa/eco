<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class CustomRole extends Role
{
    use HasFactory;

    protected $appends = [
            'modal_ids'
    ];


    public  function getModalIdsAttribute(){
        return [
            'edit' => 'edit-role',
            'delete' => 'delete-role',
            'add' => 'add-role',
            'show' => 'show-role'
        ];
    }
}
