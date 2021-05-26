@extends('layouts.app')
@section('content')
<h2>ホテルリスト</h2>
<p>
    <a href="{{route('admin.hotel.create')}}" class="btn btn-secondary">新規登録</a>
</p>
<!-- <table class="table">
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
            <td>{{$hotel->category()}}</td>
            <td>{{$hotel->address}}</td>
            <td>{{$hotel->access}}</td>
            <td>{{$hotel->checkin_time}}</td>
            <td>{{$hotel->checkout_time}}</td>
            <td><a href="{{route('admin.hotel.edit',$hotel->id)}}" class="btn btn-secondary">変更</a></td>
        </tr>
        @endforeach
  </table> -->
@foreach ($hotels as $hotel)
    <div class="card">
        <!-- <img class="card-img-top" src="/images/pathToYourImage.png" alt="Card image cap"> -->
        <div class="card-body">
            <h4 class="card-title">{{$hotel->name}}</h4>
            <p class="card-text">
                <table>
                    <tr>
                        <td>概要</td>
                        <td>{{$hotel->description}}</td>
                    </tr>
                    <tr>
                        <td>住所</td>
                        <td>{{$hotel->address}}</td>
                    </tr>
                    <tr>
                        <td>アクセス</td>
                        <td>{{$hotel->access}}</td>
                    </tr>
                </table>
            </p>
            <a href="{{route('admin.hotel.show',$hotel->id)}}" class="btn btn-secondary">詳細</a>
        </div>
    </div>
@endforeach

{{$hotels->links()}}

<a href="{{route('admin.home.index')}}" class="btn btn-info">戻る</a>
@endsection