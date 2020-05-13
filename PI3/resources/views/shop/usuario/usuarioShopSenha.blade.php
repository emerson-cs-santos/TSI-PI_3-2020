@extends('layouts.Shopping')

@section('content_Shopping')
    <section class="new-arrivals">
        <div class="container">
            <header class="section-header mt-5">
                <h2>Senha</h2>
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
                    <form action="{{route('usuario-atualizar-senha')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                    <div class="form-group">
                        <label for="SenhaAtual">Senha atual</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="SenhaAtual" required placeholder="Digite a senha atual" autocomplete="new-password" >
                    </div>

                    <div class="form-group">
                        <label for="password">Nova Senha</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Digite a nova senha" autocomplete="new-password" >
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirmar Senha</label>
                        <input type="password" class='form-control' name="password_confirmation" required placeholder="Digite novamente a nova senha" autocomplete="new-password" >
                    </div>

                    <button type="submit" class="btn btn-warning">Salvar</button>
                </div>
            </div>
        </div>
    </section>
@endsection
