@extends('layouts.Admin')

@section('content_Admin')
    <!---Cards-->
    <section>
        <header class="container-fluid">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto row pt-md-5 mt-2 text-dark">
                @php
                    date_default_timezone_set('America/Sao_Paulo');
                @endphp
                <h2 class="">Status: ( Atualizado em {{ date('d/m/Y \à\s H:i:s',time())}} )</h2>
            </div>
        </header>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row pt-md-5 mt-md-3 mb-1">

                        <!---Card 1 BEGIN-->
                        <div class="col-xl-3 col-sm-6 p-2">
                            <div class="card card-common">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-shopping-cart fa-3x text-info"></i>
                                        <div class="text-right text-dark">
                                            <h3>Total em Carrinhos</h3>
                                            <div>
                                                <span class="h4">{{ 'R$'.number_format($totalCarrinho, 2,",",".") }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-dark">
                                    <i class="fas fa-spinner fa-pulse text-info mr-3"></i>
                                    <span>Atualizando</span>
                                </div>
                            </div>
                        </div>
                        <!---Card 1 END-->


                        <!---Card 2 BEGIN-->
                        <div class="col-xl-3 col-sm-6 p-2">
                            <div class="card card-common">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-money-bill-alt fa-3x text-success"></i>
                                        <div class="text-right text-dark">
                                            <h3>Total de Vendas</h3>
                                            <div>
                                                <span class="h4">{{ 'R$'.number_format($totalPedido, 2,",",".") }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-dark">
                                    <i class="fas fa-spinner fa-pulse text-success mr-3"></i>
                                    <span>Atualizando</span>
                                </div>
                            </div>
                        </div>
                        <!---Card 2 END-->


                        <!---Card 3 BEGIN-->
                        <div class="col-xl-3 col-sm-6 p-2">
                            <div class="card card-common">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-users fa-3x text-warning"></i>
                                        <div class="text-right text-dark">
                                            <h3>Total de Usuários</h3>
                                            <div>
                                                <span class="h4">{{ number_format($totalUsuarios, 0,",",".") }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-dark">
                                    <i class="fas fa-spinner fa-pulse text-warning mr-3"></i>
                                    <span>Atualizando</span>
                                </div>
                            </div>
                        </div>
                        <!---Card 3 END-->


                        <!---Card 4 BEGIN-->
                        <div class="col-xl-3 col-sm-6 p-2">
                            <div class="card card-common">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-dolly-flatbed fa-3x text-danger"></i>
                                        <div class="text-right text-dark">
                                            <h3>Estoque Total</h3>
                                            <div>
                                                <span class="h4">{{ number_format($totalEstoque, 0,",",".") }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-dark">
                                    <i class="fas fa-spinner fa-pulse text-danger mr-3"></i>
                                    <span>Atualizando</span>
                                </div>
                            </div>
                        </div>
                        <!---Card 4 END-->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!---End of Cards-->


    <!--tables-->
    <section class='mt-5'>

        <header class="container-fluid">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto row align-items-center">
                <h2>Relatórios</h2>
            </div>
        </header>

        <div class="container-fluid mt-5">
            <div class="row mb-5">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row align-items-center">

                        <!---Table 1 BEGIN-->
                        <div class="col-xl-12 col-12">
                            <h3 class="text-dark text-center mb-3">Últimas Vendas</h3>
                            <div class="table-responsive mt-3">
                                <table class="table table-striped bg-light text-center table-bordered table-hover">
                                    <thead class="text-dark">
                                        <tr>
                                            <th>Nro Pedido(ID)</th>
                                            <th>Usuário</th>
                                            <th>Valor Total</th>
                                            <th>Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pedidosRecente as $pedido)
                                            <tr>
                                                <td>{{$pedido->id}}</td>
                                                <td> @if ( $pedido->user_id > 0 ) {{App\Pedido::withTrashed()->find($pedido->id)->usuario->name}} @else Sem usuário @endif</td>
                                                <td>{{ $pedido->valorTotal() }}</td>

                                                @php
                                                    $date = DateTime::createFromFormat('Y-m-d H:i:s', $pedido->created_at );
                                                @endphp
                                                <td>{{$date->format('d/m/Y')}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="pagination justify-content-center">
                                {{ $pedidosRecente->links() }}
                            </div>
                        </div>
                        <!---Table 1 END-->


                        <!---Table 2 BEGIN-->
                        <div class="col-xl-12 col-12 mt-5">
                            <h3 class="text-dark text-center mb-3"> Movimentação de Estoque Recente </h3>
                            <div class="table-responsive mt-3">
                                <table class="table table-striped bg-light text-center table-bordered table-hover">
                                    <thead class="text-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Produto</th>
                                            <th>Tipo</th>
                                            <th>Quantidade</th>
                                            <th>Origem</th>
                                            <th>Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($movimentacaoRecente as $movimento)
                                        <tr>
                                            <td>{{$movimento->id}}</td>
                                            <td> @if ( $movimento->product_id > 0 ) {{App\Movimento::withTrashed()->find($movimento->id)->produto->name}} @else Sem produto @endif</td>
                                            <td>@if( $movimento->tipo == 'E' ) Entrada @else Saída @endif</td>
                                            <td>@if( $movimento->tipo == 'S' ) {{number_format($movimento->quantidade*-1,0,'.',',')}} @else {{number_format($movimento->quantidade,0,',','.')}} @endif</td>
                                            <td>@if( $movimento->fk_origem == 0) Manual @else Pedido - ID {{$movimento->fk_origem}} @endif</td>

                                            @php
                                                $date = DateTime::createFromFormat('Y-m-d H:i:s', $movimento->created_at );
                                            @endphp

                                            <td>{{$date->format('d/m/Y')}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!---Pagination-->
                            <div class="pagination justify-content-center">
                                {{ $movimentacaoRecente->links() }}
                            </div>
                            <!---End of Pagination-->
                        </div>
                        <!---Table 2 END-->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End of table-->
@endsection






