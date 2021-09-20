<?php

namespace App\Http\Controllers;

use App\Models\GearRequest;
use Illuminate\Http\Request;

class GearRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('backend.Gear.MyRequests');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GearRequest  $gearRequest
     * @return \Illuminate\Http\Response
     */
    public function show(GearRequest $gearRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GearRequest  $gearRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(GearRequest $gearRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GearRequest  $gearRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GearRequest $gearRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GearRequest  $gearRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(GearRequest $gearRequest)
    {
        //
    }
}
