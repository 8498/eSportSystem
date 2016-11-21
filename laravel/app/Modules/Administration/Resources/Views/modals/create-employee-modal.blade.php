<div id="create-employee-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">{{ ('Dodaj pracownika') }}</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('employees.create') }}" class="form-horizontal">
                {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-2">
                            <input name="firstname" type="text" class="form-control" placeholder="Podaj imie">
                        </div>
                        <div class="col-sm-8 col-sm-offset-2">
                            <input name="lastname" type="text" class="form-control" placeholder="Podaj nazwisko">
                        </div>
                        <div class="col-sm-8 col-sm-offset-2">
                            <label for="office_id">Stanowisko</label>
                            <select id="select-offices" name="office" class="form-control"></select>
                        </div>
                        @include('partials.form-personal-details')
                        <div class="col-sm-8 col-sm-offset-2">
                            <input name="nationality_name" type="text" class="form-control" placeholder="Podaj narodowość">
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