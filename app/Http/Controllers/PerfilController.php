<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

    public function __construct()
    {
        //no puedes acceder a ningun metodo sin no estas autenticado 
        $this->middleware('auth');
    }

    public function index()
    {   
        return view('perfil.index');
    }

    public function store(Request $request)
    {
        //modificar el request
        $request->request->add(["username" => Str::slug($request->username)]);

     
        $this->validate($request,[
            "username" => ['required', 'unique:users,username,'.auth()->user()->id, 'min:2', 'max:20', 'not_in:editar-perfil']
        ]);

        if($request->imagen)
        {
            $imagen = $request->file('imagen');
            $nombreImagen  = Str::uuid() . '.' . $imagen->extension();
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000, 1000);
            $imagenPath = public_path('perfiles') . "/" . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }
        
        //guardar cambios
        $usuario = User::find(auth()->user()->id);

        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;

        $usuario->save();

        //redireccionar despues de guardar los cambios

        return redirect()->route('posts.index',$usuario->username);
    }
}
