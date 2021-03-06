<?php

namespace SistemPenjualanBuku\Http\Controllers;

use Illuminate\Http\Request;
use SistemPenjualanBuku\User;


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
        $user=User::all();

        return view('homebaru',['user'=>$user,'halaman'=>'Dashboard']);
    }
}
