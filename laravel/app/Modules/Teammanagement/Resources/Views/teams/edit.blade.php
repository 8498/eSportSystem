@extends('layouts.app')

@section('content')
    @include('partials.form-validation-errors')
    <section>
        <form method="post" action="{{ route('teams.update') }}" class="form-horizontal">
        {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $vars->id }}">
            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-2">
                    <label for="name">Nazwa</label>
                    <input name="name" type="text" class="form-control" value="{{ $vars->name }}">
                </div>
                <div class="col-sm-8 col-sm-offset-2">
                    <label for="tag">Tag</label>
                    <input name="tag" type="text" class="form-control" value="{{ $vars->tag }}">
                </div>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-default">{{ ('Edytuj') }}</button>
            </div>
        </form>
    </section>
@endsection