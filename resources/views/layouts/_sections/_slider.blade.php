<div id="first-slider">
    <div id="carousel-example-generic" class="carousel slide carousel-fade">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <!-- Item 1 -->
            <div class="item active slide1">
                <div class="row">
                    <div class="container">
                        <div class="col-md-9 text-left">
                            {{-- <h3 data-animation="animated bounceInDown">{{ trans('slider.cct') }}</h3>
                            <h4 data-animation="animated bounceInUp">{{ trans('slider.cct') }}</h4> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Item 2 -->
            <div class="item slide2">
                <div class="row">
                    <div class="container">
                        <div class="col-md-7 text-left">
                            {{-- <h3 data-animation="animated bounceInDown">{{ trans('slider.cct') }}</h3>
                            <h4 data-animation="animated bounceInUp">{{ trans('slider.cct') }}</h4> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Item 3 -->
            <div class="item slide3">
                <div class="row">
                    <div class="container">
                        <div class="col-md-7 text-left">
                            {{-- <h3 data-animation="animated bounceInDown">{{ trans('slider.cct') }}</h3>
                            <h4 data-animation="animated bounceInUp">{{ trans('slider.cct') }}</h4> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Item 4 -->
            <div class="item slide4">
                <div class="row">
                    <div class="container">
                        <div class="col-md-7 text-left">
                            {{-- <h3 data-animation="animated bounceInDown">{{ trans('slider.cct') }}</h3>
                            <h4 data-animation="animated bounceInUp">{{ trans('slider.cct') }}</h4> --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Item 4 -->
        </div>
        <!-- End Wrapper for slides-->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <i class="fa fa-angle-left"></i><span class="sr-only">{{ trans('slider.previous') }}</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <i class="fa fa-angle-right"></i><span class="sr-only">{{ trans('slider.next') }}</span>
        </a>
    </div>
</div>
