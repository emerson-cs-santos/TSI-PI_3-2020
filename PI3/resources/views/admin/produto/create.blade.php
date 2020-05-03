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

                                <form action="{{route('products.store')}}" class='p-3 bg-white' method="post" enctype="multipart/form-data">
                                    @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="list-group">
                                                @foreach ($errors->all() as $error)
                                                <li class="list-group-item text-danger">{{ Str::replaceArray('2000 kilobytes', ['2 MegaBytes'], $error) }}</li>
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
                                            <option value="{{$category->id}}" @if( old('category_id') == $category->id ) selected @endif >{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="descricao">Descrição</label>
                                        <textarea name="descricao" class='form-control' placeholder="Digite uma descrição para o produto">{{old('desc')}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="preco">Preço</label>
                                        <input type="number" class='form-control' name="preco" placeholder="Digite o preço" value="{{old('price')}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="discount">Desconto</label>
                                        <input type="number" class='form-control' name="discount" placeholder="Digite o desconto" value="{{old('discount')}}">
                                    </div>

                                    <div class="form-group">
                                        <label>Imagem do produto</label>
                                        <input class="form-control" type="file" name="imagem" accept="image/png, image/jpeg, image/jpg" onchange="preview_image(event)" >
                                        <img id="ExibirIMG_inputfile" class="form-control img_extra_small_prod img_small_prod img_normal_prod mt-5" alt="Imagem do Produto" src=" @if( empty(old('imagem')) )  {{asset('admin_assets/images/produto_sem_imagem.jpg')}} @endif" >
                                    </div>

                                    <button type="submit" class="btn btn-success">Criar</button>
                                    <a href="{{route('products.index')}}" class='btn btn-primary'>Voltar</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
