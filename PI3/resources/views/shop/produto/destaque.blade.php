@extends('layouts.Shopping')

@section('content_Shopping')
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

                                    <h3><a class="linkMaisVendidos" href="{{ route('produto-loja', $maisVendido->id) }}">{{$maisVendido->name}}</a></h3>

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

            <div class="container text-center">
                <div>
                    {{ $maisVendidos->links() }}
                </div>
            </div>
        </div><!--/.container-->

    </section><!--/.feature-->
    <!--feature end -->

@endsection
