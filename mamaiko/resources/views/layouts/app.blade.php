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
        font-style:bold;
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
    .evaluation{
        display: flex;
        flex-direction: row-reverse;
        justify-content: center;
    }
    .evaluation input[type='radio']{
        display: none;
    }
    .evaluation label{
        position: relative;
        padding: 10px 10px 0;
        color: gray;
        cursor: pointer;
        font-size: 50px;
    }
    .evaluation label .text{
        position: absolute;
        left: 0;
        top: 0;
        right: 0;
        text-align: center;
        font-size: 15px;
        color: black;

    }
    .evaluation label:hover,
    .evaluation label:hover ~ label,
    .evaluation input[type='radio']:checked ~ label{
        color: #ffcc00;
    }
    
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
                    
                    <a class="navbar-brand project-name" href="{{route('toppage')}}">????????????</a>
                    
                    <ul class="navigation">
                    @if (Auth::check())
                    <li>
                    <form name="logout" method="POST" action="{{route('logout')}}">
                        @csrf
                        <a class="navbar-brand header-right"href="javascript:logout.submit()" id="link">???????????????</a>
                    </form>
                    </li>
                    <li>
                        <div class="dropdown"> 
                            <button class="btn btn-secondary dropdown-toggle header-right2"
                                type="button" id="dropdownMenu1" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                ???????????????
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <a class="dropdown-item" href="{{route('reservation.plan')}}">????????????</a>
                                <a class="dropdown-item" href="{{route('reservation.history')}}">????????????</a>
                                <a class="dropdown-item" href="{{route('home.favoriteindex')}}">???????????????</a>
                                <a class="dropdown-item" href="{{route('home.update')}}">??????????????????</a>
                                <a class="dropdown-item" href="{{route('withdraw')}}">??????</a>
                            </div>
                        </div>
                    </li>
                    @else
                    <li>
                        <a class="navbar-brand header-right" href="{{route('login')}}" id="link">????????????</a>
                    </li>
                    <li>
                        <a class="navbar-brand header-right" href="{{route('register')}}" id="link">????????????</a>
                    </li>
                    @endif
                    </ul>
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