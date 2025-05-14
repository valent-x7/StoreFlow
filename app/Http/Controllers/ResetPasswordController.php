<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    //
    public function __invoke(Request $request, $token = null)
    {
        return view('reset-password')->with([
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    public function restorePassword(Request $request)
    {
        // Validar credenciales
        $request->validate([
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        // Resetear contraseña
        $response = Password::reset($request->only('email', 'password', 'token'), function ($user, $password) {
            $user->password = Hash::make($password);
            $user->setRememberToken(Str::random(60));
            $user->save();
        });

        // Devolver respuesta
        return $response == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('success', 'Tu contraseña ha sido restablecida.')
                    : back()->withErrors(['email' => trans($response)]);
    }
}
