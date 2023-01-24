<?php

namespace App\Modules\TransLogic\Models;

use App\Modules\LocationsLogic\LocationsLogicModelsHelpersTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    use HasFactory;


    public const CLASSBASE = Translation::class;

    protected $fillable= [
        'lang',
        'key',
        'value',
        "model_type",
        "model_id"
    ];

}
