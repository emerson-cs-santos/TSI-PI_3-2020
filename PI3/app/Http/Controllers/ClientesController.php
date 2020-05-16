<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateClienteRequest;
use App\Http\Requests\EditClienteRequest;

class ClientesController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('is_admin');
    }

    public function index()
    {
        $clientes = Cliente::paginate(5);
        return view('admin.cliente.index', ['clientes' => $clientes]);
    }


    public function create()
    {
        return view('admin.cliente.create');
    }

    public function store(CreateClienteRequest $request)
    {
        Cliente::create([
            'name' => $request->name
        ]);

        session()->flash('success', 'Cliente registrado com sucesso!');

        return redirect(route('clientes.index'));
    }

    public function show($id)
    {
        return view('admin.cliente.show')->with('cliente', Cliente::find($id));
    }

    public function edit(Cliente $cliente)
    {
        return view('admin.cliente.edit')->with('cliente', $cliente);
    }

    public function update(EditClienteRequest $request, Cliente $cliente)
    {
        $cliente->update([
            'name'=> $request->name,
        ]);

        session()->flash('success', 'Cliente Alterado com sucesso!');

        return redirect(route('clientes.index'));
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        session()->flash('success', 'Cliente apagado com sucesso!');
        return redirect(route('clientes.index'));
    }

    public function trashed()
    {
        $clientes = Cliente::onlyTrashed()->paginate(5);
        return view('admin.cliente.index', ['clientes' => $clientes]);
    }

    public function restore($id)
    {
        $cliente = Cliente::withTrashed()->where('id', $id)->firstOrFail();
        $cliente->restore();
        session()->flash('success', 'Cliente reativado com sucesso!');
        return redirect()->back();
    }
}
