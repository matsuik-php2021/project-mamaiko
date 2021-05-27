@extends('layouts.app')
@section('content')
<h2>ホテルの詳細</h2>
    <dl>
        <img src="{{ asset('storage/'.$hotel->file_name) }}" width="85%" height="85%">
        
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
    
    <h5>ご利用可能プラン</h5>
@foreach($plans as $plan)
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
                        <td>　　部屋数</td>
                        <td>　{{$plan->room_count}}</td>
                    </tr>
                    <tr>
                        <td>　　宿泊可能人数</td>
                        <td>　{{$plan->people}}</td>
                    </tr>
                </table>
            </p>
            <a href="{{route('reservation.create', $plan->id)}}" class="btn btn-secondary" id = "right">予約する</a>
        </div>
    </div>
@endforeach

    @if(\Auth::user()->isLike($hotel->id))
        <form action="{{route('favorites.destroy') }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="hotel_id" value="{{$hotel->id}}">
        <button type="submit"> お気に入り解除</button>
        </form>
    @else
        <form action="{{route('favorites.store') }}" method="post">
            @csrf
            <input type="hidden" name="hotel_id" value="{{$hotel->id }}">
            <button type="submit">お気に入り登録</button>
        </form>
    @endif
    <form action="{{route('review.index', $hotel->id) }}" method="get">
        @csrf
        <button type="submit"> レビューを見る</button>
    </form>
    <form action="javascript:history.back()" method="get">
    @csrf
    <button type="submit">戻る</button>
    </form>
@endsection