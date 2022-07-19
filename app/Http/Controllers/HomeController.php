<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index(){
        if(Auth::user() && auth()->user()->role=="admin")
            return redirect()->route('dashborad');
        
            elseif (Auth::user() && auth()->user()->role=="kitchenOrder");
                redirect()->route('kitchenOrder');
            
            return view('home');
    }
}
