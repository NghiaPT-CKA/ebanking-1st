@extends('layouts.index')
@section('content')
    <div class="main">
        <section class="slide-wrapper" id="about">
            <div class="center-container">
                <!--header-->
                <div class="header-w3l">
                    <h1>Change Password</h1>
                </div>
                <!--//header-->
                <!--main-->
                <div class="agileits-register">
                    <form action="{{route('change_password',session('user')['id'])}}" method="post">
                        @csrf
                        <div class="w3_modal_body_grid w3_modal_body_grid1">
                            <span>Old Password</span>
                            <input type="password" name="old_password" placeholder="Enter Old Password" required=""/>
                            <div class="clear"> </div>
                        </div>
                        <div class="w3_modal_body_grid">
                            <span>New Password :</span>
                            <input id="new_password" class="@error('new_password') is-invalid @enderror" type="password" name="new_password" placeholder="Enter New Password" required=""/>
                            <div class="clear"> </div>
                        </div>
                        <div class="w3_modal_body_grid w3_modal_body_grid1">
                            <span>Confirm New Password :</span>
                            <input id="new_password_confirmation" class="@error('new_password_confirmation') is-invalid @enderror" type="password" name="new_password_confirmation" placeholder="Confirm New Password" required=""/>
                            <div class="clear"> </div>
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

