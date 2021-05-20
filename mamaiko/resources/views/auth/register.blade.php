<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>新規会員登録画面</title>
        /*<link rel="" href="">*/
    </head>

    <body>
        <header>
            <div class="container">
            <a class="" href="/home">トップページ</a>
            </div>
        </header>
        <main>
            <div class=container>
                <h1>新規会員登録</h1>
                <form action="{{route('conform')}}" method="post">
                    @csrf
                    <p>
                        <laravel>名前<br>
                        <input type="text" name="name" value="{{old('name')}}"></laravel>
                    </p>
                    <p>
                        <laravel>生年月日<br>
                        <input type="text" name="birthday" value="{{old('birthday')}}"></laravel>
                    </p>
                    <p>
                        <laravel>住所<br>
                        <input type="text" name="address" value="{{old('address')}}"></laravel>
                    </p>
                    <p>
                        <laravel>電話番号<br>
                        <input type="text" name="tel" value="{{old('tel')}}"></laravel>
                    </p>
                    <p>
                        <laravel>メールアドレス<br>
                        <input type="email" name="email" value="{{old('email')}}"></laravel>
                    </p>
                    <p>
                        <laravel>パスワード<br>
                        <input type="password" name="password" value=""></laravel>
                    </p>
                    <p>
                        <laravel>パスワード（確認用）<br>
                        <input type="password" name="password_confirmation" value=""></laravel>
                    </p>
                    <p>
                        <button type="submit">確認画面へ</button>
                    </p>
                </form>
            </div>
        </main>
    </body>
</html>