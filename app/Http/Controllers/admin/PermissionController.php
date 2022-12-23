<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Traits\DatatableTrait;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
        use DatatableTrait;

        public const MODEL = Permission::class;
        public const COMPONENT = 'Permissions';


        public function getUrl()
        {
            return route('admin.permissions.index');
        }

}
