<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Resources\Dashboard\UsersResource;
use App\Actions\Fortify\PasswordValidationRules;

class UsersController extends Controller
{
    use PasswordValidationRules;
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
        return Inertia::render('Dashboard/Users/Edit', [
            'user' => new UsersResource($user),
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
        return to_route('users.index')->with('message', 'Your date has been taken!');
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