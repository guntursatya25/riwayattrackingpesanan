<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }

    public function actionLogin(Request $request){
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->flashExcept('password');

            // return redirect(route('admin'));
            return redirect('/admin');
        } else {
            return redirect('/as');
            // return back()->withErrors([
            //     'username' => 'The provided credentials do not match our records.',
            // ]);
        }
    }
    public function actionRegister(Request $request){
        $validatedData = $request->validate([
            // 'name' => 'required|max:255',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);
 
        $validatedData['password'] = Hash::make($validatedData['password']);
 
        User::create($validatedData);
        return redirect('/login')->with('success', 'Registration Succesfull! Please Login');

    }

    public function logout()
    {
        Auth::logout();
        Request()->session()->invalidate();
        Request()->session()->regenerateToken();
        return redirect('/');
    }
}
