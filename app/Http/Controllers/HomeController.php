<?php

namespace Kleinespende\Http\Controllers;

use Kleinespende\Http\Requests;
use Illuminate\Http\Request;
use Kleinespende\Models\Receiver;

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
        $receivers = Receiver::all();
        return view('home', ['receivers' => $receivers]);
    }
}
