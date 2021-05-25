@extends('layouts.app')
@section('content')
<h1>プランの詳細</h1><br>
<table border="1">
    <tr>
        <th>プラン名</th>
        <th>価格</th>
        <th>プラン内容</th>
        <th>残り部屋数</th>
        <th>人数</th>
    </tr>
    <tr>
        <td>{{ $plan->name }}</td>
        <td>{{ $plan->price }}</td>
        <td>{{ $plan->description }}</td>        
        <td>{{ $plan->room_count }}</td>
        <td>{{ $plan->people }}</td>
    </tr>
</table>
@endsection