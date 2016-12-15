@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">[{{ $vars['team']->tag }}] {{ $vars['team']->name }}</div>
    <div class="panel-body">
        <div class="col-md-8"></div>
        <div class="col-md-4">
            <h4>Gry</h4>
            @foreach($vars['team']->games as $teamGame)
                <form method="post" action="{{ route('teams.remove-game') }}">
                {{ csrf_field() }}
                    {{ $teamGame->name }}
                    <input name="team_id" type="hidden" value="{{ $vars['team']->id }}">
                    <input name="game_id" type="hidden" value="{{ $teamGame->id }}">
                    <button type="submit" class="btn btn-danger">Usuń</button>
                </form>
            @endforeach
            <form method="post" action="{{ route('teams.add-game') }}" class="form-inline">
            {{ csrf_field() }}
                <div class="form-group">
                    <input name="team_id" type="hidden" class="form-control" value="{{ $vars['team']->id }}">
                    <select name="game_id" class="form-control">
                        @foreach($vars['games'] as $game)
                            <option value="{{ $game->id }}">{{ $game->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-info">Dodaj</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection