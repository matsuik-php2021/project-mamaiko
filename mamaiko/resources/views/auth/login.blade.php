@extends('layouts.app')
@section('content')

<h1>ログイン</h1>
<form action="{{route('login')}}" method="post">
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