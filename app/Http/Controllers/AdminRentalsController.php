<?php

namespace App\Http\Controllers;

use App\Models\Rentals;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRentalsRequest;
use App\Http\Requests\UpdateAdminRentalsRequest;

class AdminRentalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia("AdminRentals/Index");
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
    public function store(StoreAdminRentalsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Rentals $rentals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rentals $rentals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRentalsRequest $request, Rentals $rentals)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rentals $rentals)
    {
        //
    }
}
