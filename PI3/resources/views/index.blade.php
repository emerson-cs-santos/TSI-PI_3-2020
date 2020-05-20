@extends('layouts.Shopping')

@section('content_Shopping')

    <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">

        @php
            $itemCount = 0
        @endphp

        <!--/.carousel-indicator -->
        <ol class="carousel-indicators">

            @foreach($carrossel_produtos as $carrossel_produto)

                <li data-target="#header-carousel" data-slide-to="{{$itemCount}}" class="@if( $itemCount == 0 ) active @endif" ><span class="small-circle"></span></li>

                @php
                    $itemCount++
                @endphp
             @endforeach
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
                                            @include('exibirErros')
                                            <div class="welcome-hero-txt">
                                                <h2 >Os Melhores Jogos!</h2>
                                                <h3>{{$carrossel_produto->name}}</h3>
                                                <p>
                                                    {{$carrossel_produto->desc}}
                                                </p>
                                                <div class="packages-price">

                                                    @php
                                                        $estoque = App\Product::find($carrossel_produto->id)->produtoSaldo->sum('quantidade');
                                                    @endphp

                                                    @if ( $estoque > 0 )
                                                        <p>
                                                            @if( $carrossel_produto->discount > 0 )  {{$carrossel_produto->discountPrice()}} @endif
                                                            @if( $carrossel_produto->discount > 0 ) <del> {{$carrossel_produto->price()}} </del> @else {{$carrossel_produto->price()}}  @endif
                                                        </p>
                                                    @else
                                                        <p class="text-danger"> Produto indisponível </p>
                                                    @endif

                                                </div>
                                                <form action="{{route('carrinho-shop-store',$carrossel_produto->id)}}" class='p-3 bg-white' method="post">
                                                    @csrf
                                                    <button class="btn-cart welcome-add-cart" data-placement="top" data-toggle="tooltip" title="Adicionar jogo ao carrinho">
                                                        <span class="lnr lnr-plus-circle"></span>
                                                        Add ao carrinho
                                                    </button>
                                                </form>
                                                <button class="btn-cart welcome-add-cart welcome-more-info" onclick="window.location.href='{{ route('produto-loja', $carrossel_produto->id) }}'" data-placement="top" data-toggle="tooltip" title="Ver mais informações sobre o jogo">
                                                    Ver produto
                                                </button>
                                            </div><!--/.welcome-hero-txt-->
                                        </div><!--/.single-welcome-hero-->
                                    </div><!--/.col-->
                                    <div class="col-sm-5">
                                        <div class="single-welcome-hero">
                                            <div class="welcome-hero-img">
                                                <a href="{{ route('produto-loja', $carrossel_produto->id) }}" > <img class="imagemCarrossel" src="@if( empty($carrossel_produto->image) )  {{asset('admin_assets/images/produto_sem_imagem.jpg')}} @else {{$carrossel_produto->image}} @endif" alt="{{$carrossel_produto->name}}" data-placement="top" data-toggle="tooltip" title="Ver Produto"> </a>
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
                                    <a href="{{ route('produto-loja', $lancamento->id) }}" > <img class="imagemLancamentos" src="@if( empty($lancamento->image) )  {{asset('admin_assets/images/produto_sem_imagem.jpg')}} @else {{$lancamento->image}} @endif" alt="{{$lancamento->name}}" data-placement="top" data-toggle="tooltip" title="Ver Produto"> </a>
                                </div>

                                <div>
                                    <a class="lancamentosHome" href="{{ route('produto-loja', $lancamento->id) }}" data-placement="top" data-toggle="tooltip" title="Ver produto">{{$lancamento->name}}</a>
                                </div>

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
                <h2>Mais Vendidos</h2>
            </div><!--/.section-header-->

            <div class="feature-content">
                <div class="row">

                    @foreach($maisVendidos as $maisVendido)

                        @php
                            $produto = App\Product::withTrashed()->find($maisVendido->product_id);
                        @endphp

                        <div class="col-sm-3">
                            <div class="single-feature">

                                <a href="{{ route('produto-loja', $lancamento->id) }}" >

                                    <img class="imagemMaisVendidos" src="

                                    @if( empty($produto->image) )
                                        {{asset('admin_assets/images/produto_sem_imagem.jpg')}}
                                    @else
                                        {{$produto->image}}
                                    @endif"

                                    alt="{{$produto->name}}" data-placement="top" data-toggle="tooltip" title="Ver Produto">

                                </a>

                                <div class="single-feature-txt text-center">

                                    <h3><a class="linkMaisVendidos" href="{{ route('produto-loja', $produto->id) }}" data-placement="top" data-toggle="tooltip" title="Ver produto">{{$produto->name}}</a></h3>

                                    @php
                                        $estoque = App\Product::find($produto->id)->produtoSaldo->sum('quantidade');
                                    @endphp

                                    @if ( $estoque > 0 )
                                        <p class="@if( $produto->discount > 0 ) old-price @endif">{{$produto->price()}}</p>

                                        @if( $produto->discount > 0 )
                                            <p>{{$produto->discountPrice()}}</p>
                                        @endif
                                    @else
                                        <p class="text-danger"> Produto indisponível </p>
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
