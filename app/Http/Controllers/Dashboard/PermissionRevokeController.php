<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Http\Controllers\Controller;

class PermissionRevokeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Role $role, Permission $permission): RedirectResponse
    {
        $role->revokePermissionTo($permission);
        return back();
    }
}