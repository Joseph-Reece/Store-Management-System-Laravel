<?php

namespace App\Http\Controllers;

use App\Models\Gear;
use App\Models\GearRequest;
use App\Models\IssuedGear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $status = GearRequest::status;
        $gearRequests = GearRequest::where('user_id', $user->id)->with('gear')->orderByDesc('created_at')->paginate(5);
        // dd($gearRequests->gear);
        return view('backend.Gear.MyRequests', compact('user', 'status', 'gearRequests'));
    }

    public function adminIndex()
    {
        $status = GearRequest::status;
        $sports = Gear::sports;

        $pendingRequests = GearRequest::where('status', 0)->with('gear', 'user')->orderByDesc('created_at')->get();
        $approvedRequests = GearRequest::where('status', 1)->with('gear', 'user')->orderByDesc('created_at')->get();
        $deniedRequests = GearRequest::where('status', 2)->with('gear', 'user')->orderByDesc('created_at')->get();

        return view('backend.Orders.request_Manager', compact('pendingRequests','status', 'sports', 'approvedRequests', 'deniedRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function gearListing(Request $request)
    {
        //
        $params = $request->except('_token');

        $categories = Gear::categories;
        $sports = Gear::sports;

        $gears = Gear::filter($params)->paginate(6);

        $query_keyword = $request->query('keyword');
        $query_category = $request->query('category');
        $query_sport = $request->query('sport');

        $results = Gear::count();

        return view('backend.Orders.index', compact(
            'categories',
            'sports',
            'gears',
            'results',
            'query_keyword',
            'query_category',
            'query_sport'
        ));
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
        $gearID = $request->id;
        $userId = Auth::id();

        $gearRequest = new GearRequest();

        $gearRequest->user_id = $userId;
        $gearRequest->gear_id = $gearID;
        $gearRequest->status = 0;

        $gearRequest -> save();

        $notification = [
            'message' => 'Request Sent successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('request.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GearRequest  $gearRequest
     * @return \Illuminate\Http\Response
     */
    public function show(GearRequest $gearRequest, $slug)
    {
        //
        $categories = Gear::categories;
        $sports = Gear::sports;
        $gear = Gear::where('slug',$slug)->first();

        // dd($gear->name);

        return view('backend.Orders.show', compact('gear', 'categories', 'sports'));

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
    public function destroy(GearRequest $gearRequest , $id)
    {

        if (IssuedGear::where('gear_request_id', $id)->exists()) {
            $notification = [
                'message' => 'Request Was Issued Cannot Delete this Item',
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }

        $gearRequest->destroy($id);

        $notification = [
            'message' => 'Request Deleted successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);
    }
}
