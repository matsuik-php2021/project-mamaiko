@extends('layouts.app')
@section('content')
<h2>ホテルの詳細</h2>
    <dl>
        <dt>ホテル名</dt>
        <dd>{{ $hotel->name }}</dd>
        <dt>カテゴリ</dt>
        <dd>{{ $hotel->category() }}</dd>
        <dt>住所</dt>
        <dd>{{ $hotel->address }}</dd>
        <dt>アクセス</dt>
        <dd>{{ $hotel->access }}</dd>
        <dt>内容</dt>
        <dd>{{ $hotel->description }}</dd>
        <dt>チェックイン</dt>
        <dd>{{ $hotel->checkin_time }}</dd>
        <dt>チェックアウト</dt>
        <dd>{{ $hotel->checkout_time }}</dd>
    </dl>
    <h4>ご利用可能プラン</h4>
    @foreach ($plans as $plan)
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{$plan->name}}</h4>
            <p class="card-text">
                <table id = "left">
                    <tr>
                        <td>　　プラン内容</td>
                        <td>　{{$plan->description}}</td>
                    </tr>
                    <tr>
                        <td>　　価格</td>
                        <td>　{{$plan->price}}</td>
                    </tr>
                    <tr>
                        <td>　　アクセス</td>
                        <td>　{{$plan->room_count}}</td>
                    </tr>
                </table>
            </p>
            <a href="{{route('admin.hotel.edit',$hotel->id)}}" class="btn btn-secondary" id = "right">変更</a>
        </div>
    </div>
    @endforeach

@endsection