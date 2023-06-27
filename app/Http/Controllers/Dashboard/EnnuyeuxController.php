<?php

namespace App\Http\Controllers\Dashboard;

use Inertia\Inertia;
use Inertia\Response;

use App\Models\Dashboard\Ennuyeux;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreEnnuyeuxRequest;
use App\Http\Requests\Dashboard\UpdateEnnuyeuxRequest;

class EnnuyeuxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function ennuyeuxBavard()
    {
        // Webhook WhatsApp
    }

    public function quoiDeNeuf(): Response
    {
        return Inertia::render('Dashboard/Ennuyeux/QuoiDeNeuf');
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
    public function store(StoreEnnuyeuxRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Ennuyeux $ennuyeux)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ennuyeux $ennuyeux)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnnuyeuxRequest $request, Ennuyeux $ennuyeux)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ennuyeux $ennuyeux)
    {
        //
    }
}