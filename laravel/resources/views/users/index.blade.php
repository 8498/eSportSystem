@extends('layouts.app')

@section('content')
    @include('partials.form-validation-errors')
    <section class="row">
        <div class="col-md-8 col-md-offset-2">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Nazwa</th>
                    <th>Email</th>
                    <th>Rola</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($vars as $var)
                @if(Auth::user()->id == $var->id)
                <tr class="info">
                    <td>{{ $var->name }}</td>
                    <td>{{ $var->email }}</td>
                    <td>{{ $var->role->name }}</td>
                    <td></td>
                    <td></td>
                </tr>
                @else
                <tr>
                    <td>{{ $var->name }}</td>
                    <td>{{ $var->email }}</td>
                    <td>{{ $var->role->name }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('users.edit', [$var->id]) }}">Edytuj</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{ route('users.delete', [$var->id]) }}">Usun</a>
                    </td>
                </tr>
                @endif
                @endforeach
                </tbody>
            </table>
            {{ $vars->links() }}
            <a class="btn btn-success" href="#" data-toggle="modal" data-target="#create-user-modal">Dodaj</a>
        </div>
    </section>
@endsection