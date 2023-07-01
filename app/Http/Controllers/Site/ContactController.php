<?php

namespace App\Http\Controllers\Site;

use App\Models\Site\Contact;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;
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
        if (Contact::create($request->validated())) {
            Mail::to($request->input('email'))->send(
                new \App\Mail\ContactMail(
                    $request->input('name'),
                    $request->input('email'),
                    $request->input('phone'),
                    $request->input('message')
                )
            );
        }
        return redirect()->back();
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