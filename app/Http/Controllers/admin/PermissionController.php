<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Traits\DatatableTrait;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
        use DatatableTrait;

        public const MODEL = Permission::class;
        public const COMPONENT = 'Permissions';

        public function __construct()
        {

            $this->middleware(['permission:view permissions'])->only('index');
        }


    public function getUrl()
        {
            return route('admin.permissions.index');
        }

    public function index(Request $request)
    {

        return Inertia::render(self::COMPONENT)
            ->with('datatableUrl', $this->getUrl())
            ->with('datatableColumns', $this->getColumns())
            ->with('datatableHeaders', $this->getHeaders());
    }
}
