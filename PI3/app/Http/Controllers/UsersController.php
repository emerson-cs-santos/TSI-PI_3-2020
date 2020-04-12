<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\CreateUsersRequest;
use App\Http\Requests\EditUserRequest;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('admin.usuario.index')->with('usuarios', User::all());
    }


    public function create()
    {
        return view('admin.usuario.create');
    }


    public function store(CreateUsersRequest $request)
    {
        User::create([
            'name' => $request->name
            ,'email' => $request->email
            ,'password' => $request->password
        ]);

       session()->flash('success', 'Usuário criado com sucesso!');

        return redirect(route('Users.index'));
    }


    public function show(User $user)
    {
        return view('admin.usuario.show')->with('usuario',$user);
    }


    public function edit(User $user)
    {
        return view('admin.usuario.edit')->with('usuario',$user);
    }


    public function update(EditProductRequest $request, User $user)
    {
        $user->update([
            'name' => $request->name
            ,'email' => $request->email
            ,'password' => $request->password
        ]);

        session()->flash('success', 'Usuário alterado com sucesso!');
        
        return redirect(route('Users.index'));
    }


    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('success', 'Usuário apagado com sucesso!');
        return redirect(route('Users.index'));
    }
}
