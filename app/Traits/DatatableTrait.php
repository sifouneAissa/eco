<?php

namespace App\Traits;

use App\Models\CustomRole;
use App\Models\User;
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

            $fillable = app(User::class)->getFillable();

            return array_filter($inputs,function ($item) use ($fillable,$inputs){
                return in_array($item,$fillable) && $inputs[$item] ;
            },ARRAY_FILTER_USE_KEY);
    }
}
