<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\RoleRequest;
use App\Http\Requests\admin\UpdateUserRequest;
use App\Http\Requests\admin\UserRequest;
use App\Models\CustomRole;
use App\Models\User;
use App\Traits\ControllersTrait;
use App\Traits\DatatableTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserController extends Controller
{
    //
    use DatatableTrait;
    use ControllersTrait;


    public const MODEL = User::class;
    public const COMPONENT = 'Users';

    public function __construct()
    {
        $this->middleware(['permission:view users'])->only(['index', 'datatables']);
        $this->middleware(['permission:edit user'])->only(['update']);
        $this->middleware(['permission:add user'])->only(['store']);
        $this->middleware(['permission:delete user'])->only(['destroy']);
    }

    public function store(UserRequest $request)
    {
        // get all inputs in the request
        $inputs = $this->filterRequest($request->all());

        $inputs['password'] = Hash::make($inputs['password']);
        // get the role
        $user = User::query()->create(array_merge($inputs, ['is_admin' => true]));
        // attach the role with permissions
        $user->roles()->sync($request->input('roles'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        $inputs = $this->filterRequest($request->all());
        if (isset($inputs['password']))
            $inputs['password'] = Hash::make($inputs['password']);
        $user->update($inputs);

        // attach the role with permissions
        $user->roles()->sync($request->input('roles'));
    }

    public function destroy($id)
    {
        User::find($id)->delete();
    }


    public function index(Request $request)
    {
        $roles = CustomRole::query()->get();

        return Inertia::render(self::COMPONENT)
            ->with('datatableUrl', $this->getUrl())
            ->with('datatableColumns', $this->getColumns())
            ->with('datatableHeaders', $this->getHeaders())
            ->with('roles', $roles)
            ->with('deleteMUrl', 'admin.users.deleteM');
            ;
    }

    public function getUrl()
    {
        return route('admin.users.index');
    }

    public function getDataTables()
    {
        return datatables()
            ->of(User::query()->where('is_admin', true));
    }


    public function datatables(Request $request)
    {

        $permissions = [
            'edit' => 'edit user',
            'show' => 'show user',
            'delete' => 'delete user'
        ];

        $without = [
            'show',
            'orders'
        ];

        $datatables = $this->getDataTables()
            ->addColumn('id', fn($model) => $model->id)
            ->addColumn('name', fn($model) => $model->name)
            ->addColumn('email', fn($model) => $model->email)
            ->addColumn('roles', function ($model) {
                return view('Users.roles', compact('model'));
            })
            ->addColumn('action', function ($model) use ($permissions, $without) {

                $model['permissions'] = $model->roles;

                return view('Datatable.btn', compact('model', 'permissions', 'without'));
            })
            ->toArray();

        return response()->json($datatables);
    }


    public function getColumns()
    {
        return [
            ['data' => 'id', 'name' => 'Id'],
            ['data' => 'name', 'name' => 'Name'],
            ['data' => 'email', 'name' => 'Email', 'searchable' => true],
            ['data' => 'roles', 'name' => 'Roles', 'searchable' => false],
            ['data' => 'action', 'name' => 'Action', 'searchable' => false]
        ];
    }

    public function getHeaders()
    {
        return [
            'ID',
            'Name',
            'Email',
            'Roles',
            'Action'
        ];
    }
}
