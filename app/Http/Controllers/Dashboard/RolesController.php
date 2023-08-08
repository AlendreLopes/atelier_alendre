<?php

namespace App\Http\Controllers\Dashboard;

use Inertia\Inertia;
use Inertia\Response;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Http\Controllers\Controller;

use App\Http\Resources\Dashboard\RolesResource;
use App\Http\Requests\Dashboard\RolesRequest;
use App\Http\Resources\Dashboard\PermissionsResource;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:theCreator|admin']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return Inertia::render('Dashboard/Roles/Index', [
            'roles' => RolesResource::collection(Role::all())
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Dashboard/Roles/Create', [
            'permissions' => PermissionsResource::collection(Permission::all())
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RolesRequest $request)
    {
        $newRole = Role::create($request->validated());
        if ($request->has('permissions')) {
            $newRole->syncPermissions($request->input('permissions.*.name'));
        }
        return to_route('roles.index')->with('message', 'Role created.');
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
    public function edit(string $id)
    {
        $editRole = Role::findById($id);
        $editRole->load('permissions');
        return Inertia::render('Dashboard/Roles/Edit', [
            'role' => new RolesResource($editRole),
            'permissions' => PermissionsResource::collection(Permission::all()),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RolesRequest $request, string $id)
    {
        $editRole = Role::findById($id);
        $editRole->update($request->validated());
        $editRole->syncPermissions($request->input('permissions.*.name'));
        return to_route('roles.index')->with('message', 'Role updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->can('theCreator' | 'admin')) {
            $deleteRole = Role::findById($id);
            $deleteRole->delete();
            return to_route('roles.index')->with('message', 'Role deleted.');
        }
    }
}