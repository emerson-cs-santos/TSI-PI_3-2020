@extends('layouts.Admin')

@section('content_Admin')
    <section class='mt-5'>
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row align-items-center">

                        {{-- Conteiner final onde as informações são de fato exibidas --}}
                        <div class="container mt-5">
                            <div class="col-12">

                                <h2 class="text-center">Carrinho {{$carrinho->id}}</h2>

                                <div class='form-group'>
                                    <div class="form-group">
                                        <label for="Produto">Produto ID</label>
                                        <input type="text" class='form-control' name="Produto" placeholder="Informe o produto" value="{{$carrinho->product_id}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="Usuario">Usuário ID</label>
                                        <input type="text" class='form-control' name="Usuario" placeholder="Informe o usuário" value="{{$carrinho->user_id}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="Quantidade">Quantidade</label>
                                        <input type="number" class='form-control' name="Quantidade" placeholder="Digite a quantidade" value="{{$carrinho->quantidade}}">
                                    </div>

                                    <a href="{{route('carrinho.index')}}" class='btn btn-success'>Voltar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
