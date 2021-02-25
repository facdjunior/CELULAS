<?php

namespace App\Http\Controllers;

use App\Models\reunioes;
use Illuminate\Http\Request;

class cadReuniaoController extends Controller
{
    public function index(){
        $tabela = reunioes::orderby('id', 'desc')->paginate();
        return view('painel-admin.reunioes.index', ['itens'=> $tabela]);
    }

    public function create(){
        return view('painel-admin.reunioes.create');
    }

    public function insert(Request $request){

        $tabela = new reunioes();
        $tabela->id_celula = $request->celula;
        $tabela->oferta = $request->oferta;
        $tabela->qtdmembro = $request->qtdmembro;
        $tabela->qtdvisitante = $request->qtdvisitante;
        $tabela->qtdtotal = $request->totaldia;
        $tabela->datareuniao = $request->datareuniao;

        $itens = reunioes::where('datareuniao', '=', $request->datareuniao)->where('id_celula', '=', $request->celula)->count();
        if($itens > 0){
            echo "<script language='javascript'> window.alert('Reunião ja cadastrado para esta data!')</script>";
            return view('painel-admin.reunioes.create');
        }
        $tabela->save();
        return redirect()->route('reunioes.index');
    }

    public function edit(reunioes $item){

        return view('painel-admin.reunioes.edit', ['item' => $item]);

     }

    public function editar(Request $request, reunioes $item){


        $item->id_celula = $request->celula;
        $item->oferta = $request->oferta;
        $item->qtdmembro = $request->qtdmembro;
        $item->qtdvisitante = $request->qtdvisitante;
        $item->qtdtotal = $request->totaldia;
        $item->datareuniao = $request->datareuniao;


        $oldnome = $request->oldnome;


        if($oldnome != $request-> nome){

            $itens = reunioes::where('datareuniao', '=', $request->datareuniao)->orwhere('id_celula', '=', $request->celula)->first();
            if($itens > 0){
                echo "<script language='javascript'> window.alert('Rede já cadastrada!')</script>";
                return view('painel-admin.reunioes.edit', ['item' => $item]);
            }

        }



        $item->save();
        return redirect()->route('reunioes.index');
    }

    public function delete(reunioes $item){
        $item->delete();
        return redirect()->route('reunioes.index');
     }

     public function modal($id){
        $item = reunioes::orderby('id', 'desc')->paginate();
        return view('painel-admin.reunioes.index', ['itens' => $item, 'id' => $id]);

     }
}
