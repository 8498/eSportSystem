@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">{{ $vars['employee']->firstname }} {{ $vars['employee']->lastname }}</div>
    <div class="panel-body">
        <p>Stanowisko: {{ $vars['employee']['office']->name }}</p>
        <p>Wiek: {{ $vars['personalDetail']->age }}</p>
        <p>Numer tel: {{ $vars['personalDetail']->phone_number }}</p>
        <p>Numer dowodu: {{ $vars['personalDetail']->card_number }}</p>
        <p>Narodowość: {{ $vars['personalDetail']['nationality']->nationality_name }}</p>
        <h2>Adres</h2>
        <p>Kraj: {{ $vars['personalDetail']['address']['city']->country }}</p>
        <p>Województwo: {{ $vars['personalDetail']['address']['city']->state }}</p>
        <p>Miasto: {{ $vars['personalDetail']['address']['city']->city_name }}</p>
        <p>Kod pocztowy: {{ $vars['personalDetail']['address']['city']->postal_code }}</p>
        <p>Ulica: {{ $vars['personalDetail']['address']->street_name }}</p>
        <p>Numer domu: {{ $vars['personalDetail']['address']->house_number }}</p>
        <p>Numer mieszkania: {{ $vars['personalDetail']['address']->apartment_number }}</p>
    </div>
</div>

@endsection