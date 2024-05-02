<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'terms' => 'required',
            'tipo_cedula' => 'required|max:255',
            'numero_cedula' => 'required',
            'fecha_nacimiento' => 'required|max:255',
            'tipo_sangre' => 'required|max:255',
            'estado_civil' => 'required|max:255',
            'genero' => 'required|max:255',
        ]);
        $user = User::create($attributes);
        auth()->login($user);

        return redirect('/dashboard');
    }
}
