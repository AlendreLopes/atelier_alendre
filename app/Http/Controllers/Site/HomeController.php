<?php

namespace App\Http\Controllers\Site;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Site\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\Site\StoreHomeRequest;
use App\Http\Requests\Site\UpdateHomeRequest;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $appData = Home::get();
        return Inertia::render('Site/Home', [
            'appData' => $appData,
            'appCopyRight' => date('Y'),
            'appLogin' => Route::has('login'),
            'appName' => config('app.name'),
            'appRegister' => Route::has('register'),
        ]);
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
    public function store(StoreHomeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHomeRequest $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        //
    }
}