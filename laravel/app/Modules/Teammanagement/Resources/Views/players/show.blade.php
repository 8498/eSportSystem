@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">{{ $vars->employee->firstname }} {{ $vars->employee->lastname }}</div>
        <div class="panel-body">
            <div class="col-md-8">
                <p>Nick: {{ $vars->playerDetail->nickname }}</p>
                <p>Data ur: {{ $vars->employee->personalDetail->birthday }}</p>
                <p>Numer tel: {{ $vars->employee->personalDetail->phone_number }}</p>
                <p>Numer dowodu: {{ $vars->employee->personalDetail->card_number }}</p>
                <p>Narodowość: {{ $vars->employee->personalDetail->nationality->nationality_name }}</p>
                <h2>Adres</h2>
                <p>Kraj: {{ $vars->employee->personalDetail->address->city->country }}</p>
                <p>Województwo: {{ $vars->employee->personalDetail->address->city->state }}</p>
                <p>Miasto: {{ $vars->employee->personalDetail->address->city->city_name }}</p>
                <p>Kod pocztowy: {{ $vars->employee->personalDetail->address->city->postal_code }}</p>
                <p>Ulica: {{ $vars->employee->personalDetail->address->street_name }}</p>
                <p>Numer domu: {{ $vars->employee->personalDetail->address->house_number }}</p>
                <p>Numer mieszkania: {{ $vars->employee->personalDetail->address->apartment_number }}</p>
            </div>
            <div class="col-md-4">
                <h4>Gry</h4>
                @foreach($vars->games as $playerGame)
                    <form method="post" action="{{ route('players.remove-game') }}">
                    {{ csrf_field() }}
                        {{ $playerGame->name }}
                        <input name="player_id" type="hidden" value="{{ $vars->id }}">
                        <input name="game_id" type="hidden" value="{{ $playerGame->id }}">
                        <button type="submit" class="btn btn-danger">Usuń</button>
                    </form>
                @endforeach
                <a class="btn btn-info" href="#" data-toggle="modal" data-target="#add-game-modal">Dodaj</a>
            </div>
        </div>
    </div>

    @include('teammanagement::modals.add-game-player-modal')
@endsection