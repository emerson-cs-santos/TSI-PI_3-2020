<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CreateClienteRequest;
use App\Http\Requests\EditClienteRequest;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cliente.index')->with('clientes', Cliente::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateClienteRequest $request)
    {
        Cliente::create([
            'name' => $request->name
        ]);

        session()->flash('success', 'Cliente registrado com sucesso!');

        return redirect(route('clientes.index'));
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.cliente.show')->with('cliente', Cliente::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('admin.cliente.edit')->with('cliente', $cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditClienteRequest $request, Cliente $cliente)
    {
        $cliente->update([
            'name'=> $request->name,
        ]);

        session()->flash('success', 'Cliente Alterado com sucesso!');

        return redirect(route('clientes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        session()->flash('success', 'Cliente apagado com sucesso!');
        return redirect(route('clientes.index'));
    }
}
