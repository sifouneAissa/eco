<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\BlogRequest;
use App\Http\Requests\admin\QuestionRequest;
use App\Models\Blog;
use App\Models\Question;
use App\Traits\DatatableTrait;
use Illuminate\Http\Request;
use Inertia\Inertia;

class QuestionController extends Controller
{
    //
    use DatatableTrait;



    public const MODEL = Question::class;

    public function __construct()
    {
        $this->middleware(['permission:view questions'])->only(['index','datatables']);
        $this->middleware(['permission:edit question'])->only(['update','edit']);
        $this->middleware(['permission:add question'])->only(['store']);
        $this->middleware(['permission:delete question'])->only(['destroy']);
    }

    public function getUrl(){
        return route('admin.questions.index');
    }

    public function index(Request $request)
    {

        return Inertia::render('Questions')
            ->with('datatableUrl', $this->getUrl())
            ->with('datatableColumns', $this->getColumns())
            ->with('datatableHeaders', $this->getHeaders())
            ->with('model',$this->getModel());
    }



    public function destroy($id){
        // get the role
        Question::find($id)->delete();
    }

    public function store(QuestionRequest $request){
        // get all inputs in the request
        $inputs = $this->filterRequest($request->all());
        Question::create($inputs);

    }


    public function update(QuestionRequest $request,$id){

        // get all inputs in the request
        $inputs = $this->filterRequest($request->all());

        Question::find($id)->update($inputs);
    }

    public function datatables(Request $request) {

        $permissions = [
            'edit' => 'edit question',
            'show' => 'show question',
            'delete' => 'delete question'
        ];

        $datatables = $this->getDataTables()
            ->addColumn('id', fn($model) => $model->id)
            ->addColumn('question', fn($model) => $model->question)
            ->addColumn('answer', fn($model) => $model->answer)
            ->addColumn('action',function ($model) use ($permissions){
                $model['permissions'] = $model->permissions;
                return view('Datatable.btn',compact('model','permissions'));
            })
            ->toArray();

        return response()->json($datatables);
    }

    public function getColumns(){
        return [
            ['data' => 'id','name' => 'Id'],
            ['data' => 'question' , 'name' => 'Question content','searchable' => true],
            ['data' => 'answer' , 'name' => 'Answer content','searchable' => true],
            ['data' => 'action' , 'name' => 'Action','searchable' => false],
            ];
    }

    public function getHeaders(){
        return [
            'ID',
            'Question content',
            'Answer content',
            'Action'
        ];
    }
}
