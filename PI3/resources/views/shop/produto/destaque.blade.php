@extends('layouts.Shopping')

@section('content_Shopping')
    <!--feature start -->
    <section id="feature" class="feature">
        <div class="container">
            @include('exibirErros')
            <div class="section-header">
                <h2>Mais Vendidos</h2>
            </div><!--/.section-header-->

            <div class="feature-content mt-5">
                <div class="row">

                    @foreach($maisVendidos as $maisVendido)

                        @php
                            $produto = App\Product::withTrashed()->find($maisVendido->product_id);
                        @endphp

                        <div class="col-sm-3">
                            <div class="single-feature">

                                <a href="{{ route('produto-loja', $produto->id) }}" >
                                    <img class="imagemMaisVendidos" src="

                                    @if( empty( $produto->image )  )
                                        {{asset('admin_assets/images/produto_sem_imagem.jpg')}}
                                    @else
                                        {{$produto->image}}
                                    @endif"

                                    alt="{{$produto->name}}" data-placement="top" data-toggle="tooltip" title="Ver Produto">
                                </a>

                                <div class="text-center mt-4">
                                    <form action="{{route('carrinho-shop-store',$produto->id)}}" class='p-3 bg-white' method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-warning">Adicionar ao Carrinho</button>
                                    </form>
                                </div>

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

            <div class="container text-center">
                <div>
                    {{ $maisVendidos->links() }}
                </div>
            </div>
        </div><!--/.container-->

    </section><!--/.feature-->
    <!--feature end -->

@endsection
