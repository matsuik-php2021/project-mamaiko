@extends('layouts.app')
@section('content')
<h1>お気に入り</h1>

@foreach ($favorites as $favorite)
    <p><a href="{{ route('hotelshow', $favorite->id) }}">{{ $favorite->name}}</a></p>
    
@endforeach
<form action="javascript:history.back()" method="get">
    @csrf
    <button type="submit">戻る</button>
</form>


<!-- <th>ホテル名</th>
<a href=""></a>
// ホテルの詳細に飛ぶりんくを生成 -->

@endsection