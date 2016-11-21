@extends('mail::layouts.layout')

@section('content')
    <h1>Witaj {{ $user->name }}</h1>

    <p>Twoje hasło zostało zresetowane przez Administratora eSportSystem.</p>
    <p>Twoje nowe hasło: {{ $password }}</p>

    <p><a class="btn btn-primary" href="{{ route('welcome') }}">Zaloguj się</a></p>
@endsection
