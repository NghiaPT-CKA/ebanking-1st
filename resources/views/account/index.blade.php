@extends('layouts.index')
@section('content')
    <div class="main">
        <section class="slide-wrapper" id="about">
            <div class="center-container">
                <!--header-->
                <div class="header-w3l">
                    <h1>Account</h1>
                </div>
                <!--//header-->
                <!--main-->
                    <div class="agileits-register list-account">
                        <h4>Account list</h4>
                            @if(empty($account))
                                <div class="item_form">
                                    <lable>No data account</lable>
                                </div>
                            @else
                                <div class="item_form">
                                    <h5 >Tài khoản thanh toán :</h5>
                                </div>
                                @foreach($account as $k => $v)
                                    @if($v->category_id == 1)
                                    <div class="">
                                        <ul style="color: #FFF; margin-left: 1em; width: 100%">
                                            <li>
                                                <ul>
                                                    <li style="display: flex; margin-left: 1em;">
                                                        <div style="width: 30%">
                                                            <lable>ID</lable>
                                                        </div>
                                                        <div>
                                                            <lable>: {{$v->id}}</lable>
                                                        </div>
                                                    </li>
                                                    <li style="display: flex; margin-left: 1em;border-bottom: 1px solid #dee2e6;">
                                                        <div style="width: 30%">
                                                            <lable>Ballance</lable>
                                                        </div>
                                                        <div>
                                                            <lable>: {{$v->ballance}} VND</lable>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    @endif
                                @endforeach
                            <div class="item_form">
                                <h5 >Tài khoản tiết kiệm :</h5>
                            </div>
                            @foreach($account as $k => $v)
                                @if($v->category_id == 2)
                                    <div class="">
                                        <ul style="color: #FFF; margin-left: 1em; width: 100%">
                                            <li>
                                                <ul>
                                                    <li style="display: flex; margin-left: 1em;">
                                                        <div style="width: 30%">
                                                            <lable>ID</lable>
                                                        </div>
                                                        <div>
                                                            <lable>: {{$v->id}}</lable>
                                                        </div>
                                                    </li>
                                                    <li style="display: flex; margin-left: 1em;border-bottom: 1px solid #dee2e6;">
                                                        <div style="width: 30%">
                                                            <lable>ballance</lable>
                                                        </div>
                                                        <div>
                                                            <lable>: {{$v->Ballance}} VND</lable>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            @endforeach
                            @endif
                        </div>

                <div class="agileits-register list-account">
                    <form action="{{route('account_create', session('user')['id'])}}" method="post">
                        @csrf
                        <h4>Register</h4>
                        <div class="item_form">
                            <div>
                                <lable>Account Category:</lable>
                            </div>
                            <div>
                                <select id="w3_country" name="category_id" class="frm-field required">
                                    <option value="null">Select category</option>
                                    @if(!empty($categories))
                                        @foreach($categories as $k => $v)
                                            <option value="{{$v->id}}">{{$v->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="w3_modal_body_grid">

                            <input type="submit" value="Apply Now" />
                            <div class="clear"></div>
                        </form>
                        </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
            @endif

            <!--//main-->

            </div>
            <!--footer-->
            <div class="footer">
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

