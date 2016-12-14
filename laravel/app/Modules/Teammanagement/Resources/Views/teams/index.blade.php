@extends('layouts.app')

@section('content')
    @include('partials.form-validation-errors')
    <section class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Nazwa</th>
                    <th>Tag</th>
                </tr>
                </thead>
                <tbody>
                @foreach($vars as $var)
                <tr>
                    <td>{{ $var->name }}</td>
                    <td>{{ $var->tag }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('teams.edit', [$var->id]) }}">Edytuj</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{ route('teams.delete', [$var->id]) }}">Usun</a>
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('teams.show', [$var->id]) }}">Więcej</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <a class="btn btn-success" href="#" data-toggle="modal" data-target="#create-game-modal">Dodaj</a>
        </div>
    </section>

    @include('teammanagement::modals.create-team-modal')
@endsection