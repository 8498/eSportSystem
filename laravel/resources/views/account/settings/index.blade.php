@extends('layouts.app')

@section('content')
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#change-email">Zmien email</a></li>
    <li><a data-toggle="tab" href="#change-password">Zmien haslo</a></li>
</ul>

<div class="tab-content">
    <div id="change-email" class="tab-pane fade in active text-center">
        @include('account.settings.partials.change-email')
    </div>
    <div id="change-password" class="tab-pane fade text-center">
        @include('account.settings.partials.change-password')
    </div>
</div>
@endsection