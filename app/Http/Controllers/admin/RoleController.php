<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\RoleRequest;
use App\Models\CustomRole;
use App\Traits\DatatableTrait;
use Cassandra\Custom;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Laravel\Jetstream\Rules\Role;

class RoleController extends Controller
{
    use DatatableTrait;


    public const MODEL = CustomRole::class;

    public function update(RoleRequest $request,$id){

        $inputs = $request->all();

        CustomRole::find($id)->update($inputs);
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
