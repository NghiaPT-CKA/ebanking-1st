@extends('layouts.index')
@section('content')
    <div class="main">
        <section class="slide-wrapper" id="about">
            <div class="center-container">
                <!--header-->
                <div class="header-w3l">
                    <h1>Statistic</h1>
                </div>
                <!--//header-->
                <!--main-->
                <div class="agileits-register">
                    <form action="{{route('get_statistic',session('user')['id'])}}" method="post">
                        @csrf
                        <div class="w3_modal_body_grid w3_modal_body_grid1">
                            <span>Account id :</span>
                            <div class="clear"> </div>
                        </div>
                        <div class="w3_modal_body_grid w3_modal_body_grid1">
                            <div class="item_form">
                                <div>
                                    <lable>Start date</lable>
                                </div>
                                <div>
                                    <select id="id_account" name="id_account" class="frm-field required">
                                        <option value="">Select account</option>
                                        @if(!empty($account))
                                            @foreach($account as $k => $v)
                                                <option value="{{$v->id}}" @if($v->id == old('id_account')) {{'selected'}} @endif>{{$v->id}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        <div class="w3_modal_body_grid w3_modal_body_grid1">
                            <span>From :</span>
                            <div class="clear"> </div>
                        </div>
                        <div class="w3_modal_body_grid w3_modal_body_grid1">
                            <div class="item_form">
                                <div>
                                    <lable>Start date</lable>
                                </div>
                                <div>
                                    <input type="date" id="account_id" name="start_date" value="{{empty(old('start_date'))? '': old('start_date')}}" placeholder="Enter start date" required=""/>
                                </div>
                            </div>
                            <div class="w3_modal_body_grid w3_modal_body_grid1">
                                <span>To :</span>
                                <div class="clear"> </div>
                            </div>
                            <div class="w3_modal_body_grid w3_modal_body_grid1">
                                <div class="item_form">
                                    <div>
                                        <lable>End date</lable>
                                    </div>
                                    <div>
                                        <input type="date" id="account_id" name="end_date" value="{{empty(old('end_date'))? '': old('end_date')}}" placeholder="Enter end date" required=""/>
                                    </div>
                                </div>
                            <div class="w3_modal_body_grid">

                                <input type="submit" value="Apply Now" />
                                <div class="clear"></div>
                            </div>

                    </form>
                </div>
                <!--//main-->
            </div>
            <!--footer-->
            <div class="footer">
                <h2>&copy; 2018 Home Loan Application Form. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></h2>
            </div>
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
            <!-- //Calendar -->
        </section>
    </div>
@endsection


