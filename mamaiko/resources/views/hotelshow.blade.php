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
        <td>{{ $hotel->name }}</td>
        <td>{{ $hotel->address }}</td>
        <td>{{ $hotel->access }}</td>        
        <td>{{ $hotel->description }}</td>
        <td>{{ $hotel->checkin_time }}</td>
        <td>{{ $hotel->checkout_time }}</td>
    </tr>
    
    <!-- 
        ホテルクラスから直接プラン一覧を出す方法
        {{$hotel->plans()->get()[0]->name}} 
    -->
</table>
@endsection