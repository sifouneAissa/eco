<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CustomRole;
use App\Models\User;
use App\Traits\DatatableTrait;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    use DatatableTrait;


    public const MODEL = User::class;
    public const COMPONENT = 'Users';


    public function getUrl(){
        return route('admin.users.index');
    }

    public function getDataTables(){
        return datatables()
            ->of(User::query()->where('is_admin',true));
    }


    public function datatables(Request $request) {

        $permissions = [
            'edit' => 'edit user',
            'show' => 'show user',
            'delete' => 'delete user'
        ];


        $datatables = $this->getDataTables()
            ->addColumn('id', fn($model) => $model->id)
            ->addColumn('name', fn($model) => $model->name)
            ->addColumn('email',fn($model) => $model->email)
            ->addColumn('action',function ($model) use ($permissions){
                return view('Datatable.btn',compact('model','permissions'));
            })
            ->toArray();

        return response()->json($datatables);
    }


    public function getColumns(){
        return [
            ['data' => 'id','name' => 'Id'],
            ['data' => 'name' , 'name' => 'Name'],
            ['data' => 'email' , 'name' => 'Email','searchable' => true],
            ['data' => 'action' , 'name' => 'Action','searchable' => false]
        ];
    }

    public function getHeaders(){
        return [
            'ID',
            'Name',
            'Email',
            'Action'
        ];
    }
}
