<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountCreationController extends Controller
{
    // only authenticated users are allowed to use this controller.
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(){

        if(auth()->user()->role !="admin")
            abort('403');
        
            return view('admin.createAccount');
    }


    public function store(Request $request){


        // validate requests.
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            'role' => ['required', 'string']
        ]);

        // after validation, create the user accordingly.
        $user = User::create([
            'username' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

    }
}
