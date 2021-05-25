@extends('layouts.app')
@section('content')
<h1>管理者メニュー</h1>
<p>
    <a href="{{route('admin.')}}" class="btn btn-secondary">予約管理</a>
</p>
<p>
    <a href="{{route('admin.')}}" class="btn btn-secondary">会員管理</a>
</p>
<p>
    <a href="{{route('admin.')}}" class="btn btn-secondary">ホテル情報管理</a>
</p>

<p><form action="{{route('admin.logout')}}" method="post">
    @csrf
    <button type="submit" class="btn btn-outline-info" style="font-style: bold;">ログアウト</button>
</form></p>

@endsection