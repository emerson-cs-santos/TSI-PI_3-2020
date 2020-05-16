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

                                <h2 class="text-center">Alterar manualmente Carrinho</h2>

                                {{-- Mostra mensagem que precisa cadastrar uma categoria antes de cadastrar um produto --}}
                                @if ( session()->has('error') )
                                    <div class="alert alert-danger"> {{ session()->get('error') }}</div>
                                @endif

                                <form action="{{route('carrinho.update', $carrinho->id)}}" class='p-3 bg-white' method="post">
                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="list-group">
                                                @foreach ($errors->all() as $error)
                                                    <li class="list-group-item text-danger">{{$error}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @csrf
                                    @method('PUT')

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

                                    <button type="submit" class="btn btn-warning">Salvar</button>
                                    <a href="{{route('carrinho.index')}}" class='btn btn-primary'>Voltar</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
