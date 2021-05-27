@extends('layouts.app')
@section('content')
<h2>退会画面</h2><br>

<h4>本当に退会しますか？</h4><br>


<a href="{{route('destroy')}}" id="btn" style="display:inline">はい</a>
<a href="{{route('toppage')}}" id="btn" style="display:inline">いいえ</a>

@endsection