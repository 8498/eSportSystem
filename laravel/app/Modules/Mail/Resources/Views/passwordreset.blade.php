@extends('mail::layouts.layout')

@section('content')
    <h1>Witaj {{ $username }}</h1>

    <p>Twoje hasło zostało zresetowane przez Administratora eSportSystem.</p>
    <p>Twoje nowe hasło: {{ $newpassword }}</p>

    <p><a class="btn btn-primary" href="{{ route('welcome') }}">Zaloguj się</a></p>
@endsection
