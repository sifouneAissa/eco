<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Traits\DatatableTrait;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderDetailController extends Controller
{
    //

    use DatatableTrait;

    public const MODEL = OrderDetail::class;

    public const COMPONENT = 'Orders';


    public function __construct()
    {
        $this->middleware(['permission:view orders'])->only(['index','datatables']);
        $this->middleware(['permission:edit order'])->only(['update']);
        $this->middleware(['permission:add order'])->only(['store']);
        $this->middleware(['permission:delete order'])->only(['destroy']);

        $this->middleware(['permission:show order'])->only(['show']);
    }

    public function show($id){

        $order = OrderDetail::find($id)->load(['orderItems.product','paymentDetail']);
        return Inertia::render('Orders/showOrder',[
            'order' => $order
        ]);
    }


    public function index(Request $request)
    {
        return Inertia::render(self::COMPONENT)
            ->with('datatableUrl', $this->getUrl())
            ->with('datatableColumns', $this->getColumns())
            ->with('datatableHeaders', $this->getHeaders())
//            ->with('roles',$roles)
            ;
    }

    public function getUrl(){
        return route('admin.orders.index');
    }

    public function datatables(Request $request) {

        $permissions = [
            'edit' => 'edit order',
            'show' => 'show order',
            'delete' => 'delete order'
        ];

//        $without = [
//            'show'
//        ];

        $datatables = $this->getDataTables()
            ->addColumn('id', fn($model) => $model->id)
            ->addColumn('user_name', fn($model) => $model->userAddress->user->name)
            ->addColumn('email',fn($model) => $model->userAddress->user->email)
            ->addColumn('count',fn($model) => $model->products->count())
            ->addColumn('total',fn($model) => $model->total)
            ->addColumn('status',fn($model) => $model->current_status)
            ->addColumn('created_at',fn($model) => translateDate($model->created_at))
//            ->addColumn('roles',function ($model) {
//                return view('Users.roles',compact('model'));
//            })
            ->addColumn('action',function ($model) use ($permissions){

//                $model['permissions'] = $model->roles;

                return view('Datatable.btn',compact('model','permissions'));
            })
            ->toArray();

        return response()->json($datatables);
    }


    public function getColumns(){
        return [
            ['data' => 'id','name' => 'Id'],
            ['data' => 'user_name' , 'name' => 'User Name'],
            ['data' => 'email' , 'name' => 'Email','searchable' => true],
            ['data' => 'count' , 'name' => 'Products Count','searchable' => false],
            ['data' => 'total' , 'name' => 'total','searchable' => false],
            ['data' => 'status' , 'name' => 'Status','searchable' => false],
            ['data' => 'created_at' , 'name' => 'Created at','searchable' => false],
//            ['data' => 'roles' , 'name' => 'Roles','searchable' => false],
            ['data' => 'action' , 'name' => 'Action','searchable' => false]
        ];
    }

    public function getHeaders(){
        return [
            'ID',
            'User Name',
            'Email',
            'Products Count',
            'Total',
            'Status',
            'Created at',
//            'Roles',
            'Action'
        ];
    }


}
