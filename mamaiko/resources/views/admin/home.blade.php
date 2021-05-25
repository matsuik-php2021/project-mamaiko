@extends('layouts.app')
@section('content')
<h1>管理者ログイン完了</h1>
<form action="{{route('admin.logout')}}" method="post">
    @csrf
    <button type="submit">ログアウト</button>
</form>
@endsection