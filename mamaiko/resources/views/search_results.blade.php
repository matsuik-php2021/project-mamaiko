@extends('layouts.app')
@section('content')
<h2>検索結果</h2>
@if(count($searches) > 0)
<table class="table">
    <tr>
        <th>ホテル名</th>
        <th>プラン名</th>
        <th>価格</th>
        <th>人数</th>
    </tr>
    @foreach ($searches as $search)
    <tr>
        <td><a href = "{{ route('hotelshow', $search->hotel_id) }}">{{ $search->hotel->name }}</a></td>
        <td><a href = "{{ route('reservation.create', $search->id) }}">{{ $search->name }} </a></td>
        <td>{{ $search->price }}</td>
        <td>{{ $search->people }}</td>
    </tr>
    @endforeach
</table>
{{$searches->appends(request()->input())->links()}}
@else
    <p>検索結果に合うホテルがありませんでした。</p>
@endif
<form action="javascript:history.back()" method="get">
    @csrf
    <button type="submit">戻る</button>
</form>
<!-- <a href="javascript:history.back()">[戻る]</a> -->
@endsection
