<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function resepsionistHome()
    {
        return view('resepsionist/home');
    }
    public function adminHome()
    {
        return view('admin/adminHome');
    }
    public function dokterhome()
    {
        return view('dokter/index');
    }
    public function kasirhome()
    {
        return view('kasir/index');
    }
}
