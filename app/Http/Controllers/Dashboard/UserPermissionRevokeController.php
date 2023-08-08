<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;

use Spatie\Permission\Models\Permission;

class UserPermissionRevokeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user, Permission $permission): RedirectResponse
    {
        $user->revokePermissionTo($permission);
        return back();
    }
}