<?php

namespace App\Models;

use App\Modules\TransLogic\Traits\ModelTranslationsModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Question extends Model
{
    use HasFactory;

    use Searchable;
    use ModelTranslationsModel;

    protected $fillable = [
        'question',
        'answer'
    ];


    protected $appends = [
        'modal_ids',
        'question_ar',
        'question_fr',
        'answer_ar',
        'answer_fr',
        'lquestion',
        'lanswer'
    ];

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {

        $arr =  getSearchable($this,[
        ],[
            'created_at'
        ]);

        $arr['answer_ar'] = $this->answer_ar ? $this->answer_ar['value'] : null;
        $arr['answer_fr'] = $this->answer_fr ? $this->answer_fr['value'] : null;

        return $arr;

    }


    public  function getModalIdsAttribute(){
        return [
            'edit' => 'edit-question',
            'delete' => 'delete-blog',
            'add' => 'add-question',
            'show' => 'show-question'
        ];
    }

    public function getQuestionFrAttribute(){
        $values = $this->fr_translations()->where('key','question')->get();
        if($values->count()) return $values->first()->only('value','id');

        return null;
    }

    public function getQuestionArAttribute(){
        $values = $this->ar_translations()->where('key','question')->get();
        if($values->count()) return $values->first()->only('value','id');

        return null;
    }

    public function getAnswerFrAttribute(){
        $values = $this->fr_translations()->where('key','answer')->get();
        if($values->count()) return $values->first()->only('value','id');

        return null;
    }

    public function getAnswerArAttribute(){
        $values = $this->ar_translations()->where('key','answer')->get();
        if($values->count()) return $values->first()->only('value','id');

        return null;
    }

    public function getLquestionAttribute(){
        return $this->checkAndGetAttr('question');
    }

    public function getLanswerAttribute(){
        return $this->checkAndGetAttr('answer');
    }
}
