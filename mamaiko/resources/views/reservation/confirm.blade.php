@extends('layouts.app')
@section('content')
<h1>予約画面</h1>
<h2>{{$plan->name}}</h2>
<form action="{{route('reservation.confirm',$plan->id)}}" method="post">
    @csrf
        <input type="num" name="room_count" value="{{old('room_count')}}"></label>

        <label>チェックイン日<br>
        <input type="date" name="checkin_data" value="{{old('checkin_data')}}"></label>

        <label>チェックアウト日<br>
        <input type="date" name="checkout_data" value="{{old('checkout_data')}}"></label>

        <button type="submit">確認画面へ</button>

</form>
@endsection