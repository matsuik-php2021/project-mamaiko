@extends('layouts.app')
@section('content')
<h2>ホテルの詳細</h2>
    <dl>
        @foreach($posts as $post)
        <img src="{{ asset('storage/' . $post->image) }}" width="85%" height="85%">
        @endforeach
        
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
    
    <dt>ご利用可能プラン</dt>
    @foreach($plans as $plan)
    <dd><a href = "{{ route('reservation.create', $plan->id) }}">{{ $plan->name }}</a> : {{ $plan->people }}人部屋、{{ $plan->price }}円</dd>

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
@endsection