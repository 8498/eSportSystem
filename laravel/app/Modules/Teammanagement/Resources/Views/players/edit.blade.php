@extends('layouts.app')

@section('content')
    @include('partials.form-validation-errors')
    <section>
        <form method="post" action="{{ route('players.update') }}" class="form-horizontal">
        {{ csrf_field() }}
            <input name="id" type="hidden" value="{{ $vars->id }}">
            <div class="form-group">
                <!-- Player Detail -->
                <div class="col-sm-8 col-sm-offset-2">
                    <label for="nickname">Nick</label>
                    <input name="nickname" type="text" class="form-control" value="{{ $vars->playerDetail->nickname }}">
                </div>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-default">{{ ('Edytuj') }}</button>
            </div>
        </form>
    </section>
@endsection