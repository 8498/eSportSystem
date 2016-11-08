@if($errors->any())
    <section class="row">
        <div class="col-md-8 col-md-offset-2">
            @foreach($errors->all() as $error)
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Warning!</strong> {{ $error }}
                </div>
            @endforeach
        </div>
    </section>
@endif