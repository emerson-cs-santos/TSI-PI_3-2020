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
                                    <table class="table table-striped bg-light text-center table-bordered">
                                        <thead class="text-dark">
                                            <th>ID</th>
                                            <th>Produto</th>
                                            <th>Tipo</th>
                                            <th>Quantidade</th>
                                            <th>Origem</th>
                                        </thead>
                                        <tbody>
                                            @foreach($movimentos as $movimento)
                                            <tr>
                                                <td>{{$movimento->id}}</th>
                                                <td>{{ App\Movimento::withTrashed()->find($movimento->id)->produto->name }} </td>
                                                <td>@if( $movimento->tipo == 'E' ) Entrada @else Saída @endif</td>
                                                <td>@if( $movimento->tipo == 'S' ) {{$movimento->quantidade*-1}} @else {{$movimento->quantidade}} @endif</td>
                                                <td>@if( $movimento->fk_origem == 0) Manual @else Pedido - Nr X @endif</td>

                                                @if(!$movimento->trashed())
                                                    <td>
                                                        <a href="{{ route('movimentos.show', $movimento->id) }}" class="btn btn-xs btn-primary">Visualizar</a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('movimentos.edit', $movimento->id) }}" class="btn btn-xs btn-warning">Editar</a>
                                                    </td>
                                                @else
                                                    <td>
                                                        <form action="{{ route('restore-movimentos.update', $movimento->id) }}"  method="POST" onsubmit="return confirm('Você tem certeza que quer reativar?')">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" href="#" class="btn btn-primary btn-sm float-center ml-1">Reativar</button>
                                                        </form>
                                                    </td>
                                                @endif

                                                <td>
                                                    <form  action="{{ route('movimentos.destroy', $movimento->id) }}" method="POST" onsubmit="return confirm('Você tem certeza?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" href="#" class="btn btn-danger btn-sm float-center"> {{ $movimento->trashed() ? 'Apagar' : 'Mover para Lixeira' }} </a>
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