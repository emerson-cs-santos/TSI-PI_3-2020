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

                                <h2 class="text-center"> {{ Request::path() == 'products' ? 'Cadastro de Produtos' : 'Lixeira de produtos' }} </h2>

                                @if( Request::path() == 'products' )
                                    <div class='d-flex mb-2 justify-content-center'>
                                        <a href="{{route('products.create')}}" class='btn btn-success'>Novo</a>
                                    </div>
                                @endif

                                {{-- Tabela inicio --}}
                                <div class="table-responsive mt-3">
                                    <table class="table table-striped bg-light text-center table-bordered table-hover">
                                        <thead class="text-dark">
                                            <th>Código</th>
                                            <th>Nome</th>
                                            <th>Preview</th>
                                            <th>Estoque</th>
                                            <th>Preço</th>
                                            <th>Desconto</th>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $product)
                                            <tr>
                                                <td>{{$product->id}}</td>
                                                <td>{{$product->name}}</td>
                                                <td> <img src="@if ( empty($product->image) ) {{asset('admin_assets/images/produto_sem_imagem.jpg')}} @else {{$product->image}} @endif" alt="Preview do produto" class='img_preview'> </td>
                                                <td> {{ App\Product::withTrashed()->find($product->id)->produtoSaldo->sum('quantidade')}} </td>
                                                <td>{{$product->price}}</td>
                                                <td>{{$product->discount}}</td>

                                                @if(!$product->trashed())
                                                    <td>
                                                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-xs btn-primary">Visualizar</a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-xs btn-warning">Editar</a>
                                                    </td>
                                                @else
                                                    <td>
                                                        <form action="{{ route('restore-product.update', $product->id) }}" method="POST" onsubmit="return confirm('Você tem certeza que quer reativar?')">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" href="#" class="btn btn-primary btn-sm float-center ml-1">Reativar</button>
                                                        </form>
                                                    </td>
                                                @endif

                                                <td>
                                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Você tem certeza?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" href="#" class="btn btn-danger btn-sm float-center"> {{ $product->trashed() ? 'Apagar' : 'Mover para Lixeira' }} </a>
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
                                    {{ $products->links() }}
                                </div>
                                <!---End of Pagination-->

                                @if( Request::path() == 'products' )
                                    <a href="{{ route('trashed-product.index') }}" class="btn btn-xs btn-info" data-placement="top" data-toggle="tooltip" title="Acessar registros excluídos">Lixeira</a>
                                @else
                                    <a href="{{route('products.index')}}" class='btn btn-info'>Voltar ao cadastro</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
