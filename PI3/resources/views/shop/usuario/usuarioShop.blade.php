@extends('layouts.Shopping')

@section('content_Shopping')
    <section class="new-arrivals">
        <div class="container">
            <header class="section-header mt-5">
                <h2>Sua Conta</h2>
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
                    <form action="{{route('usuario-atualizar')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class='form-control' name="name" id="name" value="{{ Auth::user()->name }}">
                        </div>

                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class='form-control' name="email" id="email" placeholder="Digite o nome do E-mail" value="{{ Auth::user()->email }}">
                        </div>

                        <button type="submit" class="btn btn-warning">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
