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

                                <h2 class="text-center">Cadastrar Usuário</h2>

                                <form action="{{route('Users.store')}}" class='p-3 bg-white' method="post">
                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="list-group">
                                                @foreach ($errors->all() as $error)
                                                    <li class="list-group-item text-danger">{{$error}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @csrf

                                    <div class="form-group">
                                        <label for="name">Nome</label>
                                        <input type="text" class='form-control' name="name" placeholder="Digite o nome do Usuário" value="{{old('name')}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="email" class='form-control' name="email" placeholder="Digite o nome do E-mail" value="{{old('email')}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="type">Nível de Acesso</label>
                                        <select name="type" class="form-control">
                                            <option value="padrao"  @if(old('type') == 'padrao')selected @endif >Padrão</option>
                                            <option value="adm"     @if(old('type') == 'adm')selected @endif    >Adminstrador</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Senha</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Digite a senha" required autocomplete="new-password" >
                                    </div>

                                    <div class="form-group">
                                        <label for="password_confirmation">Confirme a senha</label>
                                        <input type="password" class='form-control' name="password_confirmation" placeholder="Digite a senha" required autocomplete="new-password">
                                    </div>

                                    <button type="submit" class="btn btn-success">Criar</button>
                                    <a href="{{route('Users.index')}}" class='btn btn-primary'>Voltar</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
