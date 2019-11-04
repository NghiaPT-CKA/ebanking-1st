@extends('layouts.index')
@section('content')
    <div class="main">
        <section class="slide-wrapper" id="about">
            <div class="center-container">
                <!--header-->
                <div class="header-w3l">
                    <h1>Statistic</h1>
                </div>
                @if(!empty($data))
                    @foreach($data as $k => $v)
                    <div class="border-list">
                        <div class="w3_modal_body_grid w3_modal_body_grid1">
                            <span>To :</span>
                            <div class="clear"> </div>
                        </div>
                        <div class="w3_modal_body_grid w3_modal_body_grid1">
                            <div class="item_form">
                                <div>
                                    <lable>Transaction date:</lable>
                                </div>
                                <div>
                                    <lable>: {{empty($v->transaction_date)? '': $v->transaction_date}}</lable>
                                </div>
                            </div>
                            <div class="item_form">
                                <div>
                                    <lable>Name</lable>
                                </div>
                                <div>
                                    <lable>: {{empty($v->name)? '': $v->name}}</lable>
                                </div>
                            </div>
                            <div class="item_form">
                                <div>
                                    <lable>Account number:</lable>
                                </div>
                                <div>
                                    <lable>: {{empty($v->account2_id)? '': $v->account2_id}}</lable>
                                    <lable> {{empty($v->account3_id)? '': $v->account3_id}}</lable>
                                </div>
                            </div>
                            @if(!empty($data['bank_name']))
                                <div class="item_form">
                                    <div>
                                        <lable>Bank</lable>
                                    </div>
                                    <div>
                                        <lable>: {{empty($data['bank_name'])? '': $data['bank_name']}}</lable>
                                    </div>
                                </div>
                            @endif
                            <div class="item_form">
                                <div>
                                    <lable>Amount:</lable>
                                </div>
                                <div>
                                    <lable>: {{empty($v->amount)? '': $v->amount .' VND'}}</lable>
                                </div>
                            </div>
                        </div>
                    <!--//main-->
                    </div>
                    @endforeach
                @endif
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


