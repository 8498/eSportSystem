@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">{{ $vars['employee']->firstname }} {{ $vars['employee']->lastname }}</div>
    <div class="panel-body">
        <p>Wiek: {{ $vars['personalDetail']->age }}</p>
        <p>Numer tel: {{ $vars['personalDetail']->phone_number }}</p>
        <p>Numer dowodu: {{ $vars['personalDetail']->card_number }}</p>
    </div>
</div>

@endsection