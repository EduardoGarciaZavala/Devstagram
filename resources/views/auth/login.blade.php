@extends('layouts.app')

@section('titulo')
Inicia Sesion en DevStagra
@endsection

@section("contenido")
    <div class="md:flex md:justify-center md:gap-10 md:items-center">

        <div class="md:w-6/12 p-5">
            <img src="{{asset("img/login.jpg")}}" alt="imagen de usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">

            <form method="POST" action="{{route('login')}}">
                @csrf
                
                @if (session('mensaje'))
                    <p class="bg-red-500 text-white  m-2 rounded-lg text-sm p-2 text-center font-bold">
                        {{session('mensaje')}}
                    </p> 
                @endif

                <div class="mb-4">
                    <label for="email" id="email" class="mb-2 block uppercase text-gray-500 font-bold @error("email") border-red-500 @enderror">
                        Email
                    </label>
                    <input
                        class="border p-2 w-full rounded-lg"
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Tu Email"
                        value="{{old("email")}}"
                    />
                    @error("email")
                        <p class="bg-red-500 text-white  m-2 rounded-lg text-sm p-2 text-center font-bold">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" id="password" class="mb-2 block uppercase text-gray-500 font-bold @error("password") border-red-500 @enderror">
                        Password
                    </label>
                    <input
                        class="border p-2 w-full rounded-lg"
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Tu Password"
                    />
                    @error("password")
                        <p class="bg-red-500 text-white  m-2 rounded-lg text-sm p-2 text-center font-bold">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mb-5 flex gap-1 justify-self-center">
                    <input
                        type="checkbox"
                        name="remember"
                    >
                    <label for="remember" class="text-gray-500 text-sm">
                        Mantener Mi Sesion Abierta
                    </label>
                </div>

                <input 
                    type="submit"
                    value="Iniciar Sesion"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                >
                
            </form>

        </div>

    </div>
@endsection