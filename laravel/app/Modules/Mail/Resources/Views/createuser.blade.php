@extends('mail::layouts.layout')

@section('content')
    <h1>Witaj {{ $user->name }}</h1>

    <p>Twoje konto zostało utworzone przez Administratora eSportSystem.</p>
    <h2>Dane logowania</h2>
    <p>Twoj email: {{ $user->email }}</p>
    <p>Twoje hasło: {{ $password }}</p>

    <p><a class="btn btn-primary" href="{{ route('welcome') }}">Zaloguj się</a></p>
@endsection
