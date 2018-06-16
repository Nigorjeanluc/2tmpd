<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adminpages.index');
    }
    
    /*public function chart()
    {
        return view('userpages.charts');
    }
    
    public function flow()
    {
        return view('userpages.flowcharts');
    }*/
}
