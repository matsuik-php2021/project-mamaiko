@extends('layouts.app')
@section('content')
<h1>ホテル検索</h1>
<form action="{{ url('/search_results') }}" method="get">
    <p><input type="text" name="hotel_name">ホテル名検索</p>
    <p><input type="number" name="price1">価格下限</p>
    <p><input type="number" name="price2">価格上限</p>
    <p><input type="number" name="people">宿泊人数</p>
    <button type="submit">検索</button>
</form>
@endsection