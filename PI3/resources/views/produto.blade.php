@extends('layouts.Shopping')

@section('content_Shopping')

    <div class="item active">
        <div class="container">
            <div class="welcome-hero-content">
                <div class="row">
                    <div class="single-welcome-hero">
                        <figure>
                            <img src="shop/images/slider/slider1.png" alt="slider image">
                            <figcaption class='text-center'>Testando conteudo na página</figcaption>
                        </figure>
                    </div>

                </div>

            </div>
        </div>
    </div>

<div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">

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

        </div><!-- /.item .active-->
    </div><!-- /.carousel-inner-->

</div><!--/#header-carousel-->
@endsection
