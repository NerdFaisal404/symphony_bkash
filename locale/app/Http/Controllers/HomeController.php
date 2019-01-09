<?php

namespace App\Http\Controllers;

use App\Bkash;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['bkash'] = Bkash::all(); 
        $data['notActive'] = Bkash::where('Activated',0)->count();
        $data['active'] = Bkash::where('Activated',1)->count();
        $data['independentInstall'] = Bkash::where('Activated',2)->count();
        $data['appRemove'] = Bkash::where('Activated',3)->count();
        return view('dashboard',$data);
    }
}
