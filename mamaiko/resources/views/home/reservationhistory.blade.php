@extends('layouts.app')
@section('content')
<h1>宿泊履歴一覧</h1>
@if(count($reservations) > 0)
<table border="1">
    <tr>
        <th>ホテル名</th>
        <th>プラン名</th>
        <th>宿泊日程</th>
        <th></th>
    </tr>
    @foreach ($reservations as $reservation)
    <tr>
        <td><a href = "{{ route('hotelshow', $reservation->hotel_id) }}">{{ $reservation->hotel->name }}</a></td>
        <td>{{ $reservation->plan->name }} </a></td>
        <td>{{ $reservation->checkin_date }} ~ {{ $reservation->checkout_date }}</td>
        </td>
        <td><form action="{{route('review.form') }}" method="post">
        @csrf
        <input type="hidden" name="hotel_id" value="{{$reservation->hotel_id}}">
        <button type="submit"> レビュー投稿</button>
        </form></td>
    </tr>
    @endforeach
</table>
@else
<p>宿泊履歴はありません。</p>
@endif
<form action="javascript:history.back()" method="get">
    @csrf
    <button type="submit">戻る</button>
</form>   
@endsection