@extends('layouts.Shopping')

@section('content_Shopping')

<section class="new-arrivals mt-5">
    <div class="container">
        <header class="section-header">
            <h2>{{$produto->name}}</h2>
        </header>

        <div class="new-arrivals-content">
            <div class="row">

                <div class="col-md-6 text-center mt-3" >
                    <img class="imagemProdutoLoja" src="@if( empty($produto->image) )  {{asset('admin_assets/images/produto_sem_imagem.jpg')}} @else {{$produto->image}} @endif" alt="{{$produto->name}}">
                </div>

                <div class="col-md-6 mt-3 divLoja">

                    <div class="col-md-3 mt-3">
                        <span class="camposLoja valoresCamposLoja">Categoria:</span>
                    </div>
                    <div class="col-md-9 mt-3">
                        <span class="valoresCamposLoja">{{App\Category::find($produto->category_id)->name}}</span>
                    </div>

                    <div class="col-md-3 mt-3">
                        <span class="camposLoja valoresCamposLoja">Preço:</span>
                    </div>
                    <div class="col-md-9 mt-3">
                        <span class="valoresCamposLoja valoresCamposLoja">
                            @if( $produto->discount > 0 ) de <del> {{$produto->price()}} </del> por:  @else {{$produto->price()}}  @endif
                            @if( $produto->discount > 0 )  {{$produto->discountPrice()}} @endif
                        </span>
                    </div>

                    <div class="col-md-2 mt-3">
                        <span class="camposLoja">Estoque:</span>
                    </div>
                    <div class="col-md-10 mt-3">
                        <span>{{ App\Product::find($produto->id)->produtoSaldo->sum('quantidade') }}</span>
                    </div>

                    <div class="col-md-2 mt-3">
                        <span class="camposLoja">Descrição:</span>
                    </div>

                    <div class="col-md-10 mt-3">
                        <p>{{ Str::limit($produto->desc,300) }}</p>
                    </div>

                    <div class="col-md-12 text-center">
                        <button class="btn-cart welcome-add-cart botao_comprar_loja_produto" onclick="window.location.href='{{ route('search-category', 8) }}'" data-placement="top" data-toggle="tooltip" title="Adicionar produto ao carrinho atual.">
                            Adicionar ao carrinho
                        </button>
                    </div>

                    <div class="col-md-12 text-center">
                        <button class="btn-cart welcome-add-cart botao_comprar_loja_produto" onclick="window.location.href='#'" data-placement="top" data-toggle="tooltip" title="Adicionar produto a sua lista de desejos">
                            Adicionar na lista de desejos
                        </button>
                    </div>

                </div>



            </div>
        </div>
    </div>
</section>


@endsection
