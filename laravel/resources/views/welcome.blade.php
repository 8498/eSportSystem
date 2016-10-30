@extends('layouts.app')

@section('content')
    <section>
        <div class="jumbotron">
            <div class="text-center">
                <h1>{{ ('eSportSystem') }}</h1>
                <p>{{ ('Witaj w Systemie zarządzania organizacją e-sportową') }}</p>
                <p><a class="btn btn-primary btn-lg" href="{{ route('about') }}" role="button">{{ ('Autor') }}</a></p>
            </div>
        </div>
    </section>
@endsection