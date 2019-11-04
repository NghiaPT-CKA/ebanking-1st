@extends('layouts.index')
@section('content')
    <div class="main">
        <section class="slide-wrapper" id="about">
            <div class="center-container">
                <!--header-->
                <div class="header-w3l">
                    <h1>Profile</h1>
                </div>
                <!--//header-->
                <!--main-->
                <div class="agileits-register">
                        <div class="w3_modal_body_grid w3_modal_body_grid1">
                            @foreach($user as $k => $v)
                                <div class="item_form">
                                    <div>
                                        <lable>{{$k}}</lable>
                                    </div>
                                    <div>
                                        <lable>{{$v}}</lable>
                                    </div>
                                </div>
                            @endforeach
                <!--//main-->
                        </div>
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
