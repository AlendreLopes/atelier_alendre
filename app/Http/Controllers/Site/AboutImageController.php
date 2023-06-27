<?php

namespace App\Http\Controllers\Site;

use App\Models\Site\AboutImage;
use App\Http\Controllers\Controller;

use App\Http\Requests\Site\StoreAboutImageRequest;
use App\Http\Requests\Site\UpdateAboutImageRequest;

class AboutImageController extends Controller
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
    public function store(StoreAboutImageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AboutImage $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutImage $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutImageRequest $request, AboutImage $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutImage $image)
    {
        //
    }
}