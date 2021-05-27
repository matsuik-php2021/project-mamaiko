@extends('layouts.app')
@section('content')
<h2>会員登録されました。</h2>
<!-- <a href="{{route('login')}}">ログイン画面へ</a> -->
<form action="{{route('login')}}" method="get">
    @csrf
    <button type="submit">ログイン画面へ</button>
</form>
@endsection