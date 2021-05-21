@extends('layouts.app')
@section('content')
<h1>ログイン完了</h1>
<form action="{{route('logout')}}" method="post">
    @csrf
    <input type="submit" value="ログアウト">
</form>
@endsection