@extends('layouts.app')
@section('content')
<h1>マイページ</h1>
    <p><a href="{{route('mypage')}}">予約一覧</a></P>
    <p><a href="{{route('mypage')}}">宿泊履歴</a></P>
    <p><a href="{{route('mypage')}}">お気に入り</a></P>
    <p><a href="{{route('home.update')}}">会員情報更新</a></P>
    <p><a href="{{route('mypage')}}">退会</a></P>
    
@endsection