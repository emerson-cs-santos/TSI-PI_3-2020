<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.produto.index')->with('products', Product::all());
    }


    public function create()
    {
        return view('admin.produto.create')->with('categories', Category::all());
    }


    public function store(CreateProductRequest $request)
    {
        $file = $request->file('imagem');
        $imagem_convertida = "";

        if ( !empty($file) )
        {
             $data               = file_get_contents($file);
             $dataEncoded        = base64_encode($data);
             $imagem_convertida  = "data:image/jpeg;base64,$dataEncoded";
        }

        Product::create([
            'name' => $request->name
            ,'image' => $imagem_convertida
            ,'desc' => $request->descricao
            ,'price' => $request->preco
            ,'discount' => $request->discount
            ,'category_id'  => $request->category_id
        ]);

       session()->flash('success', 'Produto criado com sucesso!');

        return redirect(route('products.index'));
    }

    public function show(Product $product)
    {
        return view('admin.produto.show')->with('product', $product)->with('categories', Category::all());
    }


    public function edit(Product $product)
    {
        return view('admin.produto.edit')->with('product', $product)->with('categories', Category::all());
    }


    public function update(EditProductRequest $request, Product $product)
    {

        // Apenas gravar imagem se foi alterada
        $file = $request->file('imagem');
        if ( !empty($file) )
        {
             $data               = file_get_contents($file);
             $dataEncoded        = base64_encode($data);
             $imagem_convertida  = "data:image/jpeg;base64,$dataEncoded";

             $product->update([
                'image'        => $imagem_convertida
            ]);
        }

        $product->update([
            'name'          => $request->name
            ,'desc'         => $request->descricao
            ,'price'        => $request->preco
            ,'discount'     => $request->discount
            ,'category_id'  => $request->category_id
        ]);

        session()->flash('success', 'Produto alterado com sucesso!');
        return redirect(route('products.index'));
    }


    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('success', 'Produto deletado com sucesso!');
        return redirect(route('products.index'));
    }
}
