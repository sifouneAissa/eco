<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\User;
use App\Traits\DatatableTrait;
use Illuminate\Http\Request;
use Inertia\Inertia;
use function League\Flysystem\map;

class OrderDetailController extends Controller
{
    //

    use DatatableTrait;

    public const MODEL = OrderDetail::class;

    public const COMPONENT = 'Orders';

    public const FORS = [
        'delivered', // delivered
        'onway', // onway
        'received',// instore
        'waiting'
    ];


    public function __construct()
    {
        $this->middleware(['permission:view orders'])->only(['index','datatables']);
        $this->middleware(['permission:edit order'])->only(['update']);
        $this->middleware(['permission:add order'])->only(['store']);
        $this->middleware(['permission:delete order'])->only(['destroy']);
        $this->middleware(['permission:show order'])->only(['show']);
    }

    public function show($id){

        $order = OrderDetail::find($id)->load(['orderItems.product','paymentDetail','user']);
        return Inertia::render('Orders/showOrder',[
            'order' => $order
        ]);
    }


    public function index(Request $request)
    {
        $url = $this->getUrl();


        $keys  = array_values(array_map(function ($item){
            return $item['key'];
        },config("default.orders")));

        if($request->hasAny($keys)){
            $arr = explode('?',$request->fullUrl());
            $params = $arr[count($arr)-1];
            $url = $url.'?'.$params;
        }

        $for = $request->input('for');

        if(in_array($for,self::FORS))
            if(str_contains('?',$url))
            $url = $url . "&for=". $for;
            else
            $url = $url . "?for=". $for;


        return Inertia::render(self::COMPONENT)
            ->with('datatableUrl', $url)
            ->with('datatableColumns', $this->getColumns())
            ->with('datatableHeaders', $this->getHeaders())
            ->with('deleteMUrl', 'admin.orders.deleteM');
    }

    public function getUrl(){
        return route('admin.orders.index');
    }

    public function datatables(Request $request) {

        $builder = (self::MODEL)::query()->orderBy('created_at','desc');

        $permissions = [
            'edit' => 'edit order',
            'show' => 'show order',
            'delete' => 'delete order'
        ];


        $keys  = array_values(array_map(function ($item){
            return $item['key'];
        },config("default.orders")));

        if($request->hasAny($keys)){
            foreach ($request->all() as $key => $value) {
                if (in_array($key, $keys))
                    $builder = $builder->where($key,$value);
            }
        }

        $for = $request->input('for');

        if(in_array($for,self::FORS))
        {
            if($for==="delivered") $builder = $builder->whereHas('orderTracks',function ($b){
                $b->where('status','delivered');
            });
            else if($for==="onway") $builder = $builder->whereHas('orderTracks',function ($b){
                $b->where('status','onway');
            });
            else if($for==="received") $builder = $builder->whereHas(
'orderTracks',function ($b){
                $b->where('status','instore');
            });
            else if($for==="waiting") $builder = $builder->whereDoesntHave('orderTracks');
        }
        $builder = datatables()->of($builder);

        $datatables = $builder
            ->addColumn('id', fn($model) => $model->id)
            ->addColumn('user_name', fn($model) => $model->userAddress->user->name)
            ->addColumn('email',fn($model) => $model->userAddress->user->email)
            ->addColumn('count',fn($model) => $model->products->count())
            ->addColumn('total',fn($model) => $model->total)
            ->addColumn('status',fn($model) => $model->current_status)
            ->addColumn('created_at',fn($model) => translateDate($model->created_at))
            ->addColumn('action',function ($model) use ($permissions){
                return view('Datatable.btn',compact('model','permissions'));
            })
            ->toArray();

        return response()->json($datatables);
    }


    public function getColumns(){
        return [
            ['data' => 'id','name' => 'Id'],
            ['data' => 'user_name' , 'name' => 'User name','searchable' => false],
            ['data' => 'email' , 'name' => 'Email','searchable' => false],
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


    public function deleteM(Request $request){

        $ids = $request->input('ids');

        OrderDetail::query()->whereIn('id',$ids)->delete();

    }

}
