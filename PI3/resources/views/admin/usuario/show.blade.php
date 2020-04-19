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

                            <h2 class="text-center">Usuário {{$usuario->name}}</h2>

                                <div class='p-3 bg-white'>

                                    <div class="form-group">
                                        <label for="name">Nome</label>
                                        <input type="text" class='form-control' name="name" placeholder="Digite o nome do Usuário" value="{{$usuario->name}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="email" class='form-control' name="email" placeholder="Digite o nome do E-mail" value="{{$usuario->email}}">
                                    </div>

                                    <div class="form-group text-center">
                                        <label>Imagem de usuário</label>
                                        <img class="form-control rounded mx-auto d-block img_extra_small_cli img_small_cli img_normal_cli mt-1" alt="Imagem do Produto" src="{{$usuario->image}}" >
                                    </div>

                                    <div class="form-group">
                                        <label for="type">Nível de Acesso</label>
                                        <select name="type" class="form-control">
                                            <option value="padrao"  @if( $usuario->type == "padrao" ) selected @endif   >Padrão</option>
                                            <option value="adm"     @if( $usuario->type == "adm" )selected @endif       >Adminstrador</option>
                                        </select>
                                    </div>

                                    <a href="{{route('Users.index')}}" class='btn btn-success'>Voltar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
