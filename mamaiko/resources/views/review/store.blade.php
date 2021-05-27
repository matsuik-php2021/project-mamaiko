@extends('layouts.app')
@section('content')
<h2>レビューを投稿しました。</h2>
<form action="{{route('toppage')}}" method="get">
    <button type="submit">トップページに戻る</button>
</form>
@endsection