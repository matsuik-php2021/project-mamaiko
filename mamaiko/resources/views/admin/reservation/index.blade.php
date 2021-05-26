@extends('layouts.admin')
@section('content')
<h1>予約リスト</h1>
<table class="table">
    <tr>
      <th>予約ID</th>
      <th>予約ユーザー</th>
      <th>予約ホテル</th>
      <th>予約プラン</th>
      <th>チェックイン日</th>
      <th>チェックアウト日</th>
      <th>部屋数</th>
      <th></th>
      <th></th>
    </tr>
        @foreach ($reservations as $reservation)
        <tr>
            <td>{{$reservation->id}}</td>
            <td>{{$reservation->user->name}}</td>
            <td>{{$reservation->hotel->name}}</td>
            <td>{{$reservation->plan->name}}</td>
            <td>{{$reservation->checkin_date}}</td>
            <td>{{$reservation->checkout_date}}</td>
            <td>{{$reservation->room_count}}</td>
            <td>
                <a href="{{route('admin.reservation.edit',$reservation->id)}}" class="btn btn-secondary">変更</a>
            </td>
            <td>
                <a href = "{{ route('admin.reservation.destroy', $reservation->id) }}" class="btn btn-secondary">予約キャンセル</a>
            </td>
        </tr>
        @endforeach
  </table>

<a href="{{route('admin.home.index')}}" class="btn btn-info">戻る</a>
@endsection