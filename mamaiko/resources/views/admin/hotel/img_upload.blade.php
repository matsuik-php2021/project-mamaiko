@extends('layouts.admin')
@section('content')
<h2>ホテルの画像を設定できます(管理者ページ)</h2>
<form action="{{ route('admin.hotel.upload') }}" method=”post” enctype="multipart/form-data">
    <p>
        <label>画像ファイル<input type=”file” name=”image”></label>
    </p>
    <p>
        <button type=”submit”>送信する</button>
    </p>
</form>

@endsection