<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function __invoke()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        //
        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if(Auth::attempt($validated)){
            $request->session()->regenerate();
            return redirect()->route('welcome');
        }

        return back()->withErrors([
            'username' => 'Credenciales incorrectas',
        ])->onlyInput('username');
    }
}
