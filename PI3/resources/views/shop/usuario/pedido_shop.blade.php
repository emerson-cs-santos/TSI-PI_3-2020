@extends('layouts.Shopping')

@section('content_Shopping')
    <section class="new-arrivals">
        <div class="container">
            <header class="section-header mt-5">
                <h2>Seus Pedidos</h2>
            </header>

            <div class="feature-content row">

                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if(session()->has('error'))
                    <div class="alert alert-danger">{{ session()->get('error') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="list-group">
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item text-danger"> {{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="col-md-2">
                    @include('shop.usuario.usuario_Shop_menu')
                </div>

                <div class="col-md-10 mt-5">

                    {{-- Tabela inicio --}}
                    <div class="table-responsive mt-3">
                        <table class="table table-striped bg-light text-center table-bordered table-hover">
                            <thead class="text-dark">
                                <th class="text-center">Número do Pedido</th>
                                <th class="text-center">Valor Total</th>
                                <th class="text-center">Data</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Entrega</th>
                            </thead>
                            <tbody>
                                @foreach($pedidos as $pedido)
                                <tr class=" {{ $pedido->trashed() ? ' PedidoCancelado' : ''  }} ">
                                    <td>Nro. {{$pedido->id}}</td>
                                    <td>{{ $pedido->valorTotal() }}</td>

                                    @php
                                        $date = DateTime::createFromFormat('Y-m-d H:i:s', $pedido->created_at );
                                    @endphp
                                    <td>{{$date->format('d/m/Y')}}</td>

                                    <td>
                                        @if( $pedido->trashed() )
                                            CANCELADO
                                        @else
                                            Pagamento aprovado
                                        @endif
                                    </td>
                                    <td> Pendente </td>

                                    <td>
                                        <form  action="{{ route('item-pedido-shop-index', $pedido->id) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-warning float-center"> Ver Produtos </a>
                                        </form>
                                    </td>

                                    <td>
                                        @if ( !$pedido->trashed()  )
                                            <form  action="{{ route('pedido-shop-cancelar', $pedido->id) }}" method="POST" onsubmit="return confirm('Você tem certeza?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger float-center"> Cancelar Pedido </a>
                                            </form>
                                        @else
                                        <form  action="{{ route('pedido-shop-cancelado') }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-danger float-center"> Cancelar Pedido </a>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- Tabela fim --}}

                    <div class="container col-md-12 text-center">
                        <div class="pagination justify-content-center">
                            {{ $pedidos->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
