@extends('layouts.app')
@section('content')
<h1>管理者メニュー</h1>
<p>
    <a href="{{route('admin.')}}" class="btn btn-secondary">予約管理(未実装)</a>
</p>
<p>
    <a href="{{route('admin.user.index')}}" class="btn btn-secondary">会員管理</a>
</p>
<p>
    <a href="{{route('admin.')}}" class="btn btn-secondary">ホテル情報管理(未実装)</a>
</p>

<p><form action="{{route('admin.logout')}}" method="post">
    @csrf
    <button type="submit" class="btn btn-info">ログアウト</button>
</form></p>
<p>TODO:管理者ヘッダー</p>
@endsection