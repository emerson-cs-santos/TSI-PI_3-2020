<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <!-- meta data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!--font-family-->
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

        <title>Gamer Shopping</title>

        <!-- For favicon png -->
        {{-- <link rel="shortcut icon" type="image/icon" href="shop/logo/favicon.png"/> --}}
        <link rel="shortcut icon" href="{{ asset('shop/images/shop.ico') }}" type="image/x-icon">

        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="{{ asset('shop/css/font-awesome.min.css') }}">

        <!--linear icon css-->
		<link rel="stylesheet" href="{{ asset('shop/css/linearicons.css') }}">

		<!--animate.css-->
        <link rel="stylesheet" href="{{ asset('shop/css/animate.css') }}">

        <!--owl.carousel.css-->
        <link rel="stylesheet" href="{{ asset('shop/css/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('shop/css/owl.theme.default.min.css') }}">

        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="{{ asset('shop/css/bootstrap.min.css') }}">

		<!-- bootsnav -->
		<link rel="stylesheet" href="{{ asset('shop/css/bootsnav.css') }}" >

        <!--style.css-->
        <link rel="stylesheet" href="{{ asset('shop/css/style.css') }}">

        <!--responsive.css-->
        <link rel="stylesheet" href="{{ asset('shop/css/responsive.css') }}">

        <link rel="stylesheet" href="{{ asset('shop/css/geral.css') }}">
    </head>

	<body>

		<!--welcome-hero start -->
		<header id="home" class="welcome-hero">
			<!-- top-area Start -->
			<div class="top-area">
				<div class="header-area">
					<!-- Start Navigation -->
				    <nav class="navbar navbar-default bootsnav  navbar-sticky navbar-scrollspy sticked"  data-minus-value-desktop="70" data-minus-value-mobile="55" data-speed="1000">

				        <!-- Start Top Search -->
				        <div class="top-search">
				            <div class="container">
				                <div class="input-group">
				                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
				                    <input type="text" class="form-control" placeholder="O que está buscando?">
				                    <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
				                </div>
				            </div>
				        </div>
				        <!-- End Top Search -->

				        <div class="container">
				            <!-- Start Atribute Navigation -->
				            <div class="attr-nav">
				                <ul>
				                	<li class="search">
				                		<a href="#" data-placement="top" data-toggle="tooltip" title="Buscar produtos no site"><span class="lnr lnr-magnifier"></span></a>
                                    </li><!--/.search-->

                                    <li class="nav-setting dropdown_shop">
                                        @if( Auth::check() )
                                            <a href="/usuario_shop"
                                                class=
                                                "
                                                    {{ Str::of( Request::path() )
                                                    ->contains( ['usuario_shop', 'usuario_senha'] ) ? ' link_ativo' : '' }}
                                                "

                                                data-placement="top" data-toggle="tooltip" title="Acessar sua conta">

                                                <span class="lnr lnr-user">-
                                                    {{ Auth::user()->name }}
                                                </span>
                                            </a>
                                        @else
                                            <a href="{{ route('login') }}" data-placement="top" data-toggle="tooltip" title="Fazer login">
                                                <span class="lnr lnr-user">-
                                                    Login
                                                </span>
                                            </a>
                                        @endif

                                        @if( Auth::check() )
                                            <div class="dropdown-content_shop text-center">
                                                <div onclick="location.href=' {{ route('logout') }} '; event.preventDefault(); document.getElementById('logout-form').submit();" class="shop_sair" data-dismiss="modal" data-placement="top" data-toggle="tooltip" title="Encerrar acesso">Sair</div>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        @endif
				                	</li>

                                    <li class="dropdown">

                                        @php
                                            $qtdProdutosCarrinho = 0;
                                            if ( Auth::check() )
                                            {
                                                // Select para testes
                                                // select
                                                //     carrinhos.product_id
                                                // from
                                                //     carrinhos
                                                // where
                                                //     user_id = 2
                                                // group by
                                                //     product_id
                                                $Produtos = App\Carrinho::selectRaw('carrinhos.product_id')
                                                ->where('user_id', '=', auth()->user()->id )
                                                ->groupBy('carrinhos.product_id')
                                                ->get();

                                                $qtdProdutosCarrinho = sizeof($Produtos);

                                                $itens = App\Carrinho::selectRaw('carrinhos.product_id, sum(carrinhos.quantidade) as qtd_total')
                                                ->where('user_id', '=', auth()->user()->id )
                                                ->groupBy('carrinhos.product_id')
                                                ->orderBy('carrinhos.product_id')
                                                ->get();
                                            }
                                        @endphp

				                        <a href="{{route('carrinho-shop-index')}}" class="dropdown-toggle {{ Str::contains(Request::path(), 'carrinho-shop-index') ? ' link_ativo' : '' }}" data-toggle="dropdown" >
				                            <span class="lnr lnr-cart"></span>
                                            <span class="badge badge-bg-1">{{$qtdProdutosCarrinho}}</span>
				                        </a>
				                        <ul class="dropdown-menu cart-list s-cate">
                                            @php
                                                $total = 0;
                                            @endphp

                                            @if ( Auth::check() )
                                                @foreach($itens as $item)

                                                    @php
                                                        $produto    = App\Product::withTrashed()->find($item->product_id);
                                                        $subTotal   = $item->qtd_total * $produto->price;
                                                        $total      = $total + $subTotal;
                                                    @endphp

                                                    <li class="single-cart-list">
                                                        <a href="{{ route('produto-loja', $produto->id) }}" class="photo"><img src="@if ( empty($produto->image) ) {{asset('admin_assets/images/produto_sem_imagem.jpg')}} @else {{$produto->image}} @endif" alt="Preview do produto" class="cart-thumb" data-placement="top" data-toggle="tooltip" title="Ver Produto" /></a>
                                                        <div class="cart-list-txt">
                                                            <span class="h6"><a href="{{ route('produto-loja', $produto->id) }}" class="carrinho_nome_produto" data-placement="top" data-toggle="tooltip" title="Ver Produto">{{$produto->name}}</a></span>
                                                            <p>{{number_format($item->qtd_total,0,',','.')}} X {{ $produto->price() }}</p>
                                                            <p>SubTotal = {{ 'R$'.number_format($subTotal, 2,',','.') }}</p>
                                                        </div>
                                                        <div class="cart-close">
                                                            <form action="{{ route('carrinho-shop-destroy', $produto->id) }}" method="POST" onsubmit="return confirm('Você tem certeza?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" href="#" class="lnr lnr-cross" data-placement="top" data-toggle="tooltip" title="Remover do carrinho"></button>
                                                            </form>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif

                                            <li class="total">
				                                <span>Total: {{ 'R$'.number_format($total, 2,',','.') }}</span>
				                                <button class="btn-cart pull-right" onclick="window.location.href='{{route('carrinho-shop-index')}}'" data-placement="top" data-toggle="tooltip" title="Abrir Carrinho">Ver Carrinho</button>
				                            </li>
				                        </ul>
				                    </li><!--/.dropdown-->
				                </ul>
				            </div><!--/.attr-nav-->
				            <!-- End Atribute Navigation -->

				            <!-- Start Header Navigation -->
				            <div class="navbar-header">
				                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
				                    <i class="fa fa-bars"></i>
				                </button>
				                <a class="navbar-brand titleHover" href="/" data-placement="top" data-toggle="tooltip" title="Voltar a página inicial">Gamer Shopping</a>

				            </div><!--/.navbar-header-->
				            <!-- End Header Navigation -->

				            <!-- Collect the nav links, forms, and other content for toggling -->
				            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
				                <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
				                    <li class=" {{ Str::of( Request::path() )->contains( ['jogos_shop', 'search/category', 'produto_loja'] )  ? ' active' : '' }} "><a href="/jogos_shop" data-placement="top" data-toggle="tooltip" title="Ver catálogo de jogos">Jogos</a></li>
				                    <li class=" {{ \Request::is('novos_shop')           ? ' active' : '' }} "><a href="/novos_shop" data-placement="top" data-toggle="tooltip" title="Ver últimas novidades"      >Lançamentos</a></li>
				                    <li class=" {{ \Request::is('destaque_shop')	    ? ' active' : '' }} "><a href="/destaque_shop" data-placement="top" data-toggle="tooltip" title="Ver os jogos mais queridos"  >Mais vendidos</a></li>
                                    <li class=" {{ Str::of( Request::path() )->contains( ['pedido-shop-index', 'item-pedido-shop-index'] ) ? ' active' : '' }} "><a href="{{route('pedido-shop-index')}}" data-placement="top" data-toggle="tooltip" title="Ver seus pedidos">Meus Pedidos</a></li>
				                </ul><!--/.nav -->
				            </div><!-- /.navbar-collapse -->
				        </div><!--/.container-->
				    </nav><!--/nav-->
				    <!-- End Navigation -->
				</div><!--/.header-area-->
			    <div class="clearfix"></div>

			</div><!-- /.top-area-->
			<!-- top-area End -->

		</header><!--/.welcome-hero-->
		<!--welcome-hero end -->

        <main>

            @yield('content_Shopping')

            <!--newsletter strat -->
            <section id="newsletter"  class="newsletter">
                <div class="container">
                    <div class="hm-footer-details text-center">
                        <div class="row">
                            <div class=" col-md-3 col-sm-6 col-xs-12">
                                <div class="hm-footer-widget">
                                    <div class="hm-foot-title">
                                        <h4>Sobre nós</h4>
                                    </div><!--/.hm-foot-title-->
                                    <div class="hm-foot-menu">
                                        <ul>
                                            <li><a href="#" data-placement="top" data-toggle="tooltip" title="Por trás da cortina">Quem somos</a></li><!--/li-->
                                            <li><a href="#" data-placement="top" data-toggle="tooltip" title="Falar com a Loja">Contato</a></li><!--/li-->
                                            <li><a href="#" data-placement="top" data-toggle="tooltip" title="Informações sobre a loja">a Loja</a></li><!--/li-->
                                        </ul><!--/ul-->
                                    </div><!--/.hm-foot-menu-->
                                </div><!--/.hm-footer-widget-->
                            </div><!--/.col-->
                            <div class=" col-md-3 col-sm-6 col-xs-12">
                                <div class="hm-footer-widget">
                                    <div class="hm-foot-title">
                                        <h4>Categorias</h4>
                                    </div><!--/.hm-foot-title-->
                                    <div class="hm-foot-menu">
                                        <ul>
                                            @foreach(\App\Category::all()->where('home','S')->sortBy('name') as $categoryFooter)
                                                <li> <a href="{{ route('search-category', $categoryFooter->id) }}" data-placement="top" data-toggle="tooltip" title="Ver jogos dessa categoria">{{$categoryFooter->name}}</a></li>
                                            @endforeach
                                        </ul><!--/ul-->
                                    </div><!--/.hm-foot-menu-->
                                </div><!--/.hm-footer-widget-->
                            </div><!--/.col-->
                            <div class=" col-md-3 col-sm-6 col-xs-12">
                                <div class="hm-footer-widget">
                                    <div class="hm-foot-title">
                                        <h4>Minha conta</h4>
                                    </div><!--/.hm-foot-title-->
                                    <div class="hm-foot-menu">
                                        <ul>
                                            <li><a href="{{route('usuario-shop')}}" data-placement="top" data-toggle="tooltip" title="Suas informações">Cadastro</a></li>
                                            <li><a href="{{route('carrinho-shop-index')}}" data-placement="top" data-toggle="tooltip" title="Ver carrinho de compra">Carrinho</a></li>
                                            <li><a href="{{route('pedido-shop-index')}}" data-placement="top" data-toggle="tooltip" title="Ver pedidos">Pedidos</a></li>
                                            <li><a href="#" data-placement="top" data-toggle="tooltip" title="Ver lista de desejos">Lista de desejos</a></li>
                                        </ul><!--/ul-->
                                    </div><!--/.hm-foot-menu-->
                                </div><!--/.hm-footer-widget-->
                            </div><!--/.col-->
                            <div class=" col-md-3 col-sm-6  col-xs-12">
                                <div class="hm-footer-widget">
                                    <div class="hm-foot-title">
                                        <h4>newsletter</h4>
                                    </div><!--/.hm-foot-title-->
                                    <div class="hm-foot-para">
                                        <p>
                                            Receba informações sobre jogos e nossas promoções!
                                        </p>
                                    </div><!--/.hm-foot-para-->
                                    <div class="hm-foot-email">
                                        <div class="foot-email-box">
                                            <input type="text" class="form-control" placeholder="Digite seu e-mail aqui...." data-placement="top" data-toggle="tooltip" title="Apenas para demonstração">
                                        </div><!--/.foot-email-box-->
                                        <div class="foot-email-subscribe">
                                            <span data-placement="top" data-toggle="tooltip" title="Apenas para demonstração"><i class="fa fa-location-arrow"></i></span>
                                        </div><!--/.foot-email-icon-->
                                    </div><!--/.hm-foot-email-->
                                </div><!--/.hm-footer-widget-->
                            </div><!--/.col-->
                        </div><!--/.row-->
                    </div><!--/.hm-footer-details-->

                </div><!--/.container-->

            </section><!--/newsletter-->
            <!--newsletter end -->
        </main>

		<!--footer start-->
		<footer id="footer"  class="footer">
			<div class="container">
				<div class="hm-footer-copyright text-center">
					<div class="footer-social">
						<a href="https://www.facebook.com/pages/Super-Potato-Akihabara/169636663054466" data-placement="top" data-toggle="tooltip" title="Facebook">    <i class="fa fa-facebook">  </i></a>
						<a href="https://www.instagram.com/playasia/"                                   data-placement="top" data-toggle="tooltip" title="Instagram">   <i class="fa fa-instagram"> </i></a>
						<a href="https://www.linkedin.com/company/gamestop/"                            data-placement="top" data-toggle="tooltip" title="Linkedin">    <i class="fa fa-linkedin">  </i></a>
						<a href="https://pl.pinterest.com/gameshop/"                                    data-placement="top" data-toggle="tooltip" title="Pinterest">   <i class="fa fa-pinterest"> </i></a>
						<a href="https://www.behance.net/gallery/55138775/Game-Shop"                    data-placement="top" data-toggle="tooltip" title="Behance">     <i class="fa fa-behance">   </i></a>
					</div>
					<p>
						&copy;Copyright. Senac 2020 - Sistemas para Internet - Projeto integrador 3
					</p><!--/p-->
				</div><!--/.text-center-->
			</div><!--/.container-->

			<div id="scroll-Top">
				<div class="return-to-top">
					<i class="fa fa-angle-up " id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div>

			</div><!--/.scroll-Top-->

        </footer><!--/.footer-->
		<!--footer end-->

		<!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="{{ asset('shop/js/jquery.js') }}"></script>

        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

		<!--bootstrap.min.js-->
        <script src="{{ asset('shop/js/bootstrap.min.js') }}"></script>

		<!-- bootsnav js -->
		<script src="{{ asset('shop/js/bootsnav.js') }}"></script>

		<!--owl.carousel.js-->
        <script src="{{ asset('shop/js/owl.carousel.min.js') }}"></script>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>


        <!--Custom JS-->
        <script src="{{ asset('shop/js/custom.js') }}"></script>

    </body>

</html>
