<?php

namespace App\Http\Controllers;


class HomeController extends Controller
{
    public function index()
    {
        return view('Home');
    }
    public function visimisi(){
        return view('Dashboard.Visimisi');
    }
}
