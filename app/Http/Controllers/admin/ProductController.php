<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ProductRequest;
use App\Models\CustomRole;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductInventory;
use App\Traits\DatatableTrait;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;

class ProductController extends Controller
{
    use DatatableTrait;

    //

    public const MODEL = Product::class;
    public const COMPONENT = 'Products';


    public function __construct()
    {
        $this->middleware(['permission:view products'])->only(['index','datatables']);
        $this->middleware(['permission:edit product'])->only(['update']);
        $this->middleware(['permission:add product'])->only(['store']);
        $this->middleware(['permission:delete product'])->only(['destroy']);
    }

    public function index(Request $request)
    {

        $categories = ProductCategory::with([])->get();
        $inventories = ProductInventory::with([])->get();

        return Inertia::render(self::COMPONENT)
            ->with('datatableUrl', $this->getUrl())
            ->with('datatableColumns', $this->getColumns())
            ->with('datatableHeaders', $this->getHeaders())
            ->with('categories',$categories)
            ->with('inventories',$inventories);
    }


    public function getUrl(){

        return route('admin.products.index');
    }

    public function store(ProductRequest $request){

        $inputs = $this->filterRequest($request->all());
        $product = Product::create($inputs);

    }

    public function datatables(Request $request) {

        $permissions = [
            'edit' => 'edit product',
            'show' => 'show product',
            'delete' => 'delete product'
        ];

        $without = [
            'show'
        ];

        $datatables = $this->getDataTables()
            ->addColumn('id', fn($model) => $model->id)
            ->addColumn('name', fn($model) => $model->name)
//            ->addColumn('desc',fn($model) => $model->desc)
            ->addColumn('price',fn($model) => $model->price)
            ->addColumn('category',fn($model) => $model->category->name)
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
//            ['data' => 'desc' , 'name' => 'Description','searchable' => true],
            ['data' => 'price' , 'name' => 'Price','searchable' => true],
            ['data' => 'category' , 'name' => 'Category','searchable' => true],
            ['data' => 'action' , 'name' => 'Action','searchable' => false]
        ];
    }

    public function getHeaders(){
        return [
            'ID',
            'Name',
            'Price',
            'Category',
//            'Roles',
            'Action'
        ];
    }

}
