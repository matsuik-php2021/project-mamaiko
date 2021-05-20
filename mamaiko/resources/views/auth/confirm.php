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
<p>
    <label>名前<br>
    <input type="hidden" name="name" value="{{ $user->name }}"></label>
</p>
<p>
    <label>生年月日<br>
    <input type="hidden" name="birthday" value="{{ $user->birthday }}"></label>
</p>
<p>
    <label>住所<br>
    <input type="hidden" name="address" value="{{ $user->address }}"></label>
</p>
<p>
    <label>電話番号<br>
    <input type="hidden" name="tel" value="{{ $user->tel }}"></label>
</p>
<p>
    <label>メールアドレス<br>
    <input type="hidden" name="email" value="{{ $user->email }}"></label>
</p>
<p>
    <label>パスワード<br>
    <input type="hidden" name="password" value="{{ $user->password }}"></label>
</p>
<p>
    <button type="submit">この内容で登録する</button>
</p>
</form>
<a href = "/register">戻る</a>
@endsection
