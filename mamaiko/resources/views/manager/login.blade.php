@extends('layouts.app')
@section('content')

<h1>ログイン</h1>
@if ($errors->count())
    <ul class="alert">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<form action="{{route('manager.login')}}" method="post">
    @csrf
    <p>
        <label>メールアドレス<br>
        <input type="email" name="email" value="{{old('email')}}"></label>
    </p>
    <p>
        <label>パスワード<br>
        <input type="password" name="password" value=""></label>
    </p>
    <p>
        <button type="submit">ログイン</button>
    </p>
</form>
 @endsection