@extends('layouts.index')
@section('content')
<div class="main">
    <div class="main-top">
        <!-- header -->
        <!-- //header -->

        <!-- banner slider -->
        <div id="homepage-slider" class="st-slider">
            <input type="radio" class="cs_anchor radio" name="slider" id="play1" checked="" />
            <input type="radio" class="cs_anchor radio" name="slider" id="slide1" />
            <input type="radio" class="cs_anchor radio" name="slider" id="slide2" />
            <input type="radio" class="cs_anchor radio" name="slider" id="slide3" />
            <div class="images">
                <div class="images-inner">
                    <div class="image-slide">
                        <div class="banner-w3ls-1">
                            <div class="container">
                                <div class="slider-text-w3ls">
                                    <h3 class="banner-wthree-text"><span class="fa fa-dot-circle-o"> It pays to Discover.</span></h3>
                                    <h3 class="banner-wthree-text banner-wthree-text-2"><span
                                            class="fa fa-dot-circle-o"> Concise time for clarity.</span></h3>
                                    <h3 class="banner-wthree-text banner-wthree-text-3"><span
                                            class="fa fa-dot-circle-o"> Let us quote you happy.</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="image-slide">
                        <div class="banner-w3ls-2">
                            <div class="container">
                                <div class="slider-text-w3ls">
                                    <h3 class="banner-wthree-text"><span class="fa fa-dot-circle-o"> We keep our promises to you.</span></h3>
                                    <h3 class="banner-wthree-text banner-wthree-text-2"><span
                                            class="fa fa-dot-circle-o"> Taking care of what’s important.</span></h3>
                                    <h3 class="banner-wthree-text banner-wthree-text-3"><span
                                            class="fa fa-dot-circle-o">Insuring your future ... Today.</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="image-slide">
                        <div class="banner-w3ls-3">
                            <div class="container">
                                <div class="slider-text-w3ls">
                                    <h3 class="banner-wthree-text"><span class="fa fa-dot-circle-o"> Mortgages made easy!</span></h3>
                                    <h3 class="banner-wthree-text banner-wthree-text-2"><span
                                            class="fa fa-dot-circle-o"> My life. My card.</span></h3>
                                    <h3 class="banner-wthree-text banner-wthree-text-3"><span
                                            class="fa fa-dot-circle-o"> The critical difference.</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="labels">
                <div class="fake-radio">
                    <label for="slide1" class="radio-btn"></label>
                    <label for="slide2" class="radio-btn"></label>
                    <label for="slide3" class="radio-btn"></label>
                </div>
            </div>
        </div>
        <!-- //banner slider -->
    </div>

    <!-- copyright bottom -->
    <div class="copy-bottom bg-li py-2">
        <div class="container-fluid">
            <div class="d-md-flex text-center align-items-center">
                <!-- copyright -->
                <div class="copy_right mx-md-auto mb-md-0 mb-3">

                </div>
                <!-- //copyright -->
                <!-- move top icon -->
                <a href="contact.html" class="btn button-w3ls">
                    <span class="fa fa-volume-control-phone"></span> Hire Us
                </a>
                <!-- //move top icon -->
            </div>
        </div>
    </div>
</div>

</body>
@endsection
