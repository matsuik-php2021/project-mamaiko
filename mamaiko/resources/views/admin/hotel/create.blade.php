@extends('layouts.admin')
@section('content')
<h2>ホテル新規登録(管理者ページ)</h2>
<form action="{{route('admin.hotel.store')}}" method="post">
    @csrf
    <p>
        <label>名前<br>
        <input type="text" name="name" value="{{old('name')}}"></label>
    </p>
    <p>
        <label>カテゴリID<br>
            <select name="category_id">
                <option></option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
    </p>
    <p>
        <label>説明<br>
        <textarea name="description" cols="30" rows="10">{{old('description')}}</textarea>
    </p>
    <p>
        <label>住所<br>
        <input type="text" name="address" value="{{old('address')}}"></label>
    </p>
    <p>
        <label>アクセス<br>
        <input type="text" name="access" value="{{old('access')}}"></label>
    </p>
    <p>
        <label>チェックイン時間<br>
        <input type="time" name="checkin_time" value="{{old('checkin_time')}}"></label>
    </p>
    <p>
        <label>チェックアウト時間<br>
        <input type="time" name="checkout_time" value="{{old('checkout_time')}}"></label>
    </p>
    <p>
        <button type="submit">ホテル登録</button>
    </p>
</form>
@endsection