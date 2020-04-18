<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\CreateUsersRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Hash;

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
        //dd($request);

        // Pegando Nivel de acesso enviado pela pagina de criar novo cadastro
        $nivel_acesso = "";
        if ($request->type == 'adm')
        {
            $nivel_acesso ='admin';
        }
        else
        {
            $nivel_acesso ='default';
        }

        User::create([
            'name' => $request->name
            ,'email' => $request->email
            ,'password' => Hash::make($request['password']) //$request->password
            ,'type' => $nivel_acesso
        ]);

       session()->flash('success', 'Usuário criado com sucesso!');

        return redirect(route('Users.index'));
    }


    public function show($id)
    //public function show(User $user)
    {
       // return view('admin.usuario.show')->with('usuario',$user);

        return view('admin.usuario.show')->with('usuario', User::find($id));
    }


    //public function edit(User $user)
    public function edit($id)
    {
        //return view('admin.usuario.edit')->with('usuario',$user);

        $usuario_editar =  User::find($id);

        // Real tipo que fica salvo no Banco não ser exibido na página
        if ($usuario_editar->type == 'admin')
        {
            $usuario_editar->type ='adm';
        }
        else
        {
            $usuario_editar->type ='padrao';
        }

        return view('admin.usuario.edit')->with('usuario',$usuario_editar);
    }


    // public function update(EditUserRequest $request, User $user)
    // {

             //dd($user);
    //     $user->update([
    //         'name' => $request->name
    //         ,'email' => $request->email
    //         ,'password' => $request->password
    //     ]);

    //     session()->flash('success', 'Usuário alterado com sucesso!');

    //     return redirect(route('Users.index'));
    // }


    public function update(EditUserRequest $request)
    {
       //dd($request);

       // $dados = request()->all();
       // dd($dados);

       $usuario = User::find($request->id);

       $usuario->name = $request->name;
       $usuario->email = $request->email;

        // Pegando Nivel de acesso enviado pela pagina de criar novo cadastro
        $nivel_acesso = "";
        if ($request->type == 'adm')
        {
            $nivel_acesso ='admin';
        }
        else
        {
            $nivel_acesso ='default';
        }
        $usuario->type = $nivel_acesso;

        // Apenas gravar nova senha se foi alterada na edição do cadastro.
        if ( !$request->password == '')
        {
            $usuario->password = Hash::make( $request['password'] );
        }

       $usuario->save();

        session()->flash('success', 'Usuário alterado com sucesso!');

        return redirect(route('Users.index'));
    }


    //public function destroy(User $user)
    public function destroy($id)
    {
        //$user->delete();

        $usuario = User::find($id);
        $usuario->delete();

        session()->flash('success', 'Usuário apagado com sucesso!');
        return redirect(route('Users.index'));
    }
}
