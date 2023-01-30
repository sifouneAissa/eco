<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ProductRequest;
use App\Http\Requests\admin\UpdateProductRequest;
use App\Models\CustomRole;
use App\Models\InventoryOrderItem;
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
        $this->middleware(['permission:view products'])->only(['index', 'datatables']);
        $this->middleware(['permission:edit product'])->only(['update']);
        $this->middleware(['permission:add product'])->only(['store']);
        $this->middleware(['permission:delete product'])->only(['destroy']);
    }

    public function index(Request $request)
    {

        $categories = ProductCategory::with([])->get();
        $inventories = ProductInventory::orderBy('quantity')->get();

        return Inertia::render(self::COMPONENT)
            ->with('datatableUrl', $this->getUrl())
            ->with('datatableColumns', $this->getColumns())
            ->with('datatableHeaders', $this->getHeaders())
            ->with('categories', $categories)
            ->with('inventories', $inventories);
    }


    public function getUrl()
    {

        return route('admin.products.index');
    }

    public function store(ProductRequest $request)
    {
        $inputs = $this->filterRequest($request->all());
        $product = Product::create($inputs);

        $product->addTranslations($request->input('langs'));
    }

    public function update(UpdateProductRequest $request,$id)
    {
        $start_over = $request->input('start_over');

        $inputs = $this->filterRequest($request->all());

        $product = Product::find($id);

        $product->update($inputs);

        if ($start_over) {
            // delete this to start over
            $inventory = ProductInventory::find($request->input('product_inventory_id'));
            $orderItems = $inventory->orderItems()->where('product_id', $product->id)->get();
            InventoryOrderItem::where('inventory_id', $inventory->id)->whereIn('order_item_id', $orderItems->pluck('id'))->delete();
        }

        $product->updateTranslations($request->input('langs'));
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
    }

    public function datatables(Request $request)
    {

        $permissions = [
            'edit' => 'edit product',
            'show' => 'show product',
            'delete' => 'delete product',
            'media' => 'view product media'
        ];

        $datatables = $this->getDataTables()
            ->addColumn('id', fn($model) => $model->id)
            ->addColumn('name', fn($model) => $model->name)
            ->addColumn('price', fn($model) => $model->price)
            ->addColumn('old_price', fn($model) => $model->old_price)
            ->addColumn('category', fn($model) => $model->category->name)
            ->addColumn('inventory', fn($model) => $model->inventory->quantity)
            ->addColumn('remain', fn($model) => view('Products.remain', compact('model')))
            ->addColumn('action', function ($model) use ($permissions) {
                $model['category'] = $model->category;
                $model['inventory'] = $model->inventory;

                return view('Datatable.btn', compact('model', 'permissions'));
            })
            ->toArray();

        return response()->json($datatables);
    }

    public function getColumns()
    {
        return [
            ['data' => 'id', 'name' => 'Id'],
            ['data' => 'name', 'name' => 'Name'],
//            ['data' => 'desc' , 'name' => 'Description','searchable' => true],
            ['data' => 'price', 'name' => 'Price', 'searchable' => true],
            ['data' => 'old_price', 'name' => 'Old Price', 'searchable' => false],
            ['data' => 'category', 'name' => 'Category', 'searchable' => false],
            ['data' => 'inventory', 'name' => 'Inventory', 'searchable' => false],
            ['data' => 'remain', 'name' => 'Remain', 'searchable' => false],
            ['data' => 'action', 'name' => 'Action', 'searchable' => false]
        ];
    }

    public function getHeaders()
    {
        return [
            'ID',
            'Name',
            'Price',
            'Old Price',
            'Category',
            'Inventory',
            'Remain',
//            'Roles',
            'Action'
        ];
    }

}
