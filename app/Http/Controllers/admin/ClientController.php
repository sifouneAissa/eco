<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ClientRequest;
use App\Http\Requests\admin\RoleRequest;
use App\Http\Requests\admin\UpdateClientRequest;
use App\Http\Requests\admin\UpdateUserRequest;
use App\Http\Requests\admin\UserRequest;
use App\Models\CustomRole;
use App\Models\User;
use App\Traits\DatatableTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class ClientController extends Controller
{
    //
    use DatatableTrait;

    public const MODEL = User::class;

    public const COMPONENT = 'Clients';

    public function __construct()
    {
        $this->middleware(['permission:view clients'])->only(['index','datatables']);
        $this->middleware(['permission:edit client'])->only(['update']);
        $this->middleware(['permission:add client'])->only(['store']);
        $this->middleware(['permission:delete client'])->only(['destroy']);
    }

    public function store(ClientRequest $request){
        // get the role
        $inputs = $this->filterRequest($request->all());

        $inputs['password'] = Hash::make($inputs['password']);

        $user = User::query()->create($inputs);
    }

    public function update(UpdateClientRequest $request,$id){

        $user = User::find($id);
        // get the role
        $inputs = $this->filterRequest($request->all());

        if(isset($inputs['password']))
            $inputs['password'] = Hash::make($inputs['password']);

        $user->update($inputs);
    }

    public function destroy($id){
        User::find($id)->delete();
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
        return route('admin.clients.index');
    }

    public function getDataTables(){
        return datatables()
            ->of(User::query()->where('is_admin',false));
    }


    public function datatables(Request $request) {

        $permissions = [
            'edit' => 'edit client',
            'show' => 'show client',
            'delete' => 'delete client'
        ];

        $without = [
            'show'
        ];

        $datatables = $this->getDataTables()
            ->addColumn('id', fn($model) => $model->id)
            ->addColumn('name', fn($model) => view('Clients.name',compact('model')))
            ->addColumn('email',fn($model) => $model->email)
//            ->addColumn('roles',function ($model) {
//                return view('Users.roles',compact('model'));
//            })
            ->addColumn('action',function ($model) use ($permissions,$without){

//                $model['permissions'] = $model->roles;

                return view('Datatable.btn',compact('model','permissions','without'));
            })
            ->toArray();

        return response()->json($datatables);
    }


    public function getColumns(){
        return [
            ['data' => 'id','name' => 'Id'],
            ['data' => 'name' , 'name' => 'Name'],
            ['data' => 'email' , 'name' => 'Email','searchable' => true],
//            ['data' => 'roles' , 'name' => 'Roles','searchable' => false],
            ['data' => 'action' , 'name' => 'Action','searchable' => false]
        ];
    }

    public function getHeaders(){
        return [
            'ID',
            'Name',
            'Email',
//            'Roles',
            'Action'
        ];
    }

}
