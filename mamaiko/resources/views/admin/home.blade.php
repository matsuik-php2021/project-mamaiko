@extends('layouts.app')
@section('content')
<h2>管理者ログイン完了</h2>
<form action="{{route('admin.logout')}}" method="post">
    @csrf
    <button type="submit">ログアウト</button>
</form>
@endsection