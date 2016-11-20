@extends('layouts.app')

@section('content')
    @include('partials.form-validation-errors')
    <section>
        <form method="post" action="{{ route('employees.update') }}" class="form-horizontal">
        {{ csrf_field() }}
            <input name="personal_detail_id" type="hidden" value="{{ $vars['employee']->personal_detail_id }}">
            <input name="id" type="hidden" value="{{ $vars['employee']->id }}">
            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-2">
                    <input name="firstname" type="text" class="form-control" value="{{ $vars['employee']->firstname }}">
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <input name="lastname" type="text" class="form-control" value="{{ $vars['employee']->lastname }}">
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <label for="office">Stanowisko</label>
                        <select id="select-offices" name="office" class="form-control"></select>
                </div>
                <!-- Personal Detail-->
                <div class="col-sm-8 col-sm-offset-2">
                    <input name="age" type="number" class="form-control" value="{{ $vars['personalDetail']->age }}">
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <input name="phone_number" type="text" class="form-control" value="{{ $vars['personalDetail']->phone_number }}">
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <input name="card_number" type="text" class="form-control" value="{{ $vars['personalDetail']->card_number }}">
                </div>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-default">{{ ('Edytuj') }}</button>
            </div>
        </form>
    </section>
@endsection