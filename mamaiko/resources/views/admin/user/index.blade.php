@extends('layouts.admin')
@section('content')
<h1>ユーザーリスト</h1>
<table class="table">
    <tr>
      <th>ID</th>
      <th>名前</th>
      <th>メールアドレス</th>
      <th>住所</th>
      <th>電話番号</th>
      <th>誕生日</th>
      <th></th>
    </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->tel}}</td>
            <td>{{$user->birthday}}</td>
            <td><a href="{{route('admin.user.edit',$user->id)}}" class="btn btn-secondary">変更</a></td>
        </tr>
        @endforeach
  </table>

<a href="{{route('admin.home.index')}}" class="btn btn-info">戻る</a>
@endsection