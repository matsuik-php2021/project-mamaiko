@if($errors->count())
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
@if (session('message'))
    <ul class="alert">
                <li>{{ session('message') }}</li>
    </ul>
@endif