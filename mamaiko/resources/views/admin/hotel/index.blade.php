@extends('layouts.app')
@section('content')
<h1>ホテルリスト</h1>
<p>
    <a href="{{route('admin.hotel.create')}}" class="btn btn-secondary">新規登録</a>
</p>
<table class="table">
    <tr>
      <th>ID</th>
      <th>名前</th>
      <th>カテゴリ</th>
      <th>住所</th>
      <th>アクセス</th>
      <th>チェックイン時間</th>
      <th>チェックアウト時間</th>
      <th></th>
    </tr>
        @foreach ($hotels as $hotel)
        <tr>
            <td>{{$hotel->id}}</td>
            <td>{{$hotel->name}}</td>
            <td>{{$hotel->category()->get()[0]->name}}</td>
            <td>{{$hotel->address}}</td>
            <td>{{$hotel->access}}</td>
            <td>{{$hotel->checkin_time}}</td>
            <td>{{$hotel->checkout_time}}</td>
            <td><a href="{{route('admin.hotel.edit',$hotel->id)}}" class="btn btn-secondary">変更</a></td>
        </tr>
        @endforeach
  </table>
{{$hotels->links()}}

<a href="{{route('admin.home.index')}}" class="btn btn-info">戻る</a>
@endsection