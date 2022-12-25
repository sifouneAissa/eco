<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public  $provider = 'blog';

    protected $appends = [
        'modal_ids'
    ];

    protected $fillable = [
        'title',
        'blog'
    ];

    public  function getModalIdsAttribute(){
        return [
            'edit' => 'admin.blog.edit',
            'delete' => 'delete-user',
            'add' => 'admin.blog.create',
            'show' => 'show-user'
        ];
    }
}
