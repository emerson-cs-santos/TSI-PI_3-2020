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

                                <h2 class="text-center">Movimentação {{$movimento->id}}</h2>

                                <div class="form-group">
                                    <label for="name">Tipo</label>
                                    <select name="tipo" class="form-control">
                                        <option value="E" @if( $movimento->tipo == 'E' ) selected @endif >Entrada</option>
                                        <option value="S" @if( $movimento->tipo == 'S' ) selected @endif >Saída</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="quantidade">Quantidade</label>
                                    <input type="text" class='form-control' name="quantidade" placeholder="Digite a quantidade" value="@if( $movimento->tipo == 'S' ) {{$movimento->quantidade*-1}} @else {{$movimento->quantidade}} @endif">
                                </div>

                                <div class="form-group">
                                    <label for="fk_produto">Produto</label>
                                    <input type="number" class='form-control' name="fk_produto" placeholder="Digite o id do produto" value="{{$movimento->product_id}}">
                                </div>

                                <a href="{{route('movimentos.index')}}" class='btn btn-primary'>Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
