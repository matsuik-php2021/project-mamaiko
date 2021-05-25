@extends('layouts.app')
@section('content')
<h1>会員情報更新(管理者ページ)</h1>
<form action="{{route('admin.hotel.update')}}" method="post">
    @csrf
    <p>
        <label>名前<br>
        <input type="text" name="name" value=""></label>
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
        <label>住所<br>
        <input type="text" name="address" value=""></label>
    </p>
    <p>
        <label>アクセル<br>
        <input type="text" name="tel" value=""></label>
    </p>
    <p>
        <label>チェックイン時間<br>
        <input type="time" name="checkin_time" value=""></label>
    </p>
    <p>
        <label>チェックアウト時間<br>
        <input type="time" name="checkout_time" value=""></label>
    </p>
    <p>
        <button type="submit">情報を更新</button>
    </p>
</form>
@endsection