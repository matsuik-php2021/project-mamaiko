@extends('layouts.app')
@section('content')
<h2>レビュー</h2>
@if(count($reviews) > 0)
<table border="1">
    <tr>
        <th>評価</th>
        <th>レビュー</th>
    </tr>
    @foreach($reviews as $review)
        <tr>
            <td>{{$review->rate}}</td>
            <td>{{$review->review}}</td>
        </tr>
    @endforeach
</table>
@else
<p>投稿されたレビューはありません。</p>
@endif
<!-- <form action="{{route('review.form') }}" method="post">
    @csrf
    <input type="hidden" name="hotel_id" value="{{$hotel_id}}">
    <button type="submit"> レビューを投稿する</button>
</form> -->
<form action="javascript:history.back()" method="get">
    @csrf
    <button type="submit">戻る</button>
</form>
@endsection
