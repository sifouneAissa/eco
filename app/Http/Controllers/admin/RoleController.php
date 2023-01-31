<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\RoleRequest;
use App\Http\Requests\admin\UpdateRoleRequest;
use App\Models\CustomRole;
use App\Traits\ControllersTrait;
use App\Traits\DatatableTrait;
use Cassandra\Custom;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Laravel\Jetstream\Rules\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    use DatatableTrait;
    use ControllersTrait;


    public const MODEL = CustomRole::class;

    public function __construct()
    {
        $this->middleware(['permission:view roles'])->only(['index','datatables']);
        $this->middleware(['permission:edit role'])->only(['update']);
        $this->middleware(['permission:add role'])->only(['store']);
        $this->middleware(['permission:delete role'])->only(['destroy']);
    }

    public function index(Request $request)
    {

        $permissions = Permission::with([])->get();

        return Inertia::render('Roles')
            ->with('datatableUrl', $this->getUrl())
            ->with('datatableColumns', $this->getColumns())
            ->with('datatableHeaders', $this->getHeaders())
            ->with('permissions',$permissions)
            ->with('deleteMUrl', 'admin.roles.deleteM');
            ;
    }


    public function update(UpdateRoleRequest $request,$id){
        // get all inputs in the request
        $inputs = $request->all();
        // get the role
        $role = CustomRole::find($id);
        // update data general of the role
        $role->update($inputs);
        // attach the role with permissions
        $role->permissions()->sync($inputs['permissions']);
    }

    public function destroy($id){
        // get the role
        CustomRole::find($id)->delete();
    }

    public function store(RoleRequest $request){

        // get all inputs in the request
        $inputs = $request->all();
        // get the role
        $role = CustomRole::create([
            'name' => $inputs['name']
        ]);
        // attach the role with permissions
        $role->permissions()->sync($inputs['permissions']);
    }


    public function datatables(Request $request) {

        $permissions = [
            'edit' => 'edit role',
            'show' => 'show role',
            'delete' => 'delete role'
        ];

        $datatables = $this->getDataTables()
            ->addColumn('id', fn($model) => $model->id)
            ->addColumn('name', fn($model) => $model->name)
            ->addColumn('action',function ($model) use ($permissions){
                $model['permissions'] = $model->permissions;
                return view('Datatable.btn',compact('model','permissions'));
            })
            ->addColumn('permissions',function ($model){
                return view('Roles.permissions',compact('model'));
            })
            ->toArray();

        return response()->json($datatables);
    }

    public function getColumns(){
        return [
            ['data' => 'id','name' => 'Id'],
            ['data' => 'name' , 'name' => 'Name'],
            ['data' => 'permissions' , 'name' => 'Permissions','searchable' => false],
            ['data' => 'action' , 'name' => 'Action','searchable' => false],
//            ['data' => 'email']
        ];
    }

    public function getHeaders(){
        return [
            'ID',
            'Name',
            'Permissions',
            'Action'
//            'Email'
        ];
    }
}
