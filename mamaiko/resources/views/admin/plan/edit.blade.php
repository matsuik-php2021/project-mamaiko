@extends('layouts.admin')
@section('content')
<h2>プラン情報更新(管理者ページ)</h2>
@include('commons/flash')
<form action="{{route('admin.plan.update')}}" method="post">
    @csrf
    <p>
        <label>名前<br>
        <input type="text" name="name" value="{{$plan->name}}"></label>
    </p>
    <p>
        <label>説明<br>
        <textarea name="description" cols="30" rows="10">{{$plan->description}}</textarea>
    </p>
    <p>
        <label>価格<br>
        <input type="number" name="price" value="{{$plan->price}}"></label>
    </p>
    <p>
        <label>部屋数<br>
        <input type="number" name="room_count" value="{{$plan->room_count}}"></label>
    </p>
    <p>
        <label>宿泊可能人数<br>
        <input type="number" name="people" value="{{$plan->people}}"></label>
    </p>
        <input type="hidden" name="id" value="{{$plan->id}}">
        <input type="hidden" name="hotel_id" value="{{$plan->hotel_id}}">
    <p>
        <button type="submit">情報を更新</button>
    </p>
</form>
@endsection