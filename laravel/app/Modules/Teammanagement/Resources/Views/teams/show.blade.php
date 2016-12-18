@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">[{{ $vars->tag }}] {{ $vars->name }}</div>
        <div class="panel-body">
            <div class="col-md-8">
                <div></div>
                <div>
                    <h4>Gracze</h4>
                    @foreach($vars->players as $teamPlayer)
                        <span style="border: 1px solid green; padding: 5px; margin: 5px;">
                            <strong>nick:</strong> {{ $teamPlayer->playerDetail->nickname }} 
                            <strong>imie:</strong> {{ $teamPlayer->employee->firstname }} 
                            <strong>nazwisko:</strong> {{ $teamPlayer->employee->lastname }}
                        </span>
                        <a class="btn btn-info btn-sm" href="{{ route('players.show', $teamPlayer->id) }}">Przejdz</a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <h4>Gry</h4>
                @foreach($vars->games as $teamGame)
                    <form method="post" action="{{ route('teams.remove-game') }}">
                    {{ csrf_field() }}
                        {{ $teamGame->name }}
                        <input name="team_id" type="hidden" value="{{ $vars['team']->id }}">
                        <input name="game_id" type="hidden" value="{{ $teamGame->id }}">
                        <button type="submit" class="btn btn-danger">Usuń</button>
                    </form>
                @endforeach
                <a class="btn btn-info" href="#" data-toggle="modal" data-target="#add-game-team-modal">Dodaj</a>
            </div>
        </div>
    </div>

    @include('teammanagement::modals.add-game-team-modal')
@endsection