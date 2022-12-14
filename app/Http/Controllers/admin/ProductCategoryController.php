<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ProductCategoryRequest;
use App\Models\CustomRole;
use App\Models\ProductCategory;
use App\Traits\DatatableTrait;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;

class ProductCategoryController extends Controller
{
    use DatatableTrait;

    //

    public const MODEL = ProductCategory::class;
    public const COMPONENT = 'ProductCategories';


    public function __construct()
    {
        $this->middleware(['permission:view product categories'])->only(['index','datatables']);
        $this->middleware(['permission:edit product category'])->only(['update']);
        $this->middleware(['permission:add product category'])->only(['store']);
        $this->middleware(['permission:delete product category'])->only(['destroy']);
    }

    public function index(Request $request)
    {
        return Inertia::render(self::COMPONENT)
            ->with('datatableUrl', $this->getUrl())
            ->with('datatableColumns', $this->getColumns())
            ->with('datatableHeaders', $this->getHeaders());
    }


    public function getUrl(){

        return route('admin.categories.index');
    }

    public function store(ProductCategoryRequest $request){

        $inputs = $this->filterRequest($request->all());
        $category = ProductCategory::create($inputs);

    }

    public function update(ProductCategoryRequest $request,$id){
        // dd($request->all());
        $inputs = $this->filterRequest($request->all());

        $category = ProductCategory::find($id);

        $category->update($inputs);

    }

    public function destroy($id){
        ProductCategory::find($id)->delete();
    }

    public function datatables(Request $request) {

        $permissions = [
            'edit' => 'edit product category',
            'show' => 'show product category',
            'delete' => 'delete product category',
            'media' =>  'view category media'

        ];
        $without = [
            'show',
        ];

        $datatables = $this->getDataTables()
            ->addColumn('id', fn($model) => $model->id)
            ->addColumn('name', fn($model) => $model->name)
            ->addColumn('desc',fn($model) => $model->desc)
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
            ['data' => 'desc' , 'name' => 'Description'],
            ['data' => 'action' , 'name' => 'Action','searchable' => false]
        ];
    }
    public function getHeaders(){
        return [
            'ID',
            'Name',
            'Description',
            'Action'
        ];
    }

}
