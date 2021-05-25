@extends('layouts.app')
@section('content')
<h2>ログイン完了</h2>
<a href="/mypage">マイページへ</a>
<form action="{{route('logout')}}" method="post">
    @csrf
    <input type="submit" value="ログアウト">
</form>
@endsection