<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Conjoint a Corporate Category Bootstrap Responsive website Template | Home :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8" />
    <meta name="keywords" content="Conjoint Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <link href="/layout/index/css/style.css" type="text/css" rel="stylesheet" media="all">
    <link href="/layout/index/css/fontawesome-all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/layout/form/css/jquery-ui.css" />
    <link rel="stylesheet" href="/layout/form/css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="/layout/home/css/style.css" type="text/css" media="all" />
    <link href="/layout/transfer/css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="/layout/home/bootstrap-4.3.1-dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="/layout/home/bootstrap-4.3.1-dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
{{--    <script type="text/javascript" src="/layout/home/js/jquery-3.4.1.min.js"></script>--}}
    <link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=GFS+Neohellenic:400,400i,700,700i&amp;subset=greek" rel="stylesheet">
</head>
<body>
<div class="sidenav text-center">
    <div class="side_top">
        <img src="/layout/index/images/about.jpg" alt="news image" class="img-fluid navimg">
        <h1 class="top_hd mt-2"><a href="index.html">{{Session('user')['name']}}</a></h1>
        <p class="top_hdp mt-2"><a href="{{route('logout')}}">Log out</a></p>
    </div>
    <!-- header -->
    <header>
        <div class="nav-top">
            <nav class="mnu mx-auto">
                <label for="drop" class="toggle">Menu</label>
                <input type="checkbox" id="drop">
                <ul class="menu">
                    <li class="active"><a href="{{route('show_login')}}" class="scroll">Home</a></li>
                    <li class="mt-sm-3"><a href="{{route('show_profile', session('user')['id'])}}" class="scroll">Profile</a></li>
                    <li class="mt-sm-3"><a href="{{route('show_transfer')}}" class="scroll">Transfer</a></li>
                    <li class="mt-sm-3"><a href="#news" class="scroll">News</a></li>
                    <li class="mt-sm-3"><a href="{{route('show_setting')}}" class="scroll">Setting</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- //header -->
</div>
@yield('content')
</body>
<footer>
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <script type="application/x-javascript">
        addEventListener("load", function() {setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); }
    </script>
</footer>
</html>
