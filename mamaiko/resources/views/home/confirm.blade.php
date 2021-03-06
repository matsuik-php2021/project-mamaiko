@extends('layouts.app')
@section('content')
<h2>更新内容 確認画面</h2>
<p>以下の内容に更新します。</p><br>
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
<form action="{{route('toppage')}}" method="get">
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
    <label>
    <input type="hidden" name="password_confirmation" value="{{ $user->password_confirmation }}"></label>
<p>
    <button type="submit">この内容で登録する</button>
</p>
</form>
<!-- <a href="javascript:history.back()">[戻る]</a> -->
<form action="javascript:history.back()" method="get">
    @csrf
    <button type="submit">戻る</button>
</form>
@endsection
