@extends('layouts.app')
@section('content')
<h2>予約完了しました。</h2>
<form action="{{route('toppage')}}" method="get">
    @csrf
    <button type="submit">ホームへ戻る</button>
</form>
@endsection