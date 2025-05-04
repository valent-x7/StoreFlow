<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function __invoke(): View
    {
        $user = Auth::user();
        return view('profile', compact('user')); // Enviar usuario a la vista
    }

    public function saveChanges(Request $request)
    {
        $user = Auth::user();

        $data = $request->validate([
            'username' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'password' => 'nullable|string|min:6',
        ]);

        // Solo actualiza si se mandó un valor
        if ($data['username']) {
            $user->username = $data['username'];
        }

        if ($data['email']) {
            $user->email = $data['email'];
        }

        if ($data['password']) {
            $user->password = bcrypt($data['password']);
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Datos actualizados correctamente!');
    }
}
