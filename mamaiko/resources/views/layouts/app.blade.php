<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mamaiko</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/main.css">
    <style>
    .project-name{
        font-size:1.5em;
        font-family:serif;
        font-style:bold;
        text-align:left;
    }    
    .header-right{
        text-align:right; 
        font-size:1.15em;
        margin: 0 0 0 auto;
    }
    .header-right2{
        text-align:right; 
        font-size:1em;
        margin: 0 0 0 auto;
    }
    body {
        width: 100%;
        height:100vh;
        background-image: url(/images/toppage.jpg);  
        background-position: center center; 
        background-repeat: no-repeat;  
        background-attachment: fixed; 
        background-size: cover;
    }
    #
    </style>    
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
                    
                    <a class="navbar-brand project-name" href="{{route('toppage')}}">ままいこ</a>
                    
                    <ul class="navigation">
                    @if (Auth::check())
                    <li>
                    <form name="logout" method="POST" action="{{route('logout')}}">
                        @csrf
                        <a class="navbar-brand header-right"href="javascript:logout.submit()" id="link">ログアウト</a>
                    </form>
                    </li>
                    <li>
                        <div class="dropdown"> 
                        <button class="btn btn-secondary dropdown-toggle header-right2"
                            type="button" id="dropdownMenu1" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            マイページ
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="{{route('reservation.plan')}}">予約一覧</a>
                            <a class="dropdown-item" href="{{route('reservation.history')}}">宿泊履歴</a>
                            <a class="dropdown-item" href="#!">お気に入り</a>
                            <a class="dropdown-item" href="{{route('home.update')}}">会員情報更新</a>
                            <a class="dropdown-item" href="{{route('withdraw')}}">退会</a>
                        </div>

                             /* <!-- <a class="dropdown-item" href="">予約一覧</a> 
                             <a class="dropdown-item" href="">宿泊履歴</a>
                             <a class="dropdown-item" href="">お気に入り</a>
                             <a class="dropdown-item" href="{{route('home.update')}}">会員情報更新</a>
                             <a class="dropdown-item" href="{{route('withdraw')}}">退会</a>
                            <div class="dropdown-divider"></div> 
                            <a class="dropdown-item" href="#">Something else here</a> -->
                        </div> */
                    </li>
                    @else
                    <li>
                        <a class="navbar-brand header-right" href="{{route('login')}}" id="link">ログイン</a>
                    </li>
                    <li>
                        <a class="navbar-brand header-right" href="{{route('register')}}" id="link">会員登録</a>
                    </li>
                    </ul>
                    @endif
                </div>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="haikei">
            @yield('content')
            </div>
        </div>
    </main>    
</body>
</html>