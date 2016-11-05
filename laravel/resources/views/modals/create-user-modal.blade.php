<div id="create-user-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ ('Stwórz użytkownika') }}</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            <input name="email" type="email" class="form-control" placeholder="Podaj email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            <input name="password" type="password" class="form-control" placeholder="Podaj hasło">
                        </div>
                    </div>
                    <div class="form-group">
                        <div id="select" class="col-sm-8 col-sm-offset-2">
                            <options></options>
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