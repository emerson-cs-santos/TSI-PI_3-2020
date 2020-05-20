<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SobreNos;
use App\Http\Requests\EditSobreRequest;

class SobreNosController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function sobre_index()
    {
        return view('admin.sobre.index');
    }

    public function sobre_quem_somos()
    {
        $quemSomos = SobreNos::all()->where('pagina','quemSomos')->first();

        // SE NÃO EXISTIR, CRIAR REGISTRO
        if ( $quemSomos == null )
        {
            $quemSomos = SobreNos::create([
                'pagina'    => 'quemSomos'
                ,'titulo'   => 'Somos jogadores'
                ,'texto'    => 'Texto padrão'
            ]);
        }

        if ( $quemSomos == null )
        {
            session()->flash('error', "Informações não encontradas, entre em contato com o administrador do site!");
            return redirect()->back();
        }

        return view('admin.sobre.quemSomos')->with('quemSomos', $quemSomos);
    }

    public function sobre_contato()
    {
        $contato = SobreNos::all()->where('pagina','contato')->first();

        // SE NÃO EXISTIR, CRIAR REGISTRO
        if ( $contato == null )
        {
            $contato = SobreNos::create([
                'pagina'    => 'contato'
                ,'titulo'   => 'Fale conosco!'
                ,'texto'    => 'Texto padrão'
            ]);
        }

        if ( $contato == null )
        {
            session()->flash('error', "Informações não encontradas, entre em contato com o administrador do site!");
            return redirect()->back();
        }

        return view('admin.sobre.contato')->with('contato', $contato);
    }


    public function sobre_quem_somos_atualizar(EditSobreRequest $request)
    {
        $quemSomos = SobreNos::all()->where('pagina','quemSomos')->first();

        $quemSomos->update([
            'titulo' => $request->Titulo
            ,'texto' => $request->Texto
        ]);

        session()->flash('success', 'Página de Quem Somos atualizada com sucesso!');
        return redirect(route('sobre-index'));
    }

    public function sobre_contato_atualizar(EditSobreRequest $request)
    {
        $contato = SobreNos::all()->where('pagina','contato')->first();

        $contato->update([
            'titulo' => $request->Titulo
            ,'texto' => $request->Texto
        ]);

        session()->flash('success', 'Página de Contato atualizada com sucesso!');
        return redirect(route('sobre-index'));
    }
}
