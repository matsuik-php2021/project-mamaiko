@extends('layouts.app')
@section('content')
<h1>検索結果</h1>
@if(!empty($searches))
<table>
    <tr>
        <th>ホテル名</th>
        <th>価格</th>
        <th>人数</th>
    </tr>
    @foreach ($searches as $search)
    <tr>
        <td> {{ $search->hotel_name }}</td>
        <td>{{ $search->price }}</td>
        <td>{{ $search->people }}</td>
    </tr>
    @endforeach
</table>
@else
    <p>検索結果に合うホテルがありませんでした。</p>
@endif
@endsection