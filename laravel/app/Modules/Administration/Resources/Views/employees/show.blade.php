@extends('layouts.app')

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">{{ $vars->firstname }}</div>
  <div class="panel-body">
    Nazwisko: {{ $vars->lastname }}
  </div>
</div>

@endsection