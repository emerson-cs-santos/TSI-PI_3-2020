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

                                <h2 class="text-center">Alterar Movimento</h2>

                                <form action="{{route('movimentos.update', $movimento->id)}}" class='p-3 bg-white' method="post">
                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="list-group">
                                                @foreach ($errors->all() as $error)
                                                    <li class="list-group-item text-danger">{{ Str::replaceArray('fk', [''], $error) }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="name">Tipo*</label>
                                        <select name="tipo" class="form-control">
                                            <option value="E" @if( $movimento->tipo == 'E' ) selected @endif >Entrada</option>
                                            <option value="S" @if( $movimento->tipo == 'S' ) selected @endif >Saída</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="quantidade">Quantidade*</label>
                                        <input type="text" class='form-control' id='movimentoQuantidade_edit' name="quantidade" maxlength="9" autofocus required placeholder="Digite a quantidade" value="@if( $movimento->tipo == 'S' ) {{$movimento->quantidade*-1}} @else {{$movimento->quantidade}} @endif">
                                    </div>

                                    <div class="form-group">
                                        <label for="fk_produto">Produto*</label>
                                        <input type="number" class='form-control' name="fk_produto" onkeydown="return event.keyCode !== 69" required placeholder="Digite o id do produto" value="{{$movimento->product_id}}">
                                    </div>

                                    <button type="submit" class="btn btn-warning">Salvar</button>
                                    <a href="{{ url()->previous() }}" class='btn btn-primary'>Voltar</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>

        // Máscara dos valores
        $(document).ready(function($)
        {
            $('#movimentoQuantidade_edit').mask("#.##0", {reverse: true});
        })

    </script>
@endsection
