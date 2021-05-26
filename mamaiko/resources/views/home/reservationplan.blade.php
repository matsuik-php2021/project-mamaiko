@extends('layouts.app')
@section('content')
<h1>予約一覧</h1>
<table border="1">
    <tr>
        <th>ホテル名</th>
        <th>プラン名</th>
        <th>宿泊日程</th>
        <th></th>
        <th></th>
    </tr>
    @foreach ($reservations as $reservation)
    <tr>
        <td><a href = "{{ route('hotelshow', $reservation->hotel_id) }}">{{ $reservation->hotel->name }}</a></td>
        <td>{{ $reservation->plan->name }} </a></td>
        <td>{{ $reservation->checkin_date }} ~ {{ $reservation->checkout_date }}</td>
        <td>
        <a href = "{{ route('reservation.edit', $reservation->id) }}">予約変更</a>
        </td>
        <td>
        <a href = "{{ route('reservation.destroy', $reservation->id) }}">予約キャンセル</a>
        </td>
    </tr>
    @endforeach
</table>   
@endsection