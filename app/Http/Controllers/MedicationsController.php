<?php

namespace App\Http\Controllers;

use App\Models\Medications;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMedicationsRequest;
use App\Http\Requests\UpdateMedicationsRequest;

class MedicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreMedicationsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Medications $medications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medications $medications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicationsRequest $request, Medications $medications)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medications $medications)
    {
        //
    }
}
