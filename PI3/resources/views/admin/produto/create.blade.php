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

                                <h2 class="text-center">Cadastrar Produto</h2>

                                <form action="{{route('products.store')}}" class='p-3 bg-white' method="post">
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
                                        <input type="text" class='form-control' name="name" placeholder="Digite o nome do produto" value="{{old('name')}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="category">Categoria:</label>
                                        <select name="category_id" class="form-control">
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>                                    
                            
                                    <div class="form-group">
                                        <label for="desc">Descrição</label>
                                        <textarea name="desc" class='form-control' placeholder="Digite uma descrição para o produto">{{old('desc')}}</textarea>
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="price">Preço</label>
                                        <input type="number" class='form-control' name="price" placeholder="Digite o preço" value="{{old('price')}}">
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="discount">Desconto</label>
                                        <input type="number" class='form-control' name="discount" placeholder="Digite o desconto" value="{{old('discount')}}">
                                    </div>
                            
                                    <div class='form-group'>
                                        <label for="image">Imagem do produto</label>
                                        <input type="text" name="image" class='form-control' value="{{old('image')}}">
                                    </div>                                 
                                    
                                    <button type="submit" class="btn btn-success">Criar Produto</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
