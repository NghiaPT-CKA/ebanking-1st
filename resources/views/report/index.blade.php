@extends('layouts.index')
@section('content')
    <div class="main">
        <section class="slide-wrapper" id="about">
            <div class="center-container">
                <!--header-->
                <div class="header-w3l">
                    <h1>Print a receipt:</h1>
                    <a class="btn btn-primary" href="{{route('print_report')}}" role="button">YES</a>
                    <a class="btn btn-primary" href="{{route('back_report')}}" role="button">NO</a>
                <script type="text/javascript" src="/layout/form/js/jquery-2.1.4.min.js"></script>
                <!-- //js -->
                <!-- Calendar -->
                <script src="/layout/form/js/jquery-ui.js"></script>
                <script>
                    $(function() {
                        $( "#datepicker" ).datepicker();
                    });
                </script>
                <!-- //Calendar -->
        </section>
    </div>
@endsection


