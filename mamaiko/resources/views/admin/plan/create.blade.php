@extends('layouts.app')
@section('content')
<h1>プラン作成(管理者ページ)</h1>
<form action="{{route('admin.plan.store')}}" method="post">
    @csrf
    <p>
        <label>プラン名<br>
        <input type="text" name="name" value="{{old('name')}}"></label>
    </p>
    <p>
        <label>説明<br>
        <textarea name="description" cols="30" rows="10"></textarea>
    </p>
    <p>
        <label>価格<br>
        <input type="number" name="price" value="{{old('price')}}"></label>
    </p>
    <p>
        <label>部屋数<br>
        <input type="number" name="room_count" value="{{old('room_count')}}"></label>
    </p>
    <p>
        <label>宿泊可能人数<br>
        <input type="number" name="people" value="{{old('people')}}"></label>
    </p>
        <input type="hidden" name="hotel_id" value="{{$hotel_id}}">
    <p>
        <button type="submit">プランを作成</button>
    </p>
</form>
@endsection