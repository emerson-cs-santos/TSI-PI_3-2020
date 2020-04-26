@extends('layouts.Admin')

@section('content_Admin')

    <section class='mt-5'>
        {{-- <header class="container-fluid">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto row align-items-center">
                <h2>Cadastro de Usuários</h2>
            </div>
        </header> --}}

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

                                <h2 class="text-center"> {{ Request::path() == 'Users' ? 'Cadastro de Usuários' : 'Lixeira de Usuários' }} </h2>

                                @if( Request::path() == 'Users' )
                                    <div class='d-flex mb-2 justify-content-center'>
                                        <a href="{{route('Users.create')}}" class='btn btn-success'>Novo</a>
                                    </div>
                                @endif

                                {{-- Tabela inicio --}}
                                <div class="table-responsive mt-3">
                                    <table class="table table-striped bg-light text-center table-bordered">
                                        <thead class="text-dark">
                                            <th>Código</th>
                                            <th>Nome</th>
                                            <th>E-mail</th>
                                            <th>Nível</th>
                                        </thead>
                                        <tbody>
                                            @foreach($usuarios as $usuario)
                                            <tr>
                                                <td>{{$usuario->id}}</th>
                                                <td>{{$usuario->name}}</td>
                                                <td>{{$usuario->email}}</td>
                                                <td>{{ $usuario->type == 'admin' ? ' Administrador' : 'Padrão' }}</td>

                                                @if(!$usuario->trashed())
                                                    <td>
                                                        <a href="{{ route('Users.show', $usuario->id) }}" class="btn btn-xs btn-primary">Visualizar</a>
                                                    </td>

                                                    <td>
                                                        <a href="{{ route('Users.edit', $usuario->id) }}" class="btn btn-xs btn-warning">Editar</a>
                                                    </td>
                                                @else
                                                    <td>
                                                        <form action="{{ route('restore-Users.update', $usuario->id) }}"  method="POST" onsubmit="return confirm('Você tem certeza que quer reativar?')">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" href="#" class="btn btn-primary btn-sm float-center ml-1">Reativar</button>
                                                        </form>
                                                    </td>
                                                @endif

                                                <td>
                                                    <form action="{{ route('Users.destroy', $usuario->id) }}" class="d-inline" method="POST" onsubmit="return confirm('Você tem certeza?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" href="#" class="btn btn-danger btn-sm float-center"> {{ $usuario->trashed() ? 'Apagar' : 'Mover para Lixeira' }} </a>
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
                                    {{ $usuarios->links() }}
                                </div>
                                <!---End of Pagination-->

                                @if( Request::path() == 'Users' )
                                    <a href="{{ route('trashed-Users.index') }}" class="btn btn-xs btn-info" data-placement="top" data-toggle="tooltip" title="Acessar registros excluídos">Lixeira</a>
                                @else
                                    <a href="{{route('Users.index')}}" class='btn btn-info'>Voltar ao cadastro</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div style="height: 291px;">

        </div> --}}
    </section>
@endsection
