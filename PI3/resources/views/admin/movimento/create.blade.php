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

                                <h2 class="text-center">Incluir movimentação</h2>

                                @if ( session()->has('error') )
                                    <div class="alert alert-danger"> {{ session()->get('error') }}</div>
                                @endif

                                <form action="{{route('movimentos.store')}}" class='p-3 bg-white' method="post">
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

                                    <div class="form-group">
                                        <label for="name">Tipo*</label>
                                       <select name="tipo" class="form-control">
                                            <option value="E" @if( old('tipo') == 'E' ) selected @endif >Entrada</option>
                                            <option value="S" @if( old('tipo') == 'S' ) selected @endif >Saída</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="quantidade">Quantidade*</label>
                                        <input type="text" class='form-control' id="movimentoQuantidade_create" name="quantidade" maxlength="9" autofocus required placeholder="Digite a quantidade" value="{{old('quantidade')}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="fk_produto">Produto*</label>
                                        <input type="number" class='form-control' name="fk_produto" onkeydown="return event.keyCode !== 69" required placeholder="Digite o id do produto" value="{{old('fk_produto')}}">
                                    </div>

                                    <button type="submit" class="btn btn-success">Criar</button>
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
            $('#movimentoQuantidade_create').mask("#.##0", {reverse: true});
        })

    </script>
@endsection
