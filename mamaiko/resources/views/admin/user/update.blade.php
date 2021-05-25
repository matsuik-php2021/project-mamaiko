@extends('layouts.app')
@section('content')
<h1>会員情報更新(管理者ページ)</h1>
<form action="{{route('admin.user.store')}}" method="post">
    @csrf
    <p>
        <label>名前<br>
        <input type="text" name="name" value="{{$user->name}}"></label>
    </p>
    <p>
        <label>生年月日<br>
        <input type="date" name="birthday" value="{{$user->birthday}}"></label>
    </p>
    <p>
        <label>住所<br>
        <input type="text" name="address" value="{{$user->address}}"></label>
    </p>
    <p>
        <label>電話番号<br>
        <input type="text" name="tel" value="{{$user->tel}}"></label>
    </p>
    <p>
        <label>メールアドレス<br>
        <input type="email" name="email" value="{{$user->email}}"></label>
    </p>
    <input type="hidden" name="id" value="{{$user->id}}">
    <p>
        <button type="submit">情報を更新</button>
    </p>
</form>
@endsection