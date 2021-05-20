@extends('layouts.app')
@section('content')
<h1>確認画面</h1>
<p>以下の内容に間違いがないか、ご確認ください。</p>
    <dl>
        <dt>お名前</dt>
        <dd>{{ $user->name }}</dd>
        <dt>生年月日</dt>
        <dd>{{ $user->birthday }}</dd>
        <dt>住所</dt>
        <dd>{{ $user->address }}</dd>
        <dt>電話番号</dt>
        <dd>{{ $user->tel }}</dd>
        <dt>メールアドレス</dt>
        <dd>{{ $user->email }}</dd>
    </dl>
<form action="{{route('register')}}" method="post">
@csrf
    <label>
    <input type="hidden" name="name" value="{{ $user->name }}"></label>
    <label>
    <input type="hidden" name="birthday" value="{{ $user->birthday }}"></label>
    <label>
    <input type="hidden" name="address" value="{{ $user->address }}"></label>
    <label>
    <input type="hidden" name="tel" value="{{ $user->tel }}"></label>
    <label>
    <input type="hidden" name="email" value="{{ $user->email }}"></label>
    <label>
    <input type="hidden" name="password" value="{{ $user->password }}"></label>
<p>
    <button type="submit">この内容で登録する</button>
</p>
</form>
<a href = "/register">戻る</a>
@endsection
