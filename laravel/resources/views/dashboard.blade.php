@extends('layouts.app')

@section('content')

<section>
    Witaj {{ Auth::user()->name }}
</section>    

@endsection
