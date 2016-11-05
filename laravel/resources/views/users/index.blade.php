@extends('layouts.app')

@section('content')
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
                @if(Auth::user()->id = $var->id)
                <tr class="info">
                    <td>{{ $var->name }}</td>
                    <td>{{ $var->email }}</td>
                    <td>{{ $var->role->name }}</td>
                </tr>
                @else
                <tr>
                    <td>{{ $var->name }}</td>
                    <td>{{ $var->email }}</td>
                    <td>{{ $var->role->name }}</td>
                    <td>
                        <a class="btn btn-primary" href="#">Edytuj</a>
                        <a class="btn btn-danger" href="#">Usun</a>
                    </td>
                </tr>
                @endif
                @endforeach
                </tbody>
            </table>
            {{ $vars->links() }}
            <a class="btn btn-success" href="#">Dodaj</a>
        </div>
    </section>
@endsection