@extends('layouts.app')
@section('content')
<h1>会員情報更新</h1>
<form action="{{route('confirm')}}" method="post">
    @csrf
    <p>
        <label>名前<br>
        <input type="text" name="name" value="{{Auth::user()->name}}"></label>
    </p>
    <p>
        <label>生年月日<br>
        <input type="date" name="birthday" value="{{old('birthday')}}"></label>
    </p>
    <p>
        <label>住所<br>
        <input type="text" name="address" value="{{old('address')}}"></label>
    </p>
    <p>
        <label>電話番号<br>
        <input type="text" name="tel" value="{{old('tel')}}"></label>
    </p>
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