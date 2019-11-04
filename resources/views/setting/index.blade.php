@extends('layouts.index')
@section('content')
    <div class="main">
        <section class="slide-wrapper" id="about">
            <div class="center-container">
                <!--header-->
                <div class="header-w3l">
                    <h1>Setting</h1>
                </div>
                <!--//header-->
                <!--main-->
                <div class="agileits-register">
                    <div class="w3_modal_body_grid w3_modal_body_grid1">
                            <div class="item_form">
                                <div>
                                    <a href="{{route('show_change_password')}}" class="">Change password</a>
                                </div>
                                <div>
                                    <lable></lable>
                                </div>
                            </div>
                    <!--//main-->

                    </div>
                    <!--footer-->
                    <!--//footer-->
                    <!-- js -->
                    <script type="text/javascript" src="/layout/form/js/jquery-2.1.4.min.js"></script>
                    <!-- //js -->
                    <!-- Calendar -->
                    <script src="/layout/form/js/jquery-ui.js"></script>
                    <script>
                        $(function() {
                            $( "#datepicker" ).datepicker();
                        });
                    </script>
        </section>
    </div>
@endsection
