<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Authcontroller extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required",
            "password" => "required",
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect("/dashboard");
        }
        return back()->withErrors([
            'email' => 'Error bebé, contraseña o correo incorrecto.',
        ]);
    }

    public function perfil()
    {
        $user = auth()->user();
        if (!$user)
            return redirect('/login');

        $publicaciones = $user->publicaciones()->latest()->get();

        return view('perfil', compact('publicaciones', 'user'));
    }
}
