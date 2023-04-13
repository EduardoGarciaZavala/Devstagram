@extends('layouts.app')

@section('titulo')
    Crea una nueva publicacion
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form id="dropzone" action="{{route('imagenes.store')}}" method="POST" enctype="multipart/form-data" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 px-10 bg-white p-6 rounded-lg shadow-xl mt-10 md:mt-0">
            <form action={{route('posts.store')}} method="POST">
                @csrf
                
                <div class="mb-4">
                    <label for="titulo" id="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input 
                        class="border p-2 w-full rounded-lg @error("name") border-red-500 @enderror"
                        type="text"
                        id="titulo"
                        name="titulo"
                        placeholder="Titulo de la Publicacion"
                        value="{{old("titulo")}}"
                    />
                    @error("titulo")
                        <p class="bg-red-500 text-white  m-2 rounded-lg text-sm p-2 text-center font-bold">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="descripcion" id="descripcion" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripcion
                    </label>
                    <textarea 
                        class="border p-2 w-full rounded-lg @error("name") border-red-500 @enderror"
                        id="descripcion"
                        name="descripcion"
                        placeholder="Descripcion de la Publicacion"
                    >{{old("descripcion")}}</textarea>
                    @error("descripcion")
                        <p class="bg-red-500 text-white  m-2 rounded-lg text-sm p-2 text-center font-bold">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input 
                        type="hidden"
                        name="imagen"
                        id="imagen"
                        value="{{old('imagen')}}"
                    >
                    @error("imagen")
                    <p class="bg-red-500 text-white  m-2 rounded-lg text-sm p-2 text-center font-bold">
                        {{$message}}
                    </p>
                @enderror
                </div>

                <input 
                    type="submit"
                    value="Publicar"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                >
            </form>
        </div>
    </div>
@endsection