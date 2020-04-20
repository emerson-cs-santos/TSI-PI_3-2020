@extends('layouts.Shopping')

@section('content_Shopping')
    <section class="new-arrivals">
        <div class="container">
            <header class="section-header mt-5">
                <h2>Jogos</h2>
            </header>

            <div class="new-arrivals-content">
                <div class="row">
                    @foreach($products as $product)

                        <div class="col-md-3 col-sm-4">
                            <div class="single-new-arrival">
                                <div class="single-new-arrival-bg">
                                    <img class="imagemShop" src="@if( empty($product->image) )  {{asset('admin_assets/images/produto_sem_imagem.jpg')}} @else {{$product->image}} @endif" alt="{{$product->name}}">
                                    <div class="single-new-arrival-bg-overlay"></div>
                                    <div class="sale bg-1">
                                        <p>20% off!</p>
                                    </div>
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
                                <h4><a href="#">{{$product->name}}</a></h4>
                                <p class="arrival-product-price">R${{$product->price}}</p>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>

            {{-- <div class="feature-content row">
                @foreach($products as $product)
                    <div class="form-group">
                        <span>{{$product->name}}</span>
                        <img  class="form-control mt-5 imagemShop" alt="{{$product->name}}" src=" @if( empty($product->image) )  {{asset('admin_assets/images/produto_sem_imagem.jpg')}} @else {{$product->image}} @endif" >
                    </div>
                @endforeach
            </div> --}}
        </div>
    </section>
@endsection
