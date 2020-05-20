<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Carrinho;
use App\Movimento;
use App\ItemPedido;

class ProductsController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('VerifyCategoriesCount')->only(['create','store']);
        $this->middleware('is_admin');
    }

    public function index()
    {
        $products = Product::selectRaw('products.*')->orderByDesc('id')->paginate(4);

        return view('admin.produto.index', ['products' => $products]);
    }


    public function create()
    {
        return view('admin.produto.create')->with('categories', Category::orderBy('name')->get() );
    }


    public function store(CreateProductRequest $request)
    {

        $preco = $request->preco;
        $preco = str_replace('.','',$preco);
        $preco = str_replace(',','.',$preco);

        $file = $request->file('imagem');
        $imagem_convertida = "";

        if ( !empty($file) )
        {
             $data               = file_get_contents($file);
             $dataEncoded        = base64_encode($data);
             $imagem_convertida  = "data:image/jpeg;base64,$dataEncoded";
        }

        // Banco de dados não aceita nulo
        $desconto = $request->discount;

        if ($desconto<=0 || $desconto == null)
        {
            $desconto = 0;
        }

        $desconto = str_replace(',','.',$desconto);

        Product::create([
            'name'          => $request->name
            ,'image'        => $imagem_convertida
            ,'desc'         => $request->descricao
            ,'price'        => $preco
            ,'discount'     => $desconto
            ,'category_id'  => $request->category_id
            ,'home'         => $request->home
        ]);

       session()->flash('success', 'Produto criado com sucesso!');

        return redirect(route('products.index'));
    }

    public function show(Product $product)
    {
        return view('admin.produto.show')->with('product', $product)->with('categories', Category::orderBy('name')->get() );
    }


    public function edit(Product $product)
    {
        return view('admin.produto.edit')->with('product', $product)->with('categories', Category::orderBy('name')->get() );
    }


    public function update(EditProductRequest $request, Product $product)
    {
        $preco = $request->preco;
        $preco = str_replace('.','',$preco);
        $preco = str_replace(',','.',$preco);

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

        // Banco de dados não aceita nulo
        $desconto = $request->discount;

        if ($desconto<=0 || $desconto == null)
        {
            $desconto = 0;
        }

        $desconto = str_replace(',','.',$desconto);

        $product->update([
            'name'          => $request->name
            ,'desc'         => $request->descricao
            ,'price'        => $preco
            ,'discount'     => $desconto
            ,'category_id'  => $request->category_id
            ,'home'         => $request->home
        ]);

        session()->flash('success', 'Produto alterado com sucesso!');
        return redirect(route('products.index'));
    }


    public function destroy($id)
    {
        $carrinhoQtd = Carrinho::withTrashed()->where('product_id',$id)->count();

        if ( $carrinhoQtd > 0 )
        {
            session()->flash('error', "Produto já está em carrinho(s) de compra!");
            return redirect()->back();
        }

        $pedidoQtd = ItemPedido::all()->where('product_id',$id)->count();
        if ($pedidoQtd > 0)
        {
            session()->flash('error', "Produto já está em pedido(s)!");
            return redirect()->back();
        }

        $pedidoQtd = Movimento::all()->where('product_id',$id)->count();
        if ($pedidoQtd > 0)
        {
            session()->flash('error', "Produto já possui movimentação de estoque!");
            return redirect()->back();
        }

        $product = Product::withTrashed()->where('id', $id)->firstOrFail();

        if($product->trashed())
        {
            $product->forceDelete();
            session()->flash('success', 'Produto removido com sucesso!');
        }
        else
        {
            $product->delete();
            session()->flash('success', 'Produto movido para lixeira com sucesso!');
        }
        return redirect()->back();

        //return redirect(route('products.index'));
    }

    public function trashed()
    {
        $products = Product::onlyTrashed()->paginate(4);
        return view('admin.produto.index', ['products' => $products]);

       // return view('admin.produto.index')->with('products',Product::onlyTrashed()->get());
    }

    public function restore($id){
        $product = Product::withTrashed()->where('id', $id)->firstOrFail();
        $product->restore();
        session()->flash('success', 'Produto ativado com sucesso!');
        return redirect()->back();
    }
}
