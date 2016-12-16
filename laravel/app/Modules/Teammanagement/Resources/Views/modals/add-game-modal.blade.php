<div id="add-game-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ ('Przypisz gre') }}</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('teams.add-game') }}" class="form-inline">
                {{ csrf_field() }}
                <div class="form-group">
                    <input name="team_id" type="hidden" class="form-control" value="{{ $vars['team']->id }}">
                    <select name="game_id" class="form-control">
                        @foreach($vars['games'] as $game)
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