@extends('layouts.admin')
@section('content')
<h2>ホテル情報更新(管理者ページ)</h2>
<form 
	method="post"
	action="{{ route('admin.hotel.update') }}"
	enctype="multipart/form-data"
>
    @csrf
    <p>
        <label>名前<br>
        <input type="text" name="name" value="{{$hotel->name}}"></label>
    </p>
    <p>
        <label>カテゴリID<br>
            <select name="category_id">
                <option></option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}"  <?= $hotel->category_id == $category->id ?  'selected' : '' ?> >
                        {{$category->name}}
                    </option>
                @endforeach
            </select>
    </p>
    <p>
        <label>説明<br>
        <textarea name="address" cols="30" rows="10">{{$hotel->description}}</textarea>
    </p>
    <p>
        <label>住所<br>
        <input type="text" name="address" value="{{$hotel->address}}"></label>
    </p>
    <p>
        <label>アクセス<br>
        <input type="text" name="tel" value="{{$hotel->access}}"></label>
    </p>
    <p>
        <label>チェックイン時間<br>
        <input type="time" name="checkin_time" value="{{$hotel->checkin_time}}"></label>
    </p>
    <p>
        <label>チェックアウト時間<br>
        <input type="time" name="checkout_time" value="{{$hotel->checkout_time}}"></label>
    </p>
    <p>
        画像(更新する場合に選択してください)<br>
        <input type="file" name="image" accept="image/png, image/jpeg">
        <input type="hidden" name="id" value="{{$hotel->id}}">
    </p>
    <p>
        <button type="submit">情報を更新</button>
    </p>
</form>
@endsection