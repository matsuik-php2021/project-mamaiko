@if($errors->count())
    <ul class="alert">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
@if (session('message'))
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="alert alert-warning">
                {{ session('message') }}
            </div>
        </div>
    </div>
@endif