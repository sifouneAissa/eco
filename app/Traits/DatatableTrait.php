<?php

namespace App\Traits;

use App\Models\CustomRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
            ->toArray();

        return response()->json($datatables);
    }


    public function index(Request $request)
    {

        return Inertia::render(self::COMPONENT)
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


    public function filterRequest($inputs){

            $fillable = app(self::MODEL)->getFillable();

            return array_filter($inputs,function ($item) use ($fillable,$inputs){
                return in_array($item,$fillable) && $inputs[$item] ;
            },ARRAY_FILTER_USE_KEY);
    }

    public function getModel(){
        $model = app(self::MODEL);
        $model['models_ids'] = $model->modal_ids;
        $model['add'] = 'add '.$model->provider;
        $model['modal'] = !Route::has($model->modal_ids['add']) ;
        return $model;
    }
}
