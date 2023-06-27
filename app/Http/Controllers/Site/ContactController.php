<?php

namespace App\Http\Controllers\Site;

use App\Models\Site\Contact;
use App\Http\Controllers\Controller;

use App\Http\Requests\Site\StoreContactRequest;
use App\Http\Requests\Site\UpdateContactRequest;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return to_route('home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:5', 'max:30'],
            'email' => ['required', 'email', 'max:50'],
            'phone' => ['required', 'string', 'min:10', 'max:14'],
            'message' => ['required', 'string', 'min:30', 'max:255'],
        ]);
        // Contact::create();
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}