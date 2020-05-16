@extends('layouts.Shopping')

@section('content_Shopping')
    <section class="new-arrivals">
        <div class="container">
            <header class="section-header mt-5">
                <h2>Pedido {{$pedido->id}}</h2>
                @if ( $pedido->trashed() ) <span class="text-danger PedidoCanceladoTitlo">(CANCELADO)</span> @endif
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
                        <table class="table table-striped bg-light text-center table-bordered">
                            <thead class="text-dark">
                                <th>Código</th>
                                <th>Produto</th>
                                <th>Quantidade</th>
                                <th>Valor</th>
                                <th>Sub Total</th>
                            </thead>
                            <tbody>
                                @foreach($itensPedido as $itemPedido)
                                <tr>
                                    <td>{{$itemPedido->id}}</td>
                                    <td> @if ( $itemPedido->product_id > 0 ) {{App\ItemPedido::find($itemPedido->id)->produto->name}} @else Sem produto @endif</td>
                                    <td>{{$itemPedido->quantidade}}</td>
                                    <td>{{'R$'.number_format($itemPedido->preco, 2) }}</td>
                                    <td>{{'R$'.number_format($itemPedido->quantidade * $itemPedido->preco, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- Tabela fim --}}

                    <div class="container col-md-12">
                        <div class="text-center">
                            <span class="h3 col-md-12 font-weight-bold" >Valor Total: {{ $pedido->valorTotal() }} </span>
                            <div>
                                <form  action="{{ route('pedido-shop-index')}} " method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-warning float-center"> Voltar ao pedidos </a>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="container col-md-12 text-center">
                        <div class="pagination justify-content-center">
                            {{ $itensPedido->links() }}
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </section>
@endsection
