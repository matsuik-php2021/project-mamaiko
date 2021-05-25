@extends('layouts.app')
@section('content')

<h1>管理者ログイン</h1>
@if ($errors->count())
    <ul class="alert">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif
<form action="{{route('admin.login')}}" method="post">
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