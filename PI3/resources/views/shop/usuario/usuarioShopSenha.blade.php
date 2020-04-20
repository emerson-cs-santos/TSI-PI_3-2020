@extends('layouts.Shopping')

@section('content_Shopping')
    <section class="new-arrivals">
        <div class="container">
            <header class="section-header mt-5">
                <h2>Senha</h2>
            </header>

            <div class="feature-content row">

                <div class="col-md-2">
                    @include('shop.usuario.usuario_Shop_menu')
                </div>

                <div class="col-md-10 mt-5">
                    <div class="form-group">
                        <label for="passwordOld">Senha atual</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="passwordOld" placeholder="Digite a senha atual" required autocomplete="new-password" >
                    </div>

                    <div class="form-group">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Digite a nova senha" required autocomplete="new-password" >
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirme a senha</label>
                        <input type="password" class='form-control' name="password_confirmation" placeholder="Digite novamente a nova senha" required autocomplete="new-password" >
                    </div>

                    <button type="submit" class="btn btn-warning">Salvar</button>
                </div>
            </div>
        </div>
    </section>
@endsection
