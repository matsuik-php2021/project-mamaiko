@extends('layouts.admin')
@section('content')
<h2>管理者メニュー</h2>
<p>
    <a href="{{route('admin.reservation.index')}}" class="btn btn-secondary">予約管理</a>
</p>
<p>
    <a href="{{route('admin.user.index')}}" class="btn btn-secondary">会員管理</a>
</p>
<p>
    <a href="{{route('admin.hotel.index')}}" class="btn btn-secondary">ホテル情報管理</a>
</p>

<p><form action="{{route('admin.logout')}}" method="post">
    @csrf
    <button type="submit" class="btn btn-info">ログアウト</button>
</form></p>
@endsection