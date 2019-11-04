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
                    <form action="{{route('otp_transfer_in')}}" method="post">
                        @csrf
                        <div class="w3_modal_body_grid w3_modal_body_grid1">
                            <span>FROM :</span>
                            <div class="clear"> </div>
                        </div>
                        <div class="w3_modal_body_grid w3_modal_body_grid1">
                            <div class="item_form">
                                <div>
                                    <lable>Name:</lable>
                                </div>
                                <div>
                                    <lable>{{$user->name}}</lable>
                                    <input type="hidden" name="user_id" value="{{$user->id}}"/>
                                </div>
                            </div>
                            <div class="item_form">
                                <div>
                                    <lable>Account number:</lable>
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
                            <div class="item_form">
                                <div>
                                    <lable>Available Balance:</lable>
                                </div>
                                <div>
                                    <lable id="ballance"></lable>
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
                                    <lable>Account number:</lable>
                                </div>
                                <div>
                                    <input type="tel" id="account_id" name="account_id" placeholder="Enter Account Number" value="{{empty(old('account_id'))? '': old('account_id')}}" required=""/>
                                </div>
                            </div>
                            <div class="item_form">
                                <div>
                                    <lable>Holder name:</lable>
                                </div>
                                <div>
                                    <lable id="account_name"></lable>
                                </div>
                            </div>
                            <div class="item_form">
                                <div>
                                    <lable>Amount:</lable>
                                </div>
                                <div>
                                    <input type="tel" name="amount" placeholder="Enter Amount" value="{{empty(old('amount'))? '': old('amount')}}" required=""/>
                                </div>
                            </div>
                            <div class="item_form">
                                <div>
                                    <lable>Transaction date:</lable>
                                </div>
                                <div>
                                    <lable>{{date('Y-m-d')}}</lable>
                                    <input type="hidden" name="transfer_date" value="{{date('Y-m-d')}}"/>
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
            <script>
                $("#account_id").on('change',function(){
                    var bank_id = $("#w3_country").val();
                    var account_id = $("#account_id").val();
                    $.ajax({
                        url: "{{route('seach_account_name')}}",
                        type: "get",
                        data:{"bank_id": bank_id,"account_id":account_id},
                        success: function(data){
                            console.log(data.hole_account.name);
                            $("#account_name").text(data.hole_account.name);
                        },
                        error: function(error){
                            console.log(error)
                        },
                        dataType: 'json'
                    })
                })
            </script>
            <script>
                $("#id_account").mouseup(function(){
                    var id_account = $("#id_account").val();
                    $.ajax({
                        url: "{{route('seach_ballance')}}",
                        type: "get",
                        data:{"id_account":id_account},
                        success: function(data){
                            console.log(data);
                            $("#ballance").text(formatNumber(data.ballance.ballance, '.', ',') + ' VND');
                        },
                        error: function(error){
                            console.log(error)
                        },
                        dataType: 'json'
                    })
                })
                function formatNumber(nStr, decSeperate, groupSeperate) {
                    nStr += '';
                    x = nStr.split(decSeperate);
                    x1 = x[0];
                    x2 = x.length > 1 ? '.' + x[1] : '';
                    var rgx = /(\d+)(\d{3})/;
                    while (rgx.test(x1)) {
                        x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
                    }
                    return x1 + x2;
                }
            </script>
        </section>
    </div>
@endsection

