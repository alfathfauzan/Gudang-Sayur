<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
         $request->validate([
            'email' => ['required','email:dns'],
            'password' => ['required']
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if(Auth::attempt($infologin)){
            if (Auth::user()-> status == '1'){
                return redirect('/');
            }elseif (Auth::user()-> status == '0'){
                return redirect('/admin');
            }
        }

        return back()->with('loginError', 'Login failed!');
        
    }

    public function update1()
    {
        return view('updateprofile');
    }

    public function profileupdate(User $update, Request $request){

        $validate = Validator::make($request->all(), [
            'name' => ['required','string','max:200'],
            'email' => ['required','email:dns','max:155'],
            'address' => ['required','max:255'],
            'city' => ['required','max:255'],
            'state' => ['required','max:255'],
            'zip_code' => ['required', 'max:255'],
        ]);

        $update = [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code
        ];

        auth()->user()->update($update);
        return redirect('/');
    }

    

    public function logout() {
        Auth::logout();
        
        return redirect('/');
    }
}
