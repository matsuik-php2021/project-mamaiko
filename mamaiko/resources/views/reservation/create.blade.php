@extends('layouts.app')
@section('content')
<h1>予約画面</h1>
<h2>{{$plan->name}}</h2>
<form action="{{route('reservation.confirm')}}" method="post">
    @csrf
    <p>
        <label>部屋数<br>
        <input type="num" name="room_count" value="{{old('room_count')}}"></label>
    </p>
    <p>
        <label>チェックイン日<br>
        <input type="date" name="checkin_date" value="{{old('checkin_date')}}"></label>
    </p>
    <p>
        <label>チェックアウト日<br>
        <input type="date" name="checkout_date" value="{{old('checkout_date')}}"></label>
    </p>
    <input type="hidden" name="plan_id" value="{{$plan->id}}">
    <p>
        <button type="submit">確認画面へ</button>
    </p>
</form>
@endsection