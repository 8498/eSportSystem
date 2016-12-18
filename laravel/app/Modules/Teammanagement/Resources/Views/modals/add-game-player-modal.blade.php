<div id="add-game-player-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ ('Przypisz gre') }}</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('players.add-game') }}" class="form-inline">
                {{ csrf_field() }}
                    <input name="player_id" type="hidden" class="form-control" value="{{ $vars->id }}">
                    <div class="form-group">
                        <select name="game_id" class="form-control">
                            @foreach($games as $game)
                                <option value="{{ $game->id }}">{{ $game->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-success">Dodaj</button>
                    </div>
            </form>
            </div>
        </div>
    </div>
</div>