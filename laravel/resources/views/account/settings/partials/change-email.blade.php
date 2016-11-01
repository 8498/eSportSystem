<form method="post" action="{{ route('change-email') }}" class="form-inline">
    {{ csrf_field() }}
    <div class="form-group">
    <input name="email" type="email" class="form-control" placeholder="Podaj nowy email">
  </div>
  <div class="form-group">
    <input name="email_confirmation" type="email" class="form-control" placeholder="Potwierdź nowy email">
  </div>
  <button type="submit" class="btn btn-default">Zmien</button>
</form>