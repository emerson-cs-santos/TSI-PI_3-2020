@extends('layouts.Shopping')

@section('content_Shopping')
    <section class="new-arrivals">
        <div class="container">
            <header class="section-header mt-5">
                <h2>Seu Carrinho</h2>
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

                <div class="col-md-10 mt-2">
                    <form action="{{ route('carrinho-shop-limpar',auth()->user()->id ) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-warning mt-2" onclick="confirmar('Remover todos os produtos do carrinho','Você tem certeza?', this.form)" >Limpar Carrinho</button>
                    </form>
                    <div class="table-responsive mt-3">
                        <table class="table table-striped bg-light text-center table-bordered table-hover">
                            <thead class="text-dark">
                                <th class="text-center">Produto</th>
                                <th class="text-center">Preview</th>
                                <th class="text-center">Valor</th>
                                <th class="text-center">Quantidade</th>
                                <th class="text-center">Sub-Total</th>
                            </thead>

                            <tbody>
                                @php
                                    $total = 0;

                                    $carrinhosSomar = App\Carrinho::selectRaw('carrinhos.product_id, sum(carrinhos.quantidade) as qtd_total')
                                    ->where('user_id', '=', auth()->user()->id )
                                    ->groupBy('carrinhos.product_id')
                                    ->orderBy('carrinhos.product_id')
                                    ->get();

                                    foreach ($carrinhosSomar as $cart)
                                    {
                                        $produto    = App\Product::withTrashed()->find($cart->product_id);
                                        $subTotal   = $cart->qtd_total * $produto->price;
                                        $total      = $total + $subTotal;
                                    }
                                @endphp

                                @foreach($itens as $item)

                                @php
                                    $produto    = App\Product::withTrashed()->find($item->product_id);
                                    $subTotal   = $item->qtd_total * $produto->price;
                                @endphp

                                <tr>
                                    <td><a
                                        href="{{ route('produto-loja', $produto->id) }}"
                                        class="carrinho_nome_produto"
                                        data-placement="top" data-toggle="tooltip" title="Ver Produto">
                                        {{$produto->name}}
                                    </a></td>

                                    <td> <a href="{{ route('produto-loja', $produto->id) }}" > <img src="@if ( empty($produto->image) ) {{asset('admin_assets/images/produto_sem_imagem.jpg')}} @else {{$produto->image}} @endif" alt="Preview do produto" class='img_preview img_extra img_normal' data-placement="top" data-toggle="tooltip" title="Ver Produto"> </a> </td>

                                    <td>
                                        @if( $produto->discount > 0 ) <del> {{$produto->price()}} </del>  @else {{$produto->price()}}  @endif
                                        @if( $produto->discount > 0 )  {{$produto->discountPrice()}} @endif
                                    </td>

                                    <td>{{number_format($item->qtd_total,0,',','.')}}</td>

                                    <td>{{ 'R$'.number_format($subTotal, 2,',','.') }}</td>

                                    <td>
                                        <form action="{{ route('carrinho-shop-destroy', $produto->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm float-center" onclick="confirmar('Remover item do carrinho','Você tem certeza?', this.form)" > Remover do carrinho </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="container col-md-12 text-center">
                        <div class="pagination ">
                            {{ $itens->links() }}
                        </div>
                    </div>

                    <div class="container col-md-12">
                        <div class="text-center">
                            <span class="h3 col-md-12">Total: {{ 'R$'.number_format($total, 2,',','.') }}</span>
                            <div>
                                <form action="{{ route('carrinho-shop-finalizar') }}" method="GET">
                                    @csrf
                                    <button type="button" class="btn btn-warning mt-2" onclick="confirmar('Finalizar pedido','Confimar compra?', this.form)">Finalizar Compra</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
