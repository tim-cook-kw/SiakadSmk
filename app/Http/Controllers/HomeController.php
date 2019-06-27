<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
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
        if(Auth::user()->status == 1){
            return redirect('admin');
        }else if(Auth::user()->status == 2){
            return redirect()->route('guru');
        }else if(Auth::user()->status == 3){
            return redirect('murid');
        }
    }
}
