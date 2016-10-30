@extends('layouts.app')

@section('content')
    <section class="row">
        <div class="panel panel-default col-md-8 col-md-offset-2">
            <div class="panel-heading">
                <h3 class="panel-title">{{ _('Autor') }}</h3>
            </div>
            <div class="panel-body text-center">
                {{ _('Imie i nazwisko: Przemysław Łapiński') }}<br>
                {{ _('Email: przemyslaw.lapinski.8498@gmail.com') }}
            </div>
        </div>
    </section>
@endsection