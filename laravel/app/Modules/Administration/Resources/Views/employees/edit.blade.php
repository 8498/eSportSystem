@extends('layouts.app')

@section('content')
    @include('partials.form-validation-errors')
    <section>
        <form method="post" action="{{ route('employees.update') }}" class="form-horizontal">
        {{ csrf_field() }}
            <input name="id" type="hidden" value="{{ $vars->id }}">
            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-2">
                    <input name="name" type="text" class="form-control" value="{{ $vars->firstname }}">
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <input name="name" type="text" class="form-control" value="{{ $vars->lastname }}">
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <label for="office_id">Stanowisko</label>
                        <select id="select-offices" name="office" class="form-control"></select>
                </div>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-default">{{ ('Edytuj') }}</button>
            </div>
        </form>
    </section>
@endsection