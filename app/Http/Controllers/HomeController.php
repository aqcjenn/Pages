<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pages;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Pages::orderBy('page_id','desc')->paginate(5);

        return view('home',compact('pages'));
    }
}
