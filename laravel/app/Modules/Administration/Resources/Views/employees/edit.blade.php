@extends('layouts.app')

@section('content')
    @include('partials.form-validation-errors')
    <section>
        <form method="post" action="{{ route('employees.update') }}" class="form-horizontal">
        {{ csrf_field() }}
            <input name="nationality_id" type="hidden" value="{{ $vars['personalDetail']->nationality_id }}">
            <input name="address_id" type="hidden" value="{{ $vars['personalDetail']->address_id }}">
            <input name="personal_detail_id" type="hidden" value="{{ $vars['employee']->personal_detail_id }}">
            <input name="id" type="hidden" value="{{ $vars['employee']->id }}">
            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-2">
                    <label for="firstname">Imię</label>
                    <input name="firstname" type="text" class="form-control" value="{{ $vars['employee']->firstname }}">
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <label for="lastname">Nazwisko</label>
                    <input name="lastname" type="text" class="form-control" value="{{ $vars['employee']->lastname }}">
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <label for="office">Stanowisko</label>
                    <select id="select-offices" name="office" class="form-control"></select>
                </div>
                <!-- Personal Detail-->
                <div class="col-sm-8 col-sm-offset-2">
                    <label for="birthday">Data ur <small>(yyyy-mm-dd)</small></label>
                    <input name="birthday" type="date" class="form-control" value="{{ $vars['personalDetail']->birthday }}">
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <label for="phone_number">Nr tel.</label>
                    <input name="phone_number" type="text" class="form-control" value="{{ $vars['personalDetail']->phone_number }}">
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <label for="card_number">Nr dowodu.</label>
                    <input name="card_number" type="text" class="form-control" value="{{ $vars['personalDetail']->card_number }}">
                </div>
                <!-- Address -->
                <div class="col-sm-8 col-sm-offset-2">
                    <label for="street_name">Ulica</label>
                    <input name="street_name" type="text" class="form-control" value="{{ $vars['personalDetail']['address']->street_name }}">
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <label for="house_number">Nr domu</label>
                    <input name="house_number" type="number" class="form-control" value="{{ $vars['personalDetail']['address']->house_number }}">
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <label for="apartment_number">Nr mieszkania</label>
                    <input name="apartment_number" type="number" class="form-control" value="{{ $vars['personalDetail']['address']->apartment_number }}">
                </div>
                <!-- City -->
                <div class="col-sm-8 col-sm-offset-2">
                    <label for="country">Kraj</label>
                    <input name="country" type="text" class="form-control" value="{{ $vars['personalDetail']['address']['city']->country }}">
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <label for="city_name">Miasto</label>
                    <input name="city_name" type="text" class="form-control" value="{{ $vars['personalDetail']['address']['city']->city_name }}">
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <label for="postal_code">Kod pocztowy</label>
                    <input name="postal_code" type="text" class="form-control" value="{{ $vars['personalDetail']['address']['city']->postal_code }}">
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <label for="state">Województwo</label>
                    <input name="state" type="text" class="form-control" value="{{ $vars['personalDetail']['address']['city']->state }}">
                </div>
                <!-- Nationality -->
                <div class="col-sm-8 col-sm-offset-2">
                    <label for="nationality_name">Nardowośc</label>
                    <input name="nationality_name" type="text" class="form-control" value="{{ $vars['personalDetail']['nationality']->nationality_name }}">
                </div>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-default">{{ ('Edytuj') }}</button>
            </div>
        </form>
    </section>
@endsection