<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\BlogRequest;
use App\Http\Requests\admin\RoleRequest;
use App\Http\Requests\admin\UpdateRoleRequest;
use App\Models\Blog;
use App\Models\CustomRole;
use App\Traits\DatatableTrait;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;

class BlogController extends Controller
{
    //

    use DatatableTrait;




    public const MODEL = Blog::class;

    public function __construct()
    {
        $this->middleware(['permission:view blogs'])->only(['index','datatables']);
        $this->middleware(['permission:edit blog'])->only(['update','edit']);
        $this->middleware(['permission:add blog'])->only(['store']);
        $this->middleware(['permission:show blog'])->only(['show']);
        $this->middleware(['permission:delete blog'])->only(['destroy']);
    }

    public function getUrl(){
        return route('admin.blogs.index');
    }
    public function create(){
        return Inertia::render('Blogs/addBlog');
    }
    public function index(Request $request)
    {

        return Inertia::render('Blogs')
            ->with('datatableUrl', $this->getUrl())
            ->with('datatableColumns', $this->getColumns())
            ->with('datatableHeaders', $this->getHeaders())
            ->with('model',$this->getModel());
    }


//    public function update(UpdateRoleRequest $request,$id){
//        // get all inputs in the request
//        $inputs = $request->all();
//        // get the role
//        $role = CustomRole::find($id);
//        // update data general of the role
//        $role->update($inputs);
//        // attach the role with permissions
//        $role->permissions()->sync($inputs['permissions']);
//    }

    public function destroy($id){
        // get the role
        Blog::find($id)->delete();
    }

    public function store(BlogRequest $request){

        // get all inputs in the request
        $inputs = array_merge(
            $this->filterRequest($request->all()),
            [
                'created_by' => auth()->user()->id
            ]
        );

        Blog::create($inputs);

    }

    public function edit($id){
        return Inertia::render('Blogs/editBlog',[
            'model' => Blog::find($id)
        ]);
    }

    public function show($id){
        return Inertia::render('Blogs/showBlog',[
            'model' => Blog::find($id)
        ]);
    }

    public function update(BlogRequest $request,$id){

        // get all inputs in the request
        $inputs = $this->filterRequest($request->all());

        Blog::find($id)->update($inputs);
    }

    public function datatables(Request $request) {

        $permissions = [
            'edit' => 'edit blog',
            'show' => 'show blog',
            'delete' => 'delete blog',
            'media' => 'view blog media'
        ];

        $datatables = $this->getDataTables()
            ->addColumn('id', fn($model) => $model->id)
            ->addColumn('title', fn($model) => $model->title)
            ->addColumn('action',function ($model) use ($permissions){
                $model['permissions'] = $model->permissions;
                return view('Datatable.btn',compact('model','permissions'));
            })
            ->toArray();

        return response()->json($datatables);
    }

    public function getColumns(){
        return [
            ['data' => 'id','name' => 'Id'],
            ['data' => 'title' , 'name' => 'Title'],
//            ['data' => 'permissions' , 'name' => 'Permissions','searchable' => false],
            ['data' => 'action' , 'name' => 'Action','searchable' => false],
//            ['data' => 'email']
        ];
    }

    public function getHeaders(){
        return [
            'ID',
            'Title',
//            'Permissions',
            'Action'
//            'Email'
        ];
    }
}
