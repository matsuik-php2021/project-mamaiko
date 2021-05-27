@extends('layouts.app')
@section('content')
<h2>予約画面</h2>
@include('commons/flash')
<h3>{{$plan->name}}</h3>

<p>{{$plan->description}}</p>
<p>{{$plan->price}}円</p>
最大{{$plan->can_reserve_count()}}部屋
<form action="{{route('reservation.confirm')}}" method="post">
    @csrf
    <p>
        <label>部屋数<br>
        <select name="room_count">
            @for ($i=1 ;$i<=$plan->can_reserve_count();$i++)
                <option value="{{$i}}">{{$i}}</option>
            @endfor
        </select>
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