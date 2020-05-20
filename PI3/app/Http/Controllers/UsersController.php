<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\CreateUsersRequest;
use App\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth');
        $this->middleware('is_admin');
    }


    public function index()
    {
       $users = User::selectRaw('users.*')->orderByDesc('id')->paginate(5);

       return view('admin.usuario.index', ['usuarios' => $users]);
    }

    public function create()
    {
        return view('admin.usuario.create');
    }


    public function store(CreateUsersRequest $request)
    {
        //dd($request);

        //$imagePath = $request->myFile;

        $file = $request->file('imagem');

        // 2000000 = 1mb
        // 2000000 = 2mb
        // 4000000 = 4mb
        // 8000000 = 8mb
        // 10000000 = 10mb
       // if ( filesize($file) > 1000000)
        //{
            //echo 'maior';
            //return false;
        //}

        //dd(filesize($file));

        $imagem_convertida = "";

       if ( !empty($file) )
       {
            $data               = file_get_contents($file);
            $dataEncoded        = base64_encode($data);
            $imagem_convertida  = "data:image/jpeg;base64,$dataEncoded";
       }

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
            ,'image' => $imagem_convertida
        ]);

       session()->flash('success', 'Usuário criado com sucesso!');

        return redirect(route('Users.index'));
    }


    public function show($id)
    //public function show(User $user)
    {
       // return view('admin.usuario.show')->with('usuario',$user);

       $usuario_visualizar = User::find($id);

       if ( empty($usuario_visualizar->image) )
       {
        $usuario_visualizar->image = asset('admin_assets/images/produto_sem_imagem.jpg');
       }

        return view('admin.usuario.show')->with('usuario', $usuario_visualizar );
    }


    //public function edit(User $user)
    public function edit($id)
    {
        //return view('admin.usuario.edit')->with('usuario',$user);

        if ( auth()->user()->id  !== intval($id) )
        {
            session()->flash('error', "Só é possivel gerenciar seu próprio usuário!");
            return redirect()->back();
        }

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


    public function update(EditUserRequest $request)
    {
       //dd($request);

       // $dados = request()->all();
       // dd($dados);

       $usuario = User::find($request->id);

       if ( auth()->user()->id  !== intval($request->id) )
       {
           session()->flash('error', "Só é possivel gerenciar seu próprio usuário!");
           return redirect()->back();
       }

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

        if($usuario->email != $request->email){
            $usuario->email = $request->email;
            $usuario->email_verified_at = null;
        }

        // Apenas gravar nova senha se foi alterada na edição do cadastro.
        if ( !$request->password == '')
        {
            $usuario->password = Hash::make( $request['password'] );
        }

        // Apenas gravar imagem se foi alterada
        $file = $request->file('imagem');
       if ( !empty($file) )
       {
            $data               = file_get_contents($file);
            $dataEncoded        = base64_encode($data);
            $imagem_convertida  = "data:image/jpeg;base64,$dataEncoded";

            $usuario->image     = $imagem_convertida;
       }

       $usuario->save();

        session()->flash('success', 'Usuário alterado com sucesso!');

        return redirect(route('Users.index'));
    }


    //public function destroy(User $user)
    public function destroy($id)
    {
        //$user->delete();

        // $usuario = User::find($id);
        // $usuario->delete();

        // session()->flash('success', 'Usuário apagado com sucesso!');
        // return redirect(route('Users.index'));

        if ( auth()->user()->id  !== intval($id) )
        {
            session()->flash('error', "Só é possivel gerenciar seu próprio usuário!");
            return redirect()->back();
        }

        $User = User::withTrashed()->where('id', $id)->firstOrFail();
        if($User->trashed()){
            $User->forceDelete();
            session()->flash('success', 'Usuário apagado com sucesso!');
        }else{
            $User->delete();
            session()->flash('success', 'Usuário movido para lixeira com sucesso!');
        }
        return redirect()->back();
    }

    public function trashed()
    {
        $users = User::selectRaw('users.*')->onlyTrashed()->orderByDesc('id')->paginate(5);
        return view('admin.usuario.index', ['usuarios' => $users]);
    }

    public function restore($id)
    {
        $user = User::withTrashed()->where('id', $id)->firstOrFail();
        $user->restore();
        session()->flash('success', 'Usuário ativado com sucesso!');
        return redirect()->back();
    }
}
