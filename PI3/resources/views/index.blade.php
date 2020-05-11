@extends('layouts.Shopping')

@section('content_Shopping')

    <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
        <!--/.carousel-indicator -->
        <ol class="carousel-indicators">
            <li data-target="#header-carousel" data-slide-to="0" class="active"><span class="small-circle"></span></li>
            <li data-target="#header-carousel" data-slide-to="1">               <span class="small-circle"></span></li>
            <li data-target="#header-carousel" data-slide-to="2">               <span class="small-circle"></span></li>
        </ol><!-- /ol-->
        <!--/.carousel-indicator -->

        <!--/.carousel-inner -->
        <div class="carousel-inner" role="listbox">

            @php
                $itemCount = 0
            @endphp

            @foreach($carrossel_produtos as $carrossel_produto)
                @php
                    $itemCount++
                @endphp

                <div class="item @if( $itemCount == 1 ) active @endif">
                    <div class="single-slide-item slide{{$itemCount}}">
                        <div class="container">
                            <div class="welcome-hero-content">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="single-welcome-hero">
                                            <div class="welcome-hero-txt">
                                                <h2 >Os melhores jogos!</h2>
                                                <h3>{{$carrossel_produto->name}}</h3>
                                                <p>
                                                    {{$carrossel_produto->desc}}
                                                </p>
                                                <div class="packages-price">
                                                    <p>
                                                        @if( $carrossel_produto->discount > 0 )  {{$carrossel_produto->discountPrice()}} @endif
                                                        @if( $carrossel_produto->discount > 0 ) <del> {{$carrossel_produto->price()}} </del> @else {{$carrossel_produto->price()}}  @endif
                                                    </p>
                                                </div>
                                                <button class="btn-cart welcome-add-cart" onclick="window.location.href='#'">
                                                    <span class="lnr lnr-plus-circle"></span>
                                                    Add ao carrinho
                                                </button>
                                                <button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='#'">
                                                    Ver produto
                                                </button>
                                            </div><!--/.welcome-hero-txt-->
                                        </div><!--/.single-welcome-hero-->
                                    </div><!--/.col-->
                                    <div class="col-sm-5">
                                        <div class="single-welcome-hero">
                                            <div class="welcome-hero-img">
                                                <img class="imagemCarrossel" src="@if( empty($carrossel_produto->image) )  {{asset('admin_assets/images/produto_sem_imagem.jpg')}} @else {{$carrossel_produto->image}} @endif" alt="{{$carrossel_produto->name}}">
                                            </div><!--/.welcome-hero-txt-->
                                        </div><!--/.single-welcome-hero-->
                                    </div><!--/.col-->
                                </div><!--/.row-->
                            </div><!--/.welcome-hero-content-->
                        </div><!-- /.container-->
                    </div><!-- /.single-slide-item-->

                </div>
                <!-- /.item .active-->

            @endforeach
        </div>
        <!-- /.carousel-inner-->

    </div><!--/#header-carousel-->

    <!--populer-products start -->
    <section id="populer-products" class="populer-products">
        <div class="container">
            <div class="section-header">
                <h2>Lançamentos</h2>
            </div><!--/.section-header-->

            <div class="populer-products-content mt-5">
                <div class="row">

                    @foreach($lancamentos as $lancamento)

                        <div class="col-md-3">
                            <div class="single-populer-products">
                                <div class="single-populer-product-img mt40">
                                    <img class="imagemLancamentos" src="@if( empty($lancamento->image) )  {{asset('admin_assets/images/produto_sem_imagem.jpg')}} @else {{$lancamento->image}} @endif" alt="{{$lancamento->name}}">
                                </div>

                                <h2><a href="#">{{$lancamento->name}}</a></h2>

                                <div class="single-populer-products-para">
                                    <p>{{ App\Category::find($lancamento->category_id)->name }}</p>
                                </div>
                            </div>
                        </div>

                    @endforeach
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

                    @foreach($maisVendidos as $maisVendido)

                        <div class="col-sm-3">
                            <div class="single-feature">

                                <img class="imagemMaisVendidos" src="@if( empty($maisVendido->image) )  {{asset('admin_assets/images/produto_sem_imagem.jpg')}} @else {{$maisVendido->image}} @endif" alt="{{$maisVendido->name}}">

                                <div class="single-feature-txt text-center">

                                    <h3><a class="linkMaisVendidos" href="/produto">{{$maisVendido->name}}</a></h3>

                                    <p class="@if( $maisVendido->discount > 0 ) old-price @endif">{{$maisVendido->price()}}</p>

                                    @if( $maisVendido->discount > 0 )
                                        <p>{{$maisVendido->discountPrice()}}</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>
            </div>
        </div><!--/.container-->

    </section><!--/.feature-->
    <!--feature end -->
@endsection
