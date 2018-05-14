<?php

namespace LaravelEnso\RoleManager\app\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelEnso\RoleManager\app\Models\Role;
use LaravelEnso\RoleManager\app\Classes\RoleConfiguratorResource;

class RolePermissionController extends Controller
{
    public function index(Role $role)
    {
        return (new RoleConfiguratorResource($role))->get();
    }

    public function update(Request $request, Role $role)
    {
        tap($role)->updatePermissions($request->get('rolePermissions'))
            ->updateMenus($request->get('roleMenus'));

        return ['message' => __("The role's permissions were successfully updated")];
    }
}
