@extends('layouts.app')
@section('content')
<h2>予約変更画面</h2>
@include('commons/flash')
<h3>ご予約ホテル名：{{$reservation->hotel->name}}</h3>
<p>プラン名：{{$reservation->plan->name}}</p>
<p>部屋数：{{$reservation->room_count}}</p>
<p>チェックイン日時：{{$reservation->checkin_date}}</p>
<p>チェックアウト日時：{{$reservation->checkout_date}}</p>
<form action="{{route('reservation.update')}}" method="post">
    @csrf
    <p>
        <label>部屋数<br>
        <input type="num" name="room_count" value="{{$reservation->room_count}}"></label>
    </p>
    <p>
        <label>チェックイン日<br>
        <input type="date" name="checkin_date" value="{{$reservation->checkin_date}}"></label>
    </p>
    <p>
        <label>チェックアウト日<br>
        <input type="date" name="checkout_date" value="{{$reservation->checkout_date}}"></label>
    </p>
    <input type="hidden" name="id" value="{{$reservation->id}}">
    <!-- <input type="hidden" name="hotel_id" value="{{$reservation->hotel_id}}">
    <input type="hidden" name="plan_id" value="{{$reservation->plan_id}}">
    <input type="hidden" name="user_id" value="{{$reservation->user_id}}"> -->
    <p>
        <button type="submit">変更確定</button>
    </p>
</form>
<p><a href = "{{ route('reservation.plan') }}">予約一覧へ戻る</a></p>
@endsection