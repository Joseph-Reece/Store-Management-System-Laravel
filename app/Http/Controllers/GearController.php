<?php

namespace App\Http\Controllers;

use App\Models\Gear;
use Illuminate\Http\Request;

class GearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sports = [
            'Football',
            'NetBall',
            'Rugby',
        ];

        $categories = [
            'Indoor game',
            'Outdoor game',
        ];

        $gears = Gear::all();
        return view('backend.Gear.index', compact('sports', 'categories', 'gears'));
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
        $this->validate($request, [
            'name' => 'required',
            'brand' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'category' => 'required',
            'sport' => 'required',
        ]);

        $sports = [
            'Football',
            'NetBall',
            'Rugby',
        ];

        $categories = [
            'Indoor game',
            'Outdoor game',
        ];
        $formData = $request->all();
        $sport = $formData['sport'];

        // dd($sports[$sport]);

        $gear = new Gear();

        $gear->fill($formData);

        $gear->save();

        $notification = array(
            'message' => 'Gear created successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gear  $Gear
     * @return \Illuminate\Http\Response
     */
    public function show(Gear $Gear, $slug)
    {
        //
        $gear = Gear::where('slug', $slug)->get();
        dd($gear[0]->name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gear  $Gear
     * @return \Illuminate\Http\Response
     */
    public function edit(Gear $Gear, $slug)
    {
        //
        $gear = Gear::where('slug', $slug)->get();
        dd($gear[0]->name);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gear  $Gear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gear $Gear)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gear  $Gear
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gear $Gear)
    {
        //
        dd('woow');
    }
}
