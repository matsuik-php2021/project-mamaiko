@extends('layouts.app')
@section('content')
<h1>ログイン完了</h1>
<a href="/mypage">マイページへ</a>
<form action="{{route('logout')}}" method="post">
    @csrf
    <input type="submit" value="ログアウト">
</form>
@endsection