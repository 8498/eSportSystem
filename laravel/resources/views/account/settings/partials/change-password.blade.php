<form method="post" action="{{ route('change-password') }}" class="form-inline">
    {{ csrf_field() }}
    <div class="form-group">
    <input name="password" type="password" class="form-control" placeholder="Podaj nowe hasło">
  </div>
  <div class="form-group">
    <input name="password_confirmation" type="password" class="form-control" placeholder="Potwierdź nowe hasło">
  </div>
  <button type="submit" class="btn btn-default">Zmien</button>
</form>