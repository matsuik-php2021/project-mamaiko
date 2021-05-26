@extends('layouts.app')
@section('content')
<h2>レビュー</h2>
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
@endsection
