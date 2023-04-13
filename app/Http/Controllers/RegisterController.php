<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        //modificar el request
        $request->request->add(["username" => Str::slug($request->username)]);

        //validacion
        $this->validate($request,
        [
            "name" => "required|max:30",
            "username" => "required|unique:users|min:2|max:20",
            "email" => "required|unique:users|email|max:60",
            "password" => "required|confirmed|min:6"
        ]);

        //registrar al usuario
        User::create(
        [
            "name" => $request->name,
            "username" => $request->username ,//convertir la cadena a minusculas y quitar espacios
            "email" => $request->email,
            "password" => Hash::make($request->password) // hashear los password antes de insertarlos en la bd
        ]);

        //autenticar al ususario
        auth()->attempt($request->only('emai', 'password'));

        //redireccionar al usuario
        return redirect()->route('posts.index');

    }
}
