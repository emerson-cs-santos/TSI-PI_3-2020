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
                                        <input type="text" class='form-control' name="name" value="{{$usuario->name}}">
                                    </div>
                                    
                                    <div class="form-group">
                                        <input type="text" class='form-control' name="email" value="{{$usuario->email}}">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class='form-control' name="password">
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
