@extends('layouts.app')
@section('content')
<h2>レビュー投稿画面</h2>
<b>評価</b><br>
<form action="{{route('review.store')}}" method="post">
    @csrf
    <div class="evaluation" value="{{old('rate')}}">
        <input id="star1" type="radio" name="rate" value="5" selected/>
        <label for="star1"><span class="text">良い</span>★</label>
        <input id="star2" type="radio" name="rate" value="4" />
        <label for="star2"><span class="text">少し良い</span>★</label>
        <input id="star3" type="radio" name="rate" value="3" />
        <label for="star3"><span class="text">普通</span>★</label>
        <input id="star4" type="radio" name="rate" value="2" />
        <label for="star4"><span class="text">少し悪い</span>★</label>
        <input id="star5" type="radio" name="rate" value="1" />
        <label for="star5"><span class="text">悪い</span>★</label>
    </div>
<b>内容</b><br>
<textarea name="review" cols="50" rows="10" placeholder="500字以内で感想を記入してください（任意）" maxlength="500" value="{{old('review')}}"></textarea>
<input type="hidden" value="{{$hotel_id}}" name="hotel_id"><br>
<button type="submit">この内容でレビューを投稿する</button>
</form>
<form action="{{route('review.index',$hotel_id)}}" method="get">
    <button type="submit">戻る</button>
</form>
@endsection