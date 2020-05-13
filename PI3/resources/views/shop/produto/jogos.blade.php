@extends('layouts.Shopping')

@section('content_Shopping')
    <section class="new-arrivals">
        <div class="container">
            <header class="section-header mt-5">
                <h2>Os melhores Jogos!</h2>
            </header>

            <div class="container mt-4">
                <div class="row">
                    <ul class="linkHover text-center">
                        @foreach(\App\Category::all()->sortBy('name') as $category)
                            <li class="col-12 col-sm-6 col-md-2 mt-4{{ $categoria == $category->name  ? ' linkAtivo' : '' }} "> <a href="{{ route('search-category', $category->id) }}">{{$category->name}}</a>       </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="feature-content row">

                @foreach($products as $product)

                    <div class="col-sm-12 col-md-3">
                        {{-- <div class="single-new-arrival"> --}}
                            <div class="single-new-arrival-bg">
                                <img class="imagemShop" src="@if( empty($product->image) )  {{asset('admin_assets/images/produto_sem_imagem.jpg')}} @else {{$product->image}} @endif" alt="{{$product->name}}">
                                <div class="single-new-arrival-bg-overlay"></div>

                                @if( $product->discount > 0 )
                                    <div class="sale bg-1">
                                        <p>{{$product->descontoExibir()}} off!</p>
                                    </div>
                                @endif

                                <div class="new-arrival-cart">
                                    <p>
                                        <span class="lnr lnr-cart"></span>
                                        <a href="#" data-placement="top" data-toggle="tooltip" title="Adicionar ao carrinho">Adicionar <span>ao </span> carrinho</a>
                                    </p>
                                    <p class="arrival-review pull-right">
                                        <a href="#" data-placement="top" data-toggle="tooltip" title="Adicionar para lista de desejos"><span class="lnr lnr-heart"> </span></a>
                                        <a href="#" data-placement="top" data-toggle="tooltip" title="Aumentar imagem"><span class="lnr lnr-frame-expand"> </span></a>
                                    </p>
                                </div>

                            </div>

                            <h4><a href="{{ route('produto-loja', $product->id) }}">{{$product->name}}</a></h4>

                            <p class="arrival-product-price @if( $product->discount > 0 ) old-price @endif">{{$product->price()}}</p>

                            @if( $product->discount > 0 )
                                <p class="arrival-product-price">{{$product->discountPrice()}}</p>
                            @endif
                        {{-- </div> --}}
                    </div>
                @endforeach

                @if( $products->count() == 0)
                    <div class="row text-center">
                        <span>Não foram encontrados jogos...</span>
                    </div>
                @endif
            </div>

            <div class="container text-center">
                <div>
                    {{ $products->links() }}
                </div>
            </div>

        </div>
    </section>
@endsection