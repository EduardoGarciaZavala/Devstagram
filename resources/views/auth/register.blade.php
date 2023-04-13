@extends("layouts.app")

@section("titulo")
    Registrate en DevStagram
@endsection

@section("contenido")
    <div class="md:flex md:justify-center md:gap-10 md:items-center">

        <div class="md:w-6/12 p-5">
            <img src="{{asset("img/registrar.jpg")}}" alt="imagen registro de usuarios">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">

            <form action={{route("register")}} method="POST">
                @csrf
                
                <div class="mb-4">
                    <label for="name" id="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input 
                        class="border p-2 w-full rounded-lg @error("name") border-red-500 @enderror"
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Tu Nombre"
                        value="{{old("name")}}"
                    />
                    @error("name")
                        <p class="bg-red-500 text-white  m-2 rounded-lg text-sm p-2 text-center font-bold">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="username" id="username" class="mb-2 block uppercase text-gray-500 font-bold @error("username") border-red-500 @enderror">
                        Username
                    </label>
                    <input 
                        class="border p-2 w-full rounded-lg"
                        type="text"
                        id="username"
                        name="username"
                        placeholder="Tu Nombre de Usuario"
                        value="{{old("username")}}"
                    />
                    @error("username")
                        <p class="bg-red-500 text-white  m-2 rounded-lg text-sm p-2 text-center font-bold">
                            {{$message}}
                        </p>
                    @enderror
                </div>

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

                <div class="mb-4">
                    <label for="password_confirmation" id="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold @error("password_confirmation") border-red-500 @enderror">
                        Repetir Password
                    </label>
                    <input
                        class="border p-2 w-full rounded-lg"
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Repite Tu Password"
                    />
                    @error("password_confirmation")
                        <p class="bg-red-500 text-white  m-2 rounded-lg text-sm p-2 text-center font-bold">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <input 
                    type="submit"
                    value="Crear Cuenta"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
                >
                
            </form>

        </div>

    </div>
@endsection