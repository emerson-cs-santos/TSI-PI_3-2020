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

                                <h2 class="text-center">Cadastro de Produtos</h2>

                                <div class='d-flex mb-2 justify-content-center'>
                                    <a href="{{route('products.create')}}" class='btn btn-success'>Novo</a>
                                </div>

                                {{-- Tabela inicio --}}
                                <div class="table-responsive mt-3">
                                    <table class="table table-striped bg-light text-center table-bordered">
                                        <thead class="text-dark">
                                            <th>Código</th>
                                            <th>Nome</th>
                                            <th>Preço</th>
                                            <th>Desconto</th>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $product)
                                            <tr>
                                                <td>{{$product->id}}</th>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->price}}</td>
                                                <td>{{$product->discount}}</td>
                                                <td>
                                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-xs btn-primary">Visualizar</a>
                                                </td>
                                                <td>
                                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-xs btn-warning">Editar</a>
                                                </td>
                                                <td class='align-items-center'>
                                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Você tem certeza que quer apagar?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" href="#" class="btn btn-danger btn-sm float-right">Excluir</a>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- Tabela fim --}}

                                <!---Pagination-->
                                <nav class="color">
                                    <ul class="pagination justify-content-center">

                                        <li class="page-item">
                                            <a href="#" class="page-link py-2 px-3">
                                                <span>&laquo;</span>
                                            </a>
                                        </li>

                                        @for ($i = 1; $i <= 5; $i++)
                                            <li class="page-item {{ $i == 1 ? ' active' : '' }} ">
                                                <a href="#" class="page-link py-2 px-3">
                                                    {{ $i }}
                                                </a>
                                            </li>
                                        @endfor

                                        <li class="page-item">
                                            <a href="#" class="page-link py-2 px-3">
                                                <span>&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                                <!---End of Pagination-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
