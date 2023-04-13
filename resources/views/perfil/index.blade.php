@extends('layouts.app')

@section('titulo')
Editar Perfil: {{auth()->user()->username}}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{route('perfil.store')}}" method="POST" enctype="multipart/form-data" class="mt-10 md:mt-0">
                @csrf
                <div class="mb-4">
                    <label for="username" id="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input 
                        class="border p-2 w-full rounded-lg @error("username") border-red-500 @enderror"
                        type="text"
                        id="username"
                        name="username"
                        placeholder="Tu Nombre de Usuario"
                        value="{{auth()->user()->username}}"
                    />
                    @error("username")
                        <p class="bg-red-500 text-white  m-2 rounded-lg text-sm p-2 text-center font-bold">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="imagen" id="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                        Imagen Perfil
                    </label>
                    <input 
                        class="border p-2 w-full rounded-lg @error("imagen") border-red-500 @enderror"
                        type="file"
                        id="imagen"
                        name="imagen"
                        accept=".jpg, .jpeg,.png"
                    />
                </div>

                <input 
                    type="submit"
                    value="Gaurdar Cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                >
            </form>
        </div>
    </div>
@endsection