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

                                <h2 class="text-center"> {{ Request::path() == 'carrinho' ? 'Controle de carrinhos de compra' : 'Lixeira de carrinhos de compra' }} </h2>

                                @if( Request::path() == 'carrinho' )
                                    <div class='d-flex mb-2 justify-content-center'>
                                        <a href="{{route('carrinho.create')}}" class='btn btn-success'>Novo</a>
                                    </div>
                                @endif

                                {{-- Tabela inicio --}}
                                <div class="table-responsive mt-3">
                                    <table class="table table-striped bg-light text-center table-bordered table-hover">
                                        <thead class="text-dark">
                                            <th>Código</th>
                                            <th>Produto</th>
                                            <th>Quantidade</th>
                                            <th>Usuário</th>
                                            <th>Pedido</th>
                                        </thead>
                                        <tbody>
                                            @foreach($carrinhos as $carrinho)
                                            <tr>
                                                <td>{{$carrinho->id}}</td>
                                                <td> @if ( $carrinho->product_id > 0 ) {{App\Carrinho::withTrashed()->find($carrinho->id)->produto->name}} @else Sem produto @endif</td>
                                                <td>{{number_format($carrinho->quantidade,0,',','.')}}</td>
                                                <td> @if ( $carrinho->user_id > 0 ) {{App\Carrinho::withTrashed()->find($carrinho->id)->usuario->name}} @else Sem usuário @endif</td>

                                                @if(!$carrinho->trashed())
                                                    <td>
                                                        <a href="{{ route('carrinho.show', $carrinho->id) }}" class="btn btn-xs btn-primary">Visualizar</a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('carrinho.edit', $carrinho->id) }}" class="btn btn-xs btn-warning">Editar</a>
                                                    </td>
                                                @else
                                                    <td>
                                                        <form action="{{ route('restore-carrinho.update', $carrinho->id) }}"  method="POST" onsubmit="return confirm('Você tem certeza que quer reativar?')">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" href="#" class="btn btn-primary btn-sm float-center ml-1">Reativar</button>
                                                        </form>
                                                    </td>
                                                @endif

                                                <td>
                                                    <form  action="{{ route('carrinho.destroy', $carrinho->id) }}" method="POST" onsubmit="return confirm('Você tem certeza?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" href="#" class="btn btn-danger btn-sm float-center"> {{ $carrinho->trashed() ? 'Apagar' : 'Mover para Lixeira' }} </a>
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
                                    {{ $carrinhos->links() }}
                                </div>
                                <!---End of Pagination-->

                                @if( Request::path() == 'carrinho' )
                                    <a href="{{ route('trashed-carrinho.index') }}" class="btn btn-xs btn-info" data-placement="top" data-toggle="tooltip" title="Acessar registros excluídos">Lixeira</a>
                                @else
                                    <a href="{{route('carrinho.index')}}" class='btn btn-info'>Voltar ao cadastro</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
