<div id="add-team-player-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ ('Przypisz drużyne') }}</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('players.add-team') }}" class="form-inline">
                {{ csrf_field() }}
                <div class="form-group">
                    <input name="player_id" type="hidden" class="form-control" value="{{ $vars->id }}">
                    <select name="team_id" class="form-control">
                        @foreach($teams as $team)
                            <option value="{{ $team->id }}">{{ $team->tag }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-success">Dodaj</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>