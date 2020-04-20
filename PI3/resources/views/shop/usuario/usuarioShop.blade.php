@extends('layouts.Shopping')

@section('content_Shopping')
    <section class="new-arrivals">
        <div class="container">
            <header class="section-header mt-5">
                <h2>Sua Conta</h2>
            </header>

            <div class="feature-content row">

                <div class="col-md-2">
                    @include('shop.usuario.usuario_Shop_menu')
                </div>

                <div class="col-md-10 mt-5">
                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input type="text" class='form-control' name="name" value="{{ Auth::user()->name }}">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" class='form-control' name="email" placeholder="Digite o nome do E-mail" value="{{ Auth::user()->email }}">
                    </div>

                    <button type="submit" class="btn btn-warning">Salvar</button>
                </div>
            </div>
        </div>
    </section>
@endsection
