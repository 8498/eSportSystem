<li><a href="{{ route('games.view') }}">{{ ('Gry') }}</a></li>
<li><a href="{{ route('teams.view') }}">{{ ('Drużyny') }}</a></li>
<li><a href="{{ route('players.view', ['status' => 'player']) }}">{{ ('Gracze') }}</a></li>
<li><a href="{{ route('players.view', ['status' => 'candidate']) }}">{{ ('Kandydaci') }}</a></li>