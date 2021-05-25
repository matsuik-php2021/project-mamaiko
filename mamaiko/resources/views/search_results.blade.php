@extends('layouts.app')
@section('content')
<h1>検索結果</h1>
@if(!empty($searches))
<table border="1">
    <tr>
        <th>ホテル名</th>
        <th>プラン名</th>
        <th>価格</th>
        <th>人数</th>
    </tr>
    @foreach ($searches as $search)
    <tr>
        <td><a href = "{{ route('hotelshow', $search->hotel_id) }}">{{ $search->hotel->name }}</a></td>
        <td><a href = "{{ route('reservation.create', $search->id) }}">{{ $search->name }} </td>
        <td>{{ $search->price }}</td>
        <td>{{ $search->people }}</td>
    </tr>
    @endforeach
</table>
{{$searches->appends(request()->input())->links()}}
@else
    <p>検索結果に合うホテルがありませんでした。</p>
@endif
@endsection
