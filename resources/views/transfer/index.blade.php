@extends('layouts.index')
@section('content')
    <div class="main">
        <div class="plans-section">
            <div class="plans-main">
                <div class="header-w3l">
                    <h1>Transaction</h1>
                </div>
                <div class="price-grid">
                    <div class="price-block agile">
                        <div class="price-gd-top pric-clr1">
                            <i class="fa fa-diamond" aria-hidden="true"></i>
                            <h4>Internal</h4>
                        </div>
                        <div class="price-gd-bottom">
                            <div class="price-selet pric-sclr1">
                                <a href="{{route('show_transfer_internal', session('user')['id'])}}" class="w3_agileits_sign_up2 popup-with-zoom-anim ab scroll" >Go</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="price-grid ">
                    <div class="price-block price-block1 agile">
                        <div class="price-gd-top pric-clr2">
                            <i class="fa fa-diamond" aria-hidden="true"></i>
                            <h4>External</h4>
                        </div>
                        <div class="price-gd-bottom">
                            <div class="price-selet pric-sclr2">
                                <a href="{{route('show_transfer_external', session('user')['id'])}}" class="w3_agileits_sign_up2 popup-with-zoom-anim ab scroll" >Go</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="price-grid lost">
                    <div class="price-block price-block2 agile">
                        <div class="price-gd-top pric-clr3">
                            <i class="fa fa-diamond" aria-hidden="true"></i>
                            <h4>Statistic</h4>
                        </div>
                        <div class="price-gd-bottom">
                            <div class="price-selet pric-sclr3">
                                <a href="{{route('show_statistic', session('user')['id'])}}" class="w3_agileits_sign_up2 popup-with-zoom-anim  ab scroll" >Go</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!-- //plans -->

        <!-- popup signup form -->
        <script type="text/javascript">
            window.onload = function () {
                document.getElementById("password1").onchange = validatePassword;
                document.getElementById("password2").onchange = validatePassword;
            }
            function validatePassword(){
                var pass2=document.getElementById("password2").value;
                var pass1=document.getElementById("password1").value;
                if(pass1!=pass2)
                    document.getElementById("password2").setCustomValidity("Passwords Don't Match");
                else
                    document.getElementById("password2").setCustomValidity('');
                //empty string means no validation error
            }
        </script>

        <!-- //popup signup form -->


        <!-- pop-up-box -->
        <script src="/layout/transfer/js/jquery.magnific-popup.js" type="text/javascript"></script>
        <script>
            $(document).ready(function() {
                $('.popup-with-zoom-anim').magnificPopup({
                    type: 'inline',
                    fixedContentPos: false,
                    fixedBgPos: true,
                    overflowY: 'auto',
                    closeBtnInside: true,
                    preloader: false,
                    midClick: true,
                    removalDelay: 300,
                    mainClass: 'my-mfp-zoom-in'
                });
            });
        </script>
        <!--//pop-up-box -->
    </div>

    </body>
@endsection
