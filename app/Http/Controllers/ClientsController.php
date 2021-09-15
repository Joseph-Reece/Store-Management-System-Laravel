<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientsController extends Controller
{
    function __construct()
    {
        //  $this->middleware('permission:student-list|student-create|student-edit|student-delete', ['only' => ['index','store']]);
         $this->middleware('permission:student-list', ['only' => ['index','store']]);
         $this->middleware('permission:student-create', ['only' => ['create','store']]);
         $this->middleware('permission:student-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:student-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = User::role('student')->get();

        return view('backend.Clients.index', compact('data'));
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
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Clients $clients)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(Clients $clients)
    {
        //
        $user = Auth::user();
        $details = Clients::where('user_id', $user->id)->first();
        $courses = Clients::courses;
        // dd($details);

        return view('users.accountSetting', compact('user', 'courses', 'details'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clients $clients)
    {
        //
        $user = Auth::id();

        $save = Clients::updateOrCreate(
            ['user_id' => $user],
            [
                'reg_no' => $request->reg_no,
                'phone' => $request->phone,
                'course' => $request->course,
            ]
        );
        
        return response()->json(['success'=>'Info updated successfully !'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request, $id)
    {
        //
        $input = $request->all();

        $user = User::find($id);

        if($request->has('password')){
            $input['password'] = Hash::make($input['password']);
            $user->update($input);

            return response()->json(['success'=>'Password is Changed Successfully!'], 200);

        }

        $user->update($input);
        // dd($user);

        $notification = array(
            'message' => 'User Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $clients)
    {
        //
    }
}
