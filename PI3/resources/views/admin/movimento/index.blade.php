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

                                @if (session()->has('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif

                                @if(session()->has('error'))
                                    <div class="alert alert-danger">{{ session()->get('error') }}</div>
                                @endif

                                <h2 class="text-center"> {{ Request::path() == 'movimentos' ? 'Movimentação de Estoque' : 'Lixeira da Movimentação de Estoque' }} </h2>

                                @if( Request::path() == 'movimentos' )
                                    <div class='d-flex mb-2 justify-content-center'>
                                        <a href="{{route('movimentos.create')}}" class='btn btn-success'>Novo</a>
                                    </div>
                                @endif

                                {{-- Tabela inicio --}}
                                <div class="table-responsive mt-3">
                                    <table class="table table-striped bg-light text-center table-bordered table-hover">
                                        <thead class="text-dark">
                                            <th>ID</th>
                                            <th>Produto</th>
                                            <th>Tipo</th>
                                            <th>Quantidade</th>
                                            <th>Origem</th>
                                            <th class="text-center" colspan="3">Ações</th>
                                        </thead>
                                        <tbody>
                                            @foreach($movimentos as $movimento)
                                            <tr>
                                                <td>{{$movimento->id}}</th>
                                                <td> @if ( $movimento->product_id > 0 ) {{App\Product::withTrashed()->find($movimento->product_id )->name}} @else Sem produto @endif</td>
                                                <td>@if( $movimento->tipo == 'E' ) Entrada @else Saída @endif</td>
                                                <td>@if( $movimento->tipo == 'S' ) {{number_format($movimento->quantidade*-1,0,',','.')}} @else {{number_format($movimento->quantidade,0,',','.')}} @endif</td>
                                                <td>@if( $movimento->fk_origem == 0) Manual @else Pedido - ID {{$movimento->fk_origem}} @endif</td>

                                                @if(!$movimento->trashed())
                                                    <td>
                                                        <a href="{{ route('movimentos.show', $movimento->id) }}" class="btn btn-xs btn-primary">Visualizar</a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('movimentos.edit', $movimento->id) }}" class="btn btn-xs btn-warning">Editar</a>
                                                    </td>
                                                @else
                                                    <td>
                                                        <form action="{{ route('restore-movimentos.update', $movimento->id) }}"  method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="button" onclick="confirmar('Reativar registro','Você tem certeza?', this.form)" class="btn btn-primary btn-sm float-center ml-1">Reativar</button>
                                                        </form>
                                                    </td>
                                                @endif

                                                <td>
                                                    <form  action="{{ route('movimentos.destroy', $movimento->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        @php
                                                            $acaoDeletar = $movimento->trashed() ? 'Apagar' : 'Mover para Lixeira';
                                                        @endphp
                                                        <button type="button" onclick="confirmar('{{ $acaoDeletar }}','Você tem certeza?', this.form)" class="btn btn-danger btn-sm float-center"> {{ $acaoDeletar }} </a>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- Tabela fim --}}

                                <!---Pagination-->
                                <div class="pagination justify-content-center">
                                    {{ $movimentos->links() }}
                                </div>
                                <!---End of Pagination-->

                                @if( Request::path() == 'movimentos' )
                                    <a href="{{ route('trashed-movimentos.index') }}" class="btn btn-xs btn-info" data-placement="top" data-toggle="tooltip" title="Acessar registros excluídos">Lixeira</a>
                                @else
                                    <a href="{{route('movimentos.index')}}" class='btn btn-info'>Voltar ao cadastro</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
