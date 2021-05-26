@extends('layouts.admin')
@section('content')
<h2>ホテルリスト</h2>
<p>
    <a href="{{route('admin.hotel.create')}}" class="btn btn-secondary">新規登録</a>
</p>
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
<p><a href="{{route('admin.home.index')}}" class="btn btn-info">戻る</a></p>
@endsection