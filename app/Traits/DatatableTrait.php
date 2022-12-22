<?php

namespace App\Traits;

use App\Models\CustomRole;
use Illuminate\Http\Request;
use Inertia\Inertia;

trait DatatableTrait {


    public function getDataTables(){
        return datatables()
            ->of((self::MODEL)::query());
    }

    public function datatables(Request $request) {


        $datatables = $this->getDataTables()
            ->addColumn('id', fn($model) => $model->id)
            ->addColumn('name', fn($model) => $model->name)
//            ->addColumn('email', fn($user) => $user->email)
            ->toArray();

        return response()->json($datatables);
    }


    public function index(Request $request)
    {
        return Inertia::render('Roles')
            ->with('datatableUrl', $this->getUrl())
            ->with('datatableColumns', $this->getColumns())
            ->with('datatableHeaders', $this->getHeaders());
    }

    public function getUrl(){
        return route('admin.roles.index');
    }

    public function getColumns(){
        return [
            ['data' => 'id','name' => 'Id'],
            ['data' => 'name' , 'name' => 'Name'],
//            ['data' => 'email']
        ];
    }

    public function getHeaders(){
        return [
            'ID',
            'Name',
//            'Email'
        ];
    }
}
