<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreThingRequest;
use App\Http\Requests\UpdateThingRequest;
use App\Models\Thing;

class ThingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $things = Thing::all();

        return view('things.index', [
            'things' => $things,
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
    public function store(StoreThingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Thing $thing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Thing $thing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateThingRequest $request, Thing $thing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Thing $thing)
    {
        //
    }
}
