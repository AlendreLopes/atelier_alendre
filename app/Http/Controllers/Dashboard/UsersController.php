<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;

use Inertia\Inertia;
use Inertia\Response;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

use App\Actions\Fortify\PasswordValidationRules;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use App\Http\Resources\Dashboard\PermissionsResource;
use App\Http\Resources\Dashboard\RolesResource;
use App\Http\Resources\Dashboard\UsersResource;

use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    use PasswordValidationRules;

    public function __construct()
    {
        $this->middleware(['role:theCreator|admin']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Dashboard/Users/Index', [
            'users' => UsersResource::collection(User::all()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Dashboard/Users/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => $this->passwordRules(),
                'password_confirmation' => ['required', 'string', 'max:255'],
            ]
        );
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return to_route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): Response
    {
        $user->load(['roles', 'permissions']);
        return Inertia::render('Dashboard/Users/Edit', [
            'user' => new UsersResource($user),
            'roles' => RolesResource::collection(Role::all()),
            'permissions' => PermissionsResource::collection(Permission::all()),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user)],
            ]
        );
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);
        $user->syncRoles($request->input('roles.*.name'));
        $user->syncPermissions($request->input('permissions.*.name'));
        return back();
        // return to_route('users.index')->with('message', 'Your date has been taken!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        if (auth()->user()->can('theCreator' | 'admin')) {
            $user->delete();
            return to_route('users.index')->with('message', 'User has been deleted');
        } else {
            return to_route('users.index')->with('message', 'You dont have permission to delete');
        }
    }
}