<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\RedirectResponse;

use Spatie\Permission\Models\Role;

class UserRoleRevokeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user, Role $role): RedirectResponse
    {
        $user->removeRole($role);
        return back();
    }
}