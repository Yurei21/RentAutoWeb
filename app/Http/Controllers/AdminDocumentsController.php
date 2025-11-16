<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminDocumentsRequest;
use App\Http\Requests\UpdateAdminDocumentsRequest;

class AdminDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia("Auth/Document");
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
    public function store(StoreAdminDocumentsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Documents $documents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Documents $documents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminDocumentsRequest $request, Documents $documents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Documents $documents)
    {
        //
    }
}
