@extends('layouts.app')
@section('content')
<h1>ホテルの詳細</h1>
<!-- <table border="1">
    <tr>
        <th>ホテル名</th> -->
        <!-- <th>カテゴリ</th> -->
        <!-- <th>住所</th>
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
    </tr> -->
    
    <!-- 
        ホテルクラスから直接プラン一覧を出す方法
        {{$hotel->plans()->get()[0]->name}} 
    -->
<!-- </table> -->
    <dl>
        <dt>ホテル名</dt>
        <dd>{{ $hotel->name }}</dd>
        <dt>カテゴリ</dt>
        <dd>{{ $hotel->category()->get()[0]->name }}</dd>
        <dt>住所</dt>
        <dd>{{ $hotel->address }}</dd>
        <dt>アクセス</dt>
        <dd>{{ $hotel->access }}</dd>
        <dt>内容</dt>
        <dd>{{ $hotel->description }}</dd>
        <dt>チェックイン</dt>
        <dd>{{ $hotel->checkin_time }}</dd>
        <dt>チェックアウト</dt>
        <dd>{{ $hotel->checkout_time }}</dd>
    </dl>
    <dt>ご利用可能プラン</dt>
    @foreach($plans as $plan)
    <dd><a href = "{{ route('reservation.create', $plan->id) }}">{{ $plan->name }}</a> : {{ $plan->people }}人部屋、{{ $plan->price }}円</dd>

    @endforeach
@endsection