@extends('layouts.index')
@section('content')
    <div class="main">
        <section class="slide-wrapper" id="about">
            <div class="center-container">
                <!--header-->
                <div class="header-w3l">
                    <h1>External Transfer</h1>
                </div>
                <!--//header-->
                <!--main-->
                <div class="agileits-register">
                    <form action="{{route('check_otp')}}" method="post">
                        @csrf
                        <div class="w3_modal_body_grid w3_modal_body_grid1">
                            <span>FROM :</span>
                            <div class="clear"> </div>
                        </div>
                        <div class="w3_modal_body_grid w3_modal_body_grid1">
                            <div class="item_form">
                                <div>
                                    <lable>Name</lable>
                                </div>
                                <div>
                                    <lable>: {{empty($data)? '':$data['name']}}</lable>
                                    <input type="hidden" name="user_id" value=""/>
                                </div>
                            </div>
                            <div class="item_form">
                                <div>
                                    <lable>Account number</lable>
                                </div>
                                <div>
                                    <lable>: {{empty($data)? '': $data['id_account']}}</lable>
                                </div>
                            </div>
                        </div>
                        <div class="w3_modal_body_grid w3_modal_body_grid1">
                            <span>To :</span>
                            <div class="clear"> </div>
                        </div>
                        <div class="w3_modal_body_grid w3_modal_body_grid1">
                            <div class="item_form">
                                <div>
                                    <lable>Name</lable>
                                </div>
                                <div>
                                    <lable>: {{empty($data)? '': $data['name_hole']}}</lable>
                                </div>
                            </div>
                            <div class="item_form">
                                <div>
                                    <lable>Account number:</lable>
                                </div>
                                <div>
                                    <lable>: {{empty($data)? '': $data['account_id']}}</lable>
                                </div>
                            </div>
                            @if(!empty($data['bank_name']))
                            <div class="item_form">
                                <div>
                                    <lable>Bank</lable>
                                </div>
                                <div>
                                    <lable>: {{empty($data)? '': $data['bank_name']}}</lable>
                                </div>
                            </div>
                            @endif
                            <div class="item_form">
                                <div>
                                    <lable>Amount:</lable>
                                </div>
                                <div>
                                    <lable>: {{empty($data)? '': number_format($data['amount'], 0, ',', '.').' VNĐ'}}</lable>
                                </div>
                            </div>
                            <div class="item_form">
                                <div>
                                    <lable>Transaction date:</lable>
                                </div>
                                <div>
                                    <lable>: {{empty($data)? '': $data['transfer_date']}}</lable>
                                </div>
                            </div>
                            <div class="item_form">
                                <div>
                                    <lable>OTP</lable>
                                </div>
                                <div>
                                    <input type="tel" id="account_id" name="otp" placeholder="Enter OTP" required=""/>
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

