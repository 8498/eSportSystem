@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('users.update') }}" class="form-horizontal">
        {{ csrf_field() }}
        <input name="id" type="hidden" value="{{ $vars->id }}">
        <div class="form-group">
            <div class="col-sm-8 col-sm-offset-2">
                <input name="name" type="text" class="form-control" value="{{ $vars->name }}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-8 col-sm-offset-2">
                <input name="email" type="email" class="form-control" value="{{ $vars->email }}">
            </div>
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-default">{{ ('Edytuj') }}</button>
        </div>
    </form>
@endsection