@extends('layouts.app')
@section('content')
<h1>予約の確認画面</h1>
<p>以下の内容に間違いがないか、ご確認ください。</p>
    <dl>
        <dt>プラン名</dt>
        <dd>{{ $plan->name }}</dd>
        <dt>プラン内容</dt>
        <dd>{{ $plan->description }}</dd>
        <dt>価格</dt>
        <dd>{{ $plan->price }}</dd>
        <dt>部屋数</dt>
        <dd>{{ $request->room_count }}</dd>
        <dt>チェックイン日</dt>
        <dd>{{ $request->checkin_date }}</dd>
        <dt>チェックアウト日</dt>
        <dd>{{ $request->checkout_date }}</dd>
    </dl>
<form action="{{route('reservation.store')}}" method="post">
@csrf
    <input type="hidden" name="hotel_id" value="{{ $plan->hotel_id }}">
    <input type="hidden" name="plan_id" value="{{ $plan->id }}">
    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
    <input type="hidden" name="checkin_date" value="{{ $request->checkin_date }}">
    <input type="hidden" name="checkout_date" value="{{ $request->checkout_date }}">
    <input type="hidden" name="reservation_date" value="{{ date('Y-m-d') }}">
    <input type="hidden" name="room_count" value="{{ $request->room_count }}">
    <button type="submit">この内容で登録する</button>

</form>
<a href = "{{route('reservation.create',$plan->id)}}">戻る</a>
@endsection
