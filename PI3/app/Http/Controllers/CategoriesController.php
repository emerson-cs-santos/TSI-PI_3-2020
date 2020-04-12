<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\EditCategoryRequest;

class CategoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }    

    public function index()
    {
        return view('admin.categoria.index')->with('categories', Category::all());
    }


    public function create()
    {
        return view('admin.categoria.create');
    }


    public function store(CreateCategoryRequest $request)
    {
        Category::create([
            'name' => $request->name
        ]);

       session()->flash('success', 'Categoria criada com sucesso!');

        return redirect(route('categories.index'));
    }

    public function show(Category $category)
    {
        return view('admin.categoria.show')->with('category', $category);
    }


    public function edit(Category $category)
    {
        return view('admin.categoria.edit')->with('category', $category);
    }


    public function update(EditCategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name
        ]);

        session()->flash('success', 'Categoria alterada com sucesso!');
        return redirect(route('categories.index'));
    }


    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', 'Categoria apagada com sucesso!');
        return redirect(route('categories.index'));
    }
}
