@extends('layouts.app')
@section('content')
<h2>予約変更画面</h2>
@include('commons/flash')
<h3>ご予約ホテル名：{{$reservation->hotel->name}}</h3>
<p>プラン名：{{$reservation->plan->name}}</p>
<form action="{{route('reservation.update')}}" method="post">
    @csrf
    <p>
        <label>部屋数<br>
        <select name="room_count">
            @for ($i=1 ;$i<=$reservation->plan->room_count;$i++)
                <option value="{{$i}}"
                    <?= $i==$reservation->room_count ? "selected" : "" ?>
                >{{$i}}</option>
            @endfor
        </select>
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
    <p>
        <button type="submit">変更確定</button>
    </p>
</form>
<form action="{{ route('reservation.plan') }}" method="get">
    @csrf
    <button type="submit">予約一覧へ戻る</button>
</form>
<!-- <p><a href = "{{ route('reservation.plan') }}">予約一覧へ戻る</a></p> -->
@endsection