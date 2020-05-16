<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\EditSenhaShopRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class usuarioShopController extends Controller
{
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    public function usuario()
    {
        return view('shop.usuario.usuarioShop');
    }

    public function usuarioSenha()
    {
        return view('shop.usuario.usuarioShopSenha');
    }

    public function updateUserShop(EditUserRequest $request)
    {
      // dd($request);

       $usuario = User::find( Auth::user()->id );

       $usuario->name = $request->name;
       $usuario->email = $request->email;

        if($usuario->email != $request->email){
            $usuario->email = $request->email;
            $usuario->email_verified_at = null;
        }

       $usuario->save();

        session()->flash('success', 'Informações atualizadas com sucesso!');

        return redirect(route('usuario-shop'));
    }

    public function updateUserShopSenha(EditSenhaShopRequest $request)
    {
      // dd($request);

       $usuario = User::find( Auth::user()->id );

       if ( !Hash::check($request->SenhaAtual, $usuario->password)  )
       {
            session()->flash('error', "Senha atual não confere!");
            return redirect()->back();
       }

        $usuario->password = Hash::make( $request['password'] );

        $usuario->save();

        session()->flash('success', 'Senha alterada com sucesso!');

        return redirect(route('usuario-senha'));
    }
}
