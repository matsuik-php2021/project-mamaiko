@extends('layouts.admin')
@section('content')
<h2>管理者ログイン</h2>
@include('commons/flash')
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