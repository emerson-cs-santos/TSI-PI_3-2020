@extends('layouts.Shopping')

@section('content_Shopping')
    <!--populer-products start -->
    <section id="populer-products" class="populer-products">
        <div class="container">
            @include('exibirErros')
            <div class="section-header">
                <h2>Lançamentos</h2>
            </div><!--/.section-header-->

            <div class="populer-products-content mt-5">
                <div class="row">

                    @foreach($lancamentos as $lancamento)

                        <div class="col-md-6 mt-5">
                            <div class="single-populer-products">
                                <div class="single-inner-populer-products">
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="single-inner-populer-product-img">
                                                <a href="{{ route('produto-loja', $lancamento->id) }}" > <img class="imagemLancamentos" src="@if( empty($lancamento->image) )  {{asset('admin_assets/images/produto_sem_imagem.jpg')}} @else {{$lancamento->image}} @endif" alt="{{$lancamento->name}}" data-placement="top" data-toggle="tooltip" title="Ver Produto"> </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-12">
                                            <div class="single-inner-populer-product-txt">
                                                <h2>
                                                    <a href="{{ route('produto-loja', $lancamento->id) }}" data-placement="top" data-toggle="tooltip" title="Ver produto">
                                                        {{$lancamento->name}}
                                                    </a>
                                                </h2>
                                                <p>
                                                    {{App\Category::find($lancamento->category_id)->name}}
                                                </p>
                                                <div class="populer-products-price">
                                                    <p>
                                                        @if( $lancamento->discount > 0 )  {{$lancamento->discountPrice()}} @endif
                                                        @if( $lancamento->discount > 0 ) <del> {{$lancamento->price()}} </del> @else {{$lancamento->price()}}  @endif
                                                    </p>

                                                </div>
                                                <form action="{{route('carrinho-shop-store',$lancamento->id)}}" class='p-3 bg-white' method="post">
                                                    @csrf
                                                    <button class="btn-cart welcome-add-cart populer-products-btn" data-placement="top" data-toggle="tooltip" title="Adicionar ao carrinho">
                                                        Add ao carrinho
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>

            <div class="container text-center">
                <div>
                    {{ $lancamentos->links() }}
                </div>
            </div>
        </div><!--/.container-->

    </section><!--/.populer-products-->
    <!--populer-products end-->
























@endsection
