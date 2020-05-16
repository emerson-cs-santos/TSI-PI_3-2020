@extends('layouts.Shopping')

@section('content_Shopping')

<section class="new-arrivals mt-5">
    <div class="container">

        @include('exibirErros')

        <header class="section-header">
            <h2>{{$produto->name}}</h2>
        </header>

        <div class="new-arrivals-content">
            <div class="row">

                <div class="col-md-6 text-center mt-3" >
                    <img class="imagemProdutoLoja" src="@if( empty($produto->image) )  {{asset('admin_assets/images/produto_sem_imagem.jpg')}} @else {{$produto->image}} @endif" alt="{{$produto->name}}">
                </div>

                <div class="col-sm-12 col-md-6 mt-3 divLoja text-center">

                    <div class="col-md-12 mt-3">
                        <span class="camposLoja h3">Categoria:</span>
                    </div>
                    <div class="col-md-12 mt-3">
                        <span class="h3">{{App\Category::find($produto->category_id)->name}}</span>
                    </div>

                    <div class="col-md-12 mt-4">
                        <span class="camposLoja h3">Preço:</span>
                    </div>
                    <div class="col-md-12 mt-4">
                        <span class="h3">
                            @if( $produto->discount > 0 ) de <del> {{$produto->price()}} </del> por:  @else {{$produto->price()}}  @endif
                            @if( $produto->discount > 0 )  {{$produto->discountPrice()}} @endif
                        </span>
                    </div>

                    <div class="col-md-12 mt-3">
                        <span class="camposLoja h3">Estoque:</span>
                    </div>
                    <div class="col-md-12 mt-3 h3">
                        @php
                            $estoque = App\Product::find($produto->id)->produtoSaldo->sum('quantidade');
                        @endphp

                        @if ( $estoque > 0 )
                            <span>{{ $estoque }}
                                @if($estoque <= 10)
                                    Últimas unidades!!
                                @endif
                            </span>
                        @else
                            <span class="text-danger"> Produto indisponível </span>
                        @endif
                    </div>

                    {{-- <div class="col-md-10 mt-3">
                        <p>{{ Str::limit($produto->desc,300)  }}</p>
                    </div> --}}

                    <div class="col-md-12 text-center">
                        <form action="{{route('carrinho-shop-store',$produto->id)}}" class='p-3 bg-white' method="post">
                            @csrf
                            <button type="submit" class="btn-cart welcome-add-cart botao_comprar_loja_produto" data-placement="top" data-toggle="tooltip" title="Adicionar produto ao carrinho atual.">
                                Adicionar ao carrinho
                            </button>
                        </form>
                    </div>

                    <div class="col-md-12 text-center mb-6">
                        <button type="submit" class="btn-cart welcome-add-cart botao_comprar_loja_produto" onclick="window.location.href='#'" data-placement="top" data-toggle="tooltip" title="Adicionar produto a sua lista de desejos">
                            Adicionar na lista de desejos
                        </button>
                    </div>
                </div>

                <div class="container">
                    <div class="col-md-12 mt-5">
                        <span class="camposLoja h3">Descrição:</span>
                    </div>

                    <div class="col-md-12 divLojaDesc mt-3">
                        <p>{{ $produto->desc }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
