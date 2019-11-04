<!--A Design by W3layouts
   Author: W3layout
   Author URL: http://w3layouts.com
   License: Creative Commons Attribution 3.0 Unported
   License URL: http://creativecommons.org/licenses/by/3.0/
   -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ebanking Sign up & login Form a Flat Responsive Widget Template :: w3layouts </title>
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Gaze Sign up & login Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design"
    />
    <script>
        addEventListener("load", function () { setTimeout(hideURLbar, 0); }, false); function hideURLbar() { window.scrollTo(0, 1); }
    </script>
    <!-- Meta tags -->
    <!--stylesheets-->
    <link href="/layout/XacThuc/css/style.css" rel='stylesheet' type='text/css' media="all">
    <!--//style sheet end here-->
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
</head>
<body>
<div class="mid-class">
    <div class="art-right-w3ls">
        <h2>Sign In and Sign Up</h2>
        <form action="{{route('check_login')}}" method="post">
            @csrf
            <div class="main">
                <div class="form-left-to-w3l">
                    <input type="text" name="email" placeholder="User email" required="">
                </div>
                <div class="form-left-to-w3l ">
                    <input type="password" name="password" placeholder="Password" required="">
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="btnn">
                <button type="submit">Sign In</button>
            </div>
        </form>
        <div class="w3layouts_more-buttn">
            <h3>Don't Have an account..?
                <a href="#content1">Sign Up Here
                </a>
            </h3>
        </div>
        <!-- popup-->
        <div id="content1" class="popup-effect">
            <div class="popup">
                <!--login form-->
                <div class="letter-w3ls">
                    <form action="{{route('check_register')}}" method="post">
                        @csrf
                        <div class="form-left-to-w3l">
                            <input type="text" name="name" placeholder="Username" required="">
                        </div>
                        <div class="form-left-to-w3l">
                            <input type="email" name="email" placeholder="Email" required="">
                        </div>
                        <div class="form-left-to-w3l ">
                            <input type="date" name="birthday" placeholder="Birthday" required="">
                        </div>
                        <div class="form-left-to-w3l margin-zero">
                            <select name="address">
                                <option value="null">Address</option>
                                @if(!empty($address))
                                    @foreach($address as $s => $v)
                                        <option value="{{$v->name}}">{{$v->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-left-to-w3l">
                            <input type="tel" name="tel" placeholder="Phone Number" required="">
                        </div>
                        <div class="form-left-to-w3l">
                            <input type="password" name="password" placeholder="Password" required="">
                        </div>
                        <div class="form-left-to-w3l">
                            <input type="password" name="password_confirmation" placeholder="Password Confirm" required="">
                        </div>
                        <div class="btnn">
                            <button type="submit">Sign Up</button>
                            <br>
                        </div>
                    </form>
                    <div class="clear"></div>
                </div>
                <!--//login form-->
                <a class="close" href="#">&times;</a>
            </div>
        </div>
        <!-- //popup -->
    </div>
    <div class="art-left-w3ls">
        <h1 class="header-w3ls">
            Ebanking
        </h1>
        <h1 class="header-w3ls">
            Sign up & login Form
        </h1>
    </div>
</div>
<footer class="bottem-wthree-footer">
    @include('sweetalert::alert')

</footer>
</body>
</html>
