@extends('layouts.app')

@section('content')
    @include('partials.form-validation-errors')
    <section class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Nazwa</th>
                </tr>
                </thead>
                <tbody>
                @foreach($vars as $var)
                <tr>
                    <td>{{ $var->name }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('offices.edit', [$var->id]) }}">Edytuj</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{ route('offices.delete', [$var->id]) }}">Usun</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{ $vars->links() }}
            <a class="btn btn-success" href="#" data-toggle="modal" data-target="#create-office-modal">Dodaj</a>
        </div>
    </section>

    @include('administration::modals.create-office-modal')
@endsection

