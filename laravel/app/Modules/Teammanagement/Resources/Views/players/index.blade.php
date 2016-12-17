@extends('layouts.app')

@section('content')
    @include('partials.form-validation-errors')
    <section class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Imie</th>
                    <th>Nazwisko</th>
                    <th>Nick</th>
                </tr>
                </thead>
                <tbody>
                @foreach($vars as $var)
                <tr>
                    <td>{{ $var->employee->firstname }}</td>
                    <td>{{ $var->employee->lastname }}</td>
                    <td>{{ $var->playerDetail->nickname }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('players.edit', [$var->id]) }}">Edytuj</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{ route('players.delete', [$var->id]) }}">Usun</a>
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('players.show', [$var->id]) }}">Więcej</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <a class="btn btn-success" href="#" data-toggle="modal" data-target="#create-player-modal">Dodaj</a>
        </div>
    </section>

    @include('teammanagement::modals.create-player-modal')
@endsection