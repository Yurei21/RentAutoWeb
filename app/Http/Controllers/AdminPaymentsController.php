<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminPaymentsRequest;
use App\Http\Requests\UpdateAdminPaymentsRequest;

class AdminPaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia("AdminPayments/Index");
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
    public function store(StoreAdminPaymentsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Payments $payments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payments $payments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminPaymentsRequest $request, Payments $payments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payments $payments)
    {
        //
    }
}
