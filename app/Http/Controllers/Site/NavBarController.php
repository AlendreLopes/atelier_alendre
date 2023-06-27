<?php

namespace App\Http\Controllers\Site;

use App\Models\Site\NavBar;
use App\Http\Controllers\Controller;

use App\Http\Requests\Site\StoreNavBarRequest;
use App\Http\Requests\Site\UpdateNavBarRequest;

class NavBarController extends Controller
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
    public function store(StoreNavBarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(NavBar $navBar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NavBar $navBar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNavBarRequest $request, NavBar $navBar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NavBar $navBar)
    {
        //
    }
}