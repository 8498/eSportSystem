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
                    <th>Stanowisko</th>
                </tr>
                </thead>
                <tbody>
                @foreach($vars as $var)
                <tr>
                    <td>{{ $var->firstname }}</td>
                    <td>{{ $var->lastname }}</td>
                    <td>{{ $var->office->name }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('employees.edit', [$var->id]) }}">Edytuj</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{ route('employees.delete', [$var->id]) }}">Usun</a>
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{ route('employees.show', [$var->id]) }}">Więcej</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{ $vars->links() }}
            <a class="btn btn-success" href="#" data-toggle="modal" data-target="#create-employee-modal">Dodaj</a>
        </div>
    </section>

    @include('administration::modals.create-employee-modal')
@endsection