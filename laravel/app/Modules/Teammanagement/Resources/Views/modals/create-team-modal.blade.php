<div id="create-game-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ ('Dodaj druzyne') }}</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('teams.create') }}" class="form-horizontal">
                {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            <input name="name" type="text" class="form-control" placeholder="Podaj nazwe">
                        </div>
                        <div class="col-sm-8 col-sm-offset-2">
                            <input name="tag" type="text" class="form-control" placeholder="Podaj tag">
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-default">{{ ('Utwórz') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>