<!doctype html>
<html class="no-js" lang="pt-br">

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
		<link rel="shortcut icon" type="image/icon" href="shop/logo/favicon.png"/>

        <!--font-awesome.min.css-->
        <link rel="stylesheet" href="shop/css/font-awesome.min.css">

        <!--linear icon css-->
		<link rel="stylesheet" href="shop/css/linearicons.css">

		<!--animate.css-->
        <link rel="stylesheet" href="shop/css/animate.css">

        <!--owl.carousel.css-->
        <link rel="stylesheet" href="shop/css/owl.carousel.min.css">
		<link rel="stylesheet" href="shop/css/owl.theme.default.min.css">

        <!--bootstrap.min.css-->
        <link rel="stylesheet" href="shop/css/bootstrap.min.css">

		<!-- bootsnav -->
		<link rel="stylesheet" href="shop/css/bootsnav.css" >

        <!--style.css-->
        <link rel="stylesheet" href="shop/css/style.css">

        <!--responsive.css-->
        <link rel="stylesheet" href="shop/css/responsive.css">

        <link rel="stylesheet" href="shop/css/geral.css">
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
                                        <a href="/usuario_shop" data-placement="top" data-toggle="tooltip" title="Acessar sua conta">
                                            <span class="lnr lnr-user">-
                                                @if( Auth::check() ) {{ Auth::user()->name }} @else Login @endif
                                            </span>
                                        </a>

                                        @if( Auth::check() )
                                            <div class="dropdown-content_shop text-center">
                                                <div onclick="location.href=' {{ route('logout') }} '; event.preventDefault(); document.getElementById('logout-form').submit();" class="shop_sair" data-dismiss="modal" data-placement="top" data-toggle="tooltip" title="Encerrar acesso">Sair</div>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        @endif
				                	</li>

                                    <li class="dropdown" data-placement="top" data-toggle="tooltip" title="Seu carrinho">
				                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
				                            <span class="lnr lnr-cart"></span>
											<span class="badge badge-bg-1">2</span>
				                        </a>
				                        <ul class="dropdown-menu cart-list s-cate">
				                            <li class="single-cart-list">
				                                <a href="#" class="photo"><img src="shop/images/collection/arrivals1.png" class="cart-thumb" alt="image" /></a>
				                                <div class="cart-list-txt">
				                                	<h6><a href="#">arm <br> chair</a></h6>
				                                	<p>1 x - <span class="price">$180.00</span></p>
				                                </div><!--/.cart-list-txt-->
				                                <div class="cart-close">
				                                	<span class="lnr lnr-cross"></span>
				                                </div><!--/.cart-close-->
				                            </li><!--/.single-cart-list -->
				                            <li class="single-cart-list">
				                                <a href="#" class="photo"><img src="shop/images/collection/arrivals2.png" class="cart-thumb" alt="image" /></a>
				                                <div class="cart-list-txt">
				                                	<h6><a href="#">single <br> armchair</a></h6>
				                                	<p>1 x - <span class="price">$180.00</span></p>
				                                </div><!--/.cart-list-txt-->
				                                <div class="cart-close">
				                                	<span class="lnr lnr-cross"></span>
				                                </div><!--/.cart-close-->
				                            </li><!--/.single-cart-list -->
				                            <li class="single-cart-list">
				                                <a href="#" class="photo"><img src="shop/images/collection/arrivals3.png" class="cart-thumb" alt="image" /></a>
				                                <div class="cart-list-txt">
				                                	<h6><a href="#">wooden arn <br> chair</a></h6>
				                                	<p>1 x - <span class="price">$180.00</span></p>
				                                </div><!--/.cart-list-txt-->
				                                <div class="cart-close">
				                                	<span class="lnr lnr-cross"></span>
				                                </div><!--/.cart-close-->
				                            </li><!--/.single-cart-list -->
				                            <li class="total">
				                                <span>Total: $0.00</span>
				                                <button class="btn-cart pull-right" onclick="window.location.href='#'">view cart</button>
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
				                <a class="navbar-brand" href="/" data-placement="top" data-toggle="tooltip" title="Voltar a página inicial">Gamer Shopping</a>

				            </div><!--/.navbar-header-->
				            <!-- End Header Navigation -->

				            <!-- Collect the nav links, forms, and other content for toggling -->
				            <div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
				                <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOutUp">
				                    <li class=" {{ \Request::is('jogos_shop')        ? ' active' : '' }} "><a href="/jogos_shop"    >Jogos</a></li>
				                    <li class=" {{ \Request::is('novos_shop')       ? ' active' : '' }} "><a href="/novos_shop"     >Lançamentos</a></li>
				                    <li class=" {{ \Request::is('destaque_shop')    ? ' active' : '' }} "><a href="/destaque_shop"  >Em destaque</a></li>
                                    <li class=" {{ \Request::is('contato_shop')     ? ' active' : '' }} "><a href="/contato_shop"   >Meus Pedidos</a></li>
                                    <li class=" {{ \Request::is('blog_shop')        ? ' active' : '' }} "><a href="/blog_shop"      >blog</a></li>
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
                    <div class="hm-footer-details">
                        <div class="row">
                            <div class=" col-md-3 col-sm-6 col-xs-12">
                                <div class="hm-footer-widget">
                                    <div class="hm-foot-title">
                                        <h4>Sobre nós</h4>
                                    </div><!--/.hm-foot-title-->
                                    <div class="hm-foot-menu">
                                        <ul>
                                            <li><a href="#">Quem somos</a></li><!--/li-->
                                            <li><a href="#">contato</a></li><!--/li-->
                                            <li><a href="#">Novidades</a></li><!--/li-->
                                            <li><a href="#">a Loja</a></li><!--/li-->
                                        </ul><!--/ul-->
                                    </div><!--/.hm-foot-menu-->
                                </div><!--/.hm-footer-widget-->
                            </div><!--/.col-->
                            <div class=" col-md-3 col-sm-6 col-xs-12">
                                <div class="hm-footer-widget">
                                    <div class="hm-foot-title">
                                        <h4>Acervo</h4>
                                    </div><!--/.hm-foot-title-->
                                    <div class="hm-foot-menu">
                                        <ul>
                                            <li><a href="#">Mega-Drive</a></li><!--/li-->
                                            <li><a href="#">Super-Nintendo</a></li><!--/li-->
                                            <li><a href="#">Playstation</a></li><!--/li-->
                                            <li><a href="#">Xbox</a></li><!--/li-->
                                            <li><a href="#">Game Cube</a></li><!--/li-->
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
                                            <li><a href="#">Cadastro</a></li>
                                            <li><a href="#">Lista de desejos</a></li>
                                            <li><a href="#">Carrinho</a></li>
                                            <li><a href="#">Pedidos</a></li>
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
                                            <input type="text" class="form-control" placeholder="Digite seu e-mail aqui....">
                                        </div><!--/.foot-email-box-->
                                        <div class="foot-email-subscribe">
                                            <span><i class="fa fa-location-arrow"></i></span>
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
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-instagram"></i></a>
						<a href="#"><i class="fa fa-linkedin"></i></a>
						<a href="#"><i class="fa fa-pinterest"></i></a>
						<a href="#"><i class="fa fa-behance"></i></a>
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

		<script src="shop/js/jquery.js"></script>

        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

		<!--bootstrap.min.js-->
        <script src="shop/js/bootstrap.min.js"></script>

		<!-- bootsnav js -->
		<script src="shop/js/bootsnav.js"></script>

		<!--owl.carousel.js-->
        <script src="shop/js/owl.carousel.min.js"></script>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>


        <!--Custom JS-->
        <script src="shop/js/custom.js"></script>

    </body>

</html>