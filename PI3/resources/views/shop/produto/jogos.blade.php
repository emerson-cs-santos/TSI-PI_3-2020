@extends('layouts.Shopping')

@section('content_Shopping')
    <section class="new-arrivals">
        <div class="container">
            @include('exibirErros')
            <header class="section-header mt-3">
                <h2>Os Melhores Jogos!</h2>
            </header>

            {{-- Filtro apenas por categoria inicio --}}
            <div class="container text-center mt-4">
                <div class="row">
                    <ul class="linkHover text-center">
                        @foreach(\App\Category::all()->sortBy('name') as $category)
                            <li class="col-12 col-sm-6 col-md-2 mt-4{{ strtoupper($categoria) == strtoupper($category->name)  ? ' linkAtivo' : '' }} "> <a href="{{ route('search-category', $category->id) }}" data-placement="top" data-toggle="tooltip" title="Ver jogos da categoria">{{$category->name}}</a>       </li>
                        @endforeach
                    </ul>
                </div>
            {{-- Filtro apenas por categoria fim --}}

            </div>

            <div class="feature-content row">

                @foreach($products as $product)

                    <div class="col-sm-12 col-md-3 mt-5">
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
                                    <form action="{{route('carrinho-shop-store',$product->id)}}" class='p-3 bg-white' method="post">
                                    @csrf
                                        <button type="submit"><i class="lnr lnr-cart"></i> Adicionar ao carrinho</button>
                                    </form>
                                </div>

                            </div>

                            <a class="Jogos" href="{{ route('produto-loja', $product->id) }}" data-placement="top" data-toggle="tooltip" title="Ver produto">{{$product->name}}</a>

                            @php
                                $estoque = App\Product::find($product->id)->produtoSaldo->sum('quantidade');
                            @endphp

                            @if ( $estoque > 0 )
                                <p class="arrival-product-price @if( $product->discount > 0 ) old-price @endif">{{$product->price()}}</p>

                                @if( $product->discount > 0 )
                                    <p class="arrival-product-price">{{$product->discountPrice()}}</p>
                                @endif
                            @else
                                <p class="text-danger"> Produto indisponível </p>
                            @endif


                        {{-- </div> --}}
                    </div>
                @endforeach

                @if( $products->count() == 0)
                    <div class="row text-center mt-5">
                        <span>Não foram encontrados jogos...</span>
                    </div>
                @endif
            </div>

            <div class="container text-center">
                <div>
                    {{$products->links()}}
                </div>
            </div>

        </div>
    </section>
@endsection
