@extends('layouts.app')
@section('content')
<h1>ホテルの詳細</h1>
<table border="1">
    <tr>
        <th>ホテル名</th>
        <!-- <th>カテゴリ</th> -->
        <th>住所</th>
        <th>アクセス</th>
        <th>内容</th>
        <th>チェックイン</th>
        <th>チェックアウト</th>
    </tr>
    <tr>
        <td>{{ $hotels->name }}</td>
        <td>{{ $hotels->address }}</td>
        <td>{{ $hotels->access }}</td>        
        <td>{{ $hotels->description }}</td>
        <td>{{ $hotels->checkin_time }}</td>
        <td>{{ $hotels->checkout_time }}</td>
    </tr>
</table>
@endsection