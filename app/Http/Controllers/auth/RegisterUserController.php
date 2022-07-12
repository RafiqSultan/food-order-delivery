<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;

class RegisterUserController extends Controller
{
    //
    public function create(){

        return view('auth.register');
    }

    // *functin  request and insert data to db
    public function store(Request $request){

        Validator::validate($request->all(),[
            'username'=>['required','string','max:255'],
            'email'   =>['required','string','email','max:255','unique:users'],
            'password'=>['required','confirmed',Rules\password::defaults()]
        ]);

        // $user=User::create([
        //     'username'=>$request->name,
        //     'email'   =>$request->email,
        //     'password'=>Hash::make($request->password),
        //     // when user who registers themselves are all customers.
        //     'role'    =>'admin',
        // ]);
        $user=new User();
        $user->username=$request->name;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->role='admin';
        // $user->save();
        if($user->save()){
            return redirect()->route('home');
        }
        return back();

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);




    }
}
