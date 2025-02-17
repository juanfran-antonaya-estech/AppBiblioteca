@extends('layouts.app')

@section('content')
    <div class="container col-10">
        <h1>Bienvenido @auth
            {{ Auth::user()->name }}
            @endauth a la biblioteca de Juanfran</h1>
        @guest
            <h2>Regístrate para acceder a tu panel de préstamos de libros</h2>
        @else
            <livewire:panel-prestamos />
        @endguest
    </div>
@endsection
