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

                            <h2 class="text-center">Produto {{$product->name}}</h2>

                                <div class='form-group'>
                                    
                                    <div class="form-group">
                                        <label for="name">Nome</label>
                                        <input type="text" class='form-control' name="name" placeholder="Digite o nome do produto" value="{{$product->name}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="category">Categoria:</label>
                                        <select name="category_id" class="form-control">
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}" @if($category->id == $product->category_id) selected @endif>
                                                {{$category->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>                                     
                            
                                    <div class="form-group">
                                        <label for="desc">Descrição</label>
                                        <textarea name="desc" class='form-control' placeholder="Digite uma descrição para o produto">{{$product->desc}}}</textarea>
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="price">Preço</label>
                                        <input type="number" class='form-control' name="price" placeholder="Digite o preço" value="{{$product->price}}">
                                    </div>
                            
                                    <div class="form-group">
                                        <label for="discount">Desconto</label>
                                        <input type="number" class='form-control' name="discount" placeholder="Digite o desconto" value="{{$product->discount}}">
                                    </div>
                            
                                    <div class='form-group'>
                                        <label for="image">Imagem do produto</label>
                                        <input type="text" name="image" class='form-control' value="{{$product->image}}">
                                    </div>                                 
                                    
                                    <a href="{{route('products.index')}}" class='btn btn-success'>Voltar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
