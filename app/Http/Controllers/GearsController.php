<?php

namespace App\Http\Controllers;

use App\Models\Gears;
use Illuminate\Http\Request;

class GearsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('backend.Gear.index');
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
     * @param  \App\Models\Gears  $gears
     * @return \Illuminate\Http\Response
     */
    public function show(Gears $gears)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gears  $gears
     * @return \Illuminate\Http\Response
     */
    public function edit(Gears $gears)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gears  $gears
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gears $gears)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gears  $gears
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gears $gears)
    {
        //
        dd('woow');
    }
}
