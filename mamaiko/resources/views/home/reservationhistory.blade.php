@extends('layouts.app')
@section('content')
<h1>宿泊履歴一覧</h1>
<table border="1">
    <tr>
        <th>ホテル名</th>
        <th>プラン名</th>
        <th>宿泊日程</th>
    </tr>
    @foreach ($reservations as $reservation)
    <tr>
        <td><a href = "{{ route('hotelshow', $reservation->hotel_id) }}">{{ $reservation->hotel->name }}</a></td>
        <td>{{ $reservation->plan->name }} </a></td>
        <td>{{ $reservation->checkin_date }} ~ {{ $reservation->checkout_date }}</td>
        </td>
    </tr>
    @endforeach
</table>   
@endsection