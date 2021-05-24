@extends('layouts.app')
@section('content')
<h1>プランの詳細</h1>
<table border="1">
    <tr>
        <th>プラン名</th>
        <th>価格</th>
        <th>プラン内容</th>
        <th>残り部屋数</th>
        <th>人数</th>
    </tr>
    <tr>
        <td>{{ $plans->name }}</td>
        <td>{{ $plans->price }}</td>
        <td>{{ $plans->description }}</td>        
        <td>{{ $plans->room_count }}</td>
        <td>{{ $plans->people }}</td>
    </tr>
</table>
@endsection