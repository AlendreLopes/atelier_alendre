<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission as Permissions;
use App\Http\Requests\Dashboard\PermissionsRequest;
use App\Http\Resources\Dashboard\PermissionsResource;

class PermissionsController extends Controller
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
        return Inertia::render('Dashboard/Permissions/Index', [
            'permissions' => PermissionsResource::collection(Permissions::get()),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Dashboard/Permissions/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionsRequest $request): RedirectResponse
    {
        Permissions::create($request->validated());
        return to_route('permissions.index')->with('message', 'Permission created.');
        ;
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
        return Inertia::render('Dashboard/Permissions/Edit', [
            'permission' => new PermissionsResource(Permissions::findById($id)),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionsRequest $request, string $id)
    {
        $update = Permissions::findById($id);
        $update->update($request->validated());
        return to_route('permissions.index')->with('message', 'Permission updated.');
        // DB::update('update users set votes = 100 where name = ?', ['John']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->can('theCreator' | 'admin')) {
            $delete = Permissions::findById($id);
            $delete->delete()->with('message', 'Permission updated.');
            return back();
        }
    }
}