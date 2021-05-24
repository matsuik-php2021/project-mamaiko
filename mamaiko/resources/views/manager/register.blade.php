@extends('layouts.app')
@section('content')
<h1>新規会員登録</h1>
<form action="{{route('manager.register')}}" method="post">
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
        <label>パスワード（確認用）<br>
        <input type="password" name="password_confirmation" value=""></label>
    </p>
    <p>
        <button type="submit">登録</button>
    </p>
</form>
@endsection