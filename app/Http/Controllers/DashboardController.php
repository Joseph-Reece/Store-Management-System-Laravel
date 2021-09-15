<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application Frontend Home Page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function homePage()
    {
        return view('frontend.index');
    }


    /**
     * Show the application Backend dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        

        return view('dashboard');
    }
}
