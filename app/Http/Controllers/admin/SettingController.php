<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\SettingRequest;
use App\Models\CustomRole;
use App\Models\Setting;
use App\Traits\DatatableTrait;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;

class SettingController extends Controller
{
    use DatatableTrait;

    //

    public const MODEL = Setting::class;
    public const COMPONENT = 'Settings';


    public function __construct()
    {
        $this->middleware(['permission:view settings'])->only(['index','datatables']);
        $this->middleware(['permission:edit setting'])->only(['update']);
        $this->middleware(['permission:add setting'])->only(['store']);
        $this->middleware(['permission:delete setting'])->only(['destroy']);
    }

    public function index(Request $request)
    {
        $without = [
            'add'
        ];


        return Inertia::render(self::COMPONENT)
            ->with('datatableUrl', $this->getUrl())
            ->with('datatableColumns', $this->getColumns())
            ->with('datatableHeaders', $this->getHeaders())
            ->with('without', $without)
            ;
    }


    public function getUrl(){

        return route('admin.settings.index');
    }

    public function store(SettingRequest $request){

        $inputs = $this->filterRequest($request->all());
        $setting = Setting::create($inputs);

        $setting->addTranslations($request->input('langs'));

    }

    public function update(SettingRequest $request,$id){
        // dd($request->all());
        $inputs = $this->filterRequest($request->all());

        $setting = Setting::find($id);

        $setting->update($inputs);

        $setting->updateTranslations($request->input('langs'));
    }

    public function destroy($id){
        Setting::find($id)->delete();
    }

    public function datatables(Request $request) {

        $permissions = [
            'edit' => 'edit setting',
            'show' => 'show setting',
            'delete' => 'delete setting',
            'media' =>  'view setting media'
        ];
        $without = [
            'show',
            'delete'
        ];

        $datatables = $this->getDataTables()
            ->addColumn('id', fn($model) => $model->id)
            ->addColumn('name', fn($model) => $model->name)
            ->addColumn('content',fn($model) => $model->content)
            ->addColumn('action',function ($model) use ($permissions,$without){
                return view('Datatable.btn',compact('model','permissions','without'));
            })
            ->toArray();

        return response()->json($datatables);
    }

    public function getColumns(){
        return [
            ['data' => 'id','name' => 'Id'],
            ['data' => 'name' , 'name' => 'Name'],
            ['data' => 'content' , 'name' => 'Content'],
            ['data' => 'action' , 'name' => 'Action','searchable' => false,'orderable' => false]
        ];
    }

    public function getHeaders(){
        return [
            'ID',
            'Name',
            'Content',
            'Action'
        ];
    }

}
