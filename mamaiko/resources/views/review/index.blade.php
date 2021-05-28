@extends('layouts.app')
@section('content')
<h2>{{$hotel->name}}の口コミ一覧</h2>
@include('commons/flash')
@if(count($hotel->reviews) > 0)
<table border="1">
    <tr>
        <th>評価</th>
        <th>レビュー</th>
    </tr>
    @foreach($hotel->reviews as $review)
        <tr>
            <td>{{$review->rate}}</td>
            <td>{{$review->review}}</td>
        </tr>
    @endforeach
</table>
@else
<p>投稿されたレビューはありません。</p>
@endif
<p></p>
<form action="{{route('hotelshow',$hotel->id)}}" method="get">
    @csrf
    <p><button type="submit">ホテル詳細画面へ戻る</button></p>
</form>
<!-- <form action="javascript:history.back()" method="get">
    @csrf
    <button type="submit">戻る</button>
</form> -->
@endsection
