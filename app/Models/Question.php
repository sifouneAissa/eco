<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Question extends Model
{
    use HasFactory;

    use Searchable;

    protected $fillable = [
        'question',
        'answer'
    ];


    protected $appends = [
        'modal_ids'
    ];

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {

        return getSearchable($this,[
        ],[
            'created_at'
        ]);

    }


    public  function getModalIdsAttribute(){
        return [
            'edit' => 'edit-question',
            'delete' => 'delete-blog',
            'add' => 'add-question',
            'show' => 'show-question'
        ];
    }
}
