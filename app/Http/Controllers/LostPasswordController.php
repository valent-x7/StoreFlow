<?php

namespace App\Http\Controllers;

use App\Mail\PasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LostPasswordController extends Controller
{
    //
    public function __invoke()
    {
        return view('lost-password');
    }

    public function sendEmail(Request $request)
    {
        // Validar Email
        $validated = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ]);

        // Enviar Email
        Mail::to($validated['email'])->send(new PasswordMail);

        return redirect()->route('login')->with('success', 'Correo de recuperación enviado exitosamente!');
    }
}
