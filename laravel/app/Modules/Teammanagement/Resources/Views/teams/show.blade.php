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
                <a class="btn btn-info" href="#" data-toggle="modal" data-target="#add-game-modal">Dodaj</a>
            </div>
        </div>
    </div>

    @include('teammanagement::modals.add-game-team-modal')
@endsection