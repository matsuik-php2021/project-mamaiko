@extends('layouts.app')
@section('content')
<h1>退会画面</h1>

<h2>本当に退会しますか？</h2>

<p><a href="{{route('destroy')}}">はい</a></P>
<p><a href="{{route('mypage')}}">いいえ</a></P>


@endsection