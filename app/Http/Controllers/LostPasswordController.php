<?php

namespace App\Http\Controllers;

use App\Mail\PasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class LostPasswordController extends Controller
{
    //
    public function __invoke()
    {
        // Si el usuario esta logeado
        if(Auth::check())
        {
            return redirect()->route('products');
        }

        // Si no esta logeado
        return view('lost-password');
    }

    public function sendEmail(Request $request)
    {
        // Validar Email
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ]);

        $email = $request->input('email');

        // Token de restablecimiento
        $token = Password::createToken(User::where('email', $email)->first());

        // Crear enlace
        $resetLink = route('reset.password', ['token' => $token, 'email' => $email]);

        // Enviar Email
        Mail::to($email)->send(new PasswordMail($resetLink));

        return redirect()->route('login')->with('success', 'Correo de recuperación enviado exitosamente!');
    }
}
