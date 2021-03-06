@extends('layouts.admin')
@section('content')
<h2>管理者登録</h2>
@include('commons/flash')
<form action="{{route('admin.register')}}" method="post">
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
        <button type="submit">確認画面へ</button>
    </p>
</form>
@endsection