@extends('layouts.Shopping')

@section('content_Shopping')

    <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <!--/.carousel-indicator -->
        <ol class="carousel-indicators">
            <li data-target="#header-carousel" data-slide-to="0" class="active"><span class="small-circle"></span></li>
            <li data-target="#header-carousel" data-slide-to="1"><span class="small-circle"></span></li>
            <li data-target="#header-carousel" data-slide-to="2"><span class="small-circle"></span></li>
        </ol><!-- /ol-->
        <!--/.carousel-indicator -->

        <!--/.carousel-inner -->
        <div class="carousel-inner" role="listbox">
            <!-- .item -->
            <div class="item active">
                <div class="single-slide-item slide1">
                    <div class="container">
                        <div class="welcome-hero-content">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="single-welcome-hero">
                                        <div class="welcome-hero-txt">
                                            <h4>great design collection</h4>
                                            <h2>cloth covered accent chair</h2>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiuiana smod tempor  ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
                                            </p>
                                            <div class="packages-price">
                                                <p>
                                                    $ 399.00
                                                    <del>$ 499.00</del>
                                                </p>
                                            </div>
                                            <button class="btn-cart welcome-add-cart" onclick="window.location.href='#'">
                                                <span class="lnr lnr-plus-circle"></span>
                                                add <span>to</span> cart
                                            </button>
                                            <button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='#'">
                                                more info
                                            </button>
                                        </div><!--/.welcome-hero-txt-->
                                    </div><!--/.single-welcome-hero-->
                                </div><!--/.col-->
                                <div class="col-sm-5">
                                    <div class="single-welcome-hero">
                                        <div class="welcome-hero-img">
                                            <img src="shop/images/slider/slider1.png" alt="slider image">
                                        </div><!--/.welcome-hero-txt-->
                                    </div><!--/.single-welcome-hero-->
                                </div><!--/.col-->
                            </div><!--/.row-->
                        </div><!--/.welcome-hero-content-->
                    </div><!-- /.container-->
                </div><!-- /.single-slide-item-->

            </div><!-- /.item .active-->

            <div class="item">
                <div class="single-slide-item slide2">
                    <div class="container">
                        <div class="welcome-hero-content">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="single-welcome-hero">
                                        <div class="welcome-hero-txt">
                                            <h4>great design collection</h4>
                                            <h2>mapple wood accent chair</h2>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiuiana smod tempor  ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
                                            </p>
                                            <div class="packages-price">
                                                <p>
                                                    $ 199.00
                                                    <del>$ 299.00</del>
                                                </p>
                                            </div>
                                            <button class="btn-cart welcome-add-cart" onclick="window.location.href='#'">
                                                <span class="lnr lnr-plus-circle"></span>
                                                add <span>to</span> cart
                                            </button>
                                            <button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='#'">
                                                more info
                                            </button>
                                        </div><!--/.welcome-hero-txt-->
                                    </div><!--/.single-welcome-hero-->
                                </div><!--/.col-->
                                <div class="col-sm-5">
                                    <div class="single-welcome-hero">
                                        <div class="welcome-hero-img">
                                            <img src="shop/images/slider/slider2.png" alt="slider image">
                                        </div><!--/.welcome-hero-txt-->
                                    </div><!--/.single-welcome-hero-->
                                </div><!--/.col-->
                            </div><!--/.row-->
                        </div><!--/.welcome-hero-content-->
                    </div><!-- /.container-->
                </div><!-- /.single-slide-item-->

            </div><!-- /.item .active-->

            <div class="item">
                <div class="single-slide-item slide3">
                    <div class="container">
                        <div class="welcome-hero-content">
                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="single-welcome-hero">
                                        <div class="welcome-hero-txt">
                                            <h4>great design collection</h4>
                                            <h2>valvet accent arm chair</h2>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiuiana smod tempor  ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.
                                            </p>
                                            <div class="packages-price">
                                                <p>
                                                    $ 299.00
                                                    <del>$ 399.00</del>
                                                </p>
                                            </div>
                                            <button class="btn-cart welcome-add-cart" onclick="window.location.href='#'">
                                                <span class="lnr lnr-plus-circle"></span>
                                                add <span>to</span> cart
                                            </button>
                                            <button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='#'">
                                                more info
                                            </button>
                                        </div><!--/.welcome-hero-txt-->
                                    </div><!--/.single-welcome-hero-->
                                </div><!--/.col-->
                                <div class="col-sm-5">
                                    <div class="single-welcome-hero">
                                        <div class="welcome-hero-img">
                                            <img src="shop/images/slider/slider3.png" alt="slider image">
                                        </div><!--/.welcome-hero-txt-->
                                    </div><!--/.single-welcome-hero-->
                                </div><!--/.col-->
                            </div><!--/.row-->
                        </div><!--/.welcome-hero-content-->
                    </div><!-- /.container-->
                </div><!-- /.single-slide-item-->

            </div><!-- /.item .active-->
        </div><!-- /.carousel-inner-->

    </div><!--/#header-carousel-->

    <!--populer-products start -->
    <section id="populer-products" class="populer-products">
        <div class="container">
            <div class="section-header">
                <h2>Lançamentos</h2>
            </div><!--/.section-header-->
            <div class="populer-products-content mt-5">
                <div class="row">

                    <div class="col-md-3">
                        <div class="single-populer-products">
                            <div class="single-populer-product-img mt40">
                                <img src="shop/images/populer-products/p1.png" alt="populer-products images">
                            </div>
                            <h2><a href="#">arm chair</a></h2>
                            <div class="single-populer-products-para">
                                <p>Nemo enim ipsam voluptatem quia volu ptas sit asperna aut odit aut fugit.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="single-populer-products">
                            <div class="single-populer-product-img mt40">
                                <img src="shop/images/populer-products/p1.png" alt="populer-products images">
                            </div>
                            <h2><a href="#">arm chair</a></h2>
                            <div class="single-populer-products-para">
                                <p>Nemo enim ipsam voluptatem quia volu ptas sit asperna aut odit aut fugit.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="single-populer-products">
                            <div class="single-populer-products">
                                <div class="single-populer-product-img">
                                    <img src="shop/images/populer-products/p3.png" alt="populer-products images">
                                </div>
                                <h2><a href="#">hanging lamp</a></h2>
                                <div class="single-populer-products-para">
                                    <p>Nemo enim ipsam voluptatem quia volu ptas sit asperna aut odit aut fugit.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="single-populer-products">
                            <div class="single-populer-product-img mt40">
                                <img src="shop/images/populer-products/p1.png" alt="populer-products images">
                            </div>
                            <h2><a href="#">arm chair</a></h2>
                            <div class="single-populer-products-para">
                                <p>Nemo enim ipsam voluptatem quia volu ptas sit asperna aut odit aut fugit.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div><!--/.container-->

    </section><!--/.populer-products-->
    <!--populer-products end-->

    <!--feature start -->
    <section id="feature" class="feature">
        <div class="container">
            <div class="section-header">
                <h2>Mais vendidos</h2>
            </div><!--/.section-header-->
            <div class="feature-content">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="single-feature">
                            <img src="shop/images/features/f1.jpg" alt="feature image">
                            <div class="single-feature-txt text-center">
                                <p>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
                                    <span class="feature-review">(45 review)</span>
                                </p>
                                <h3><a href="/produto">designed sofa</a></h3>
                                <h5>$160.00</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="single-feature">
                            <img src="shop/images/features/f2.jpg" alt="feature image">
                            <div class="single-feature-txt text-center">
                                <p>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
                                    <span class="feature-review">(45 review)</span>
                                </p>
                                <h3><a href="#">dinning table </a></h3>
                                <h5>$200.00</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="single-feature">
                            <img src="shop/images/features/f3.jpg" alt="feature image">
                            <div class="single-feature-txt text-center">
                                <p>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
                                    <span class="feature-review">(45 review)</span>
                                </p>
                                <h3><a href="#">chair and table</a></h3>
                                <h5>$100.00</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="single-feature">
                            <img src="shop/images/features/f4.jpg" alt="feature image">
                            <div class="single-feature-txt text-center">
                                <p>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <span class="spacial-feature-icon"><i class="fa fa-star"></i></span>
                                    <span class="feature-review">(45 review)</span>
                                </p>
                                <h3><a href="#">modern arm chair</a></h3>
                                <h5>$299.00</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.container-->

    </section><!--/.feature-->
    <!--feature end -->
@endsection
