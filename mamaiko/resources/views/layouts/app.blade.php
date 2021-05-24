<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mamaiko</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <div class="container">
                <div class="navbar-header">
                    <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                        <span class="icon-bar">a</span>
                        <span class="icon-bar">b</span>
                        <span class="icon-bar">c</span>
                    </button> -->
                    <a class="navbar-brand" href="route('home')">ままいこ</a>
                    @if (Auth::check())
                    <a href="{{route('mypage')}}">マイページ</a>
                    <form name="logout" method="POST" action="{{route('logout')}}">
                        @csrf
                        <a href="javascript:logout.submit()">ログアウト</a>
                    </form>
                    @else
                    <a href="{{route('login')}}">ログイン</a>
                    @endif
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>    
</body>
</html>