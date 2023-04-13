@extends("layouts.app")

@section("titulo")
    DevStagram
@endsection

@section('contenido')

    <x-listar-post :posts="$posts" /> 

@endsection