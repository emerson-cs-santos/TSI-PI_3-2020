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

                                <h2 class="text-center"> {{ Request::path() == 'index-pedido' ? 'Controle de pedidos' : 'Pedidos Cancelados' }} </h2>

                                {{-- @if( Request::path() == 'index-pedido' )
                                    <div class='d-flex mb-2 justify-content-center'>
                                        <a href="{{route('pedido.create')}}" class='btn btn-success'>Novo</a>
                                    </div>
                                @endif --}}

                                {{-- Tabela inicio --}}
                                <div class="table-responsive mt-3">
                                    <table class="table table-striped bg-light text-center table-bordered">
                                        <thead class="text-dark">
                                            <th>Nro Pedido(ID)</th>
                                            <th>Usuário</th>
                                        </thead>
                                        <tbody>
                                            @foreach($pedidos as $pedido)
                                            <tr>
                                                <td>{{$pedido->id}}</td>
                                                <td> @if ( $pedido->user_id > 0 ) {{App\Pedido::withTrashed()->find($pedido->id)->usuario->name}} @else Sem usuário @endif</td>

                                                <td>
                                                    <a href="{{ route('item-pedido', $pedido->id) }}" class="btn btn-xs btn-secondary">Ver Pedido</a>
                                                </td>

                                                {{-- @if($pedido->trashed())
                                                    <td>
                                                        <form action="{{ route('restore-pedido.update', $pedido->id) }}"  method="POST" onsubmit="return confirm('Você tem certeza que quer reativar?')">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" href="#" class="btn btn-primary btn-sm float-center ml-1">Descancelar Pedido</button>
                                                        </form>
                                                    </td>
                                                @endif --}}

                                                @if ( !$pedido->trashed() )
                                                    <td>
                                                        <form  action="{{ route('pedido.destroy', $pedido->id) }}" method="POST" onsubmit="return confirm('Você tem certeza?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" href="#" class="btn btn-danger btn-sm float-center"> Cancelar Pedido </a>
                                                        </form>
                                                    </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- Tabela fim --}}

                                <!---Pagination-->
                                <div class="pagination justify-content-center">
                                    {{ $pedidos->links() }}
                                </div>
                                <!---End of Pagination-->

                                @if( Request::path() == 'index-pedido' )
                                    <a href="{{ route('trashed-pedido.index') }}" class="btn btn-xs btn-info" data-placement="top" data-toggle="tooltip" title="Acessar pedidos cancelados">Pedidos cancelados</a>
                                @else
                                    <a href="{{route('index-pedido')}}" class='btn btn-info'>Voltar aos pedidos</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
