<?php

namespace App\Http\Controllers;

use App\Models\reunioes;
use Illuminate\Http\Request;

class cadReuniaoController extends Controller
{
    public function index(){

session_start();
$r=@$_SESSION['id_membro'];
$i=@$_SESSION['igreja'];
$n=@$_SESSION['nivel_usuario'];


switch ($n) {
    case "admin":
        $tabela = reunioes::where('id_igreja', '=', $i)->paginate();
        return view('painel-admin.reunioes.index', ['itens'=> $tabela]);
        break;
    case "lider":
        $tabela = reunioes::join('celulas', 'reunioes.id_celula', '=', 'celulas.id')->where('celulas.id_lider', $r)->where('celulas.id_igreja', $i)->get();
        return view('painel-admin.reunioes.index', ['itens'=> $tabela]);
        break;
    case "supadmin":
        $tabela = reunioes::orderby('id', 'desc')->paginate();
        return view('painel-admin.reunioes.index', ['itens'=> $tabela]);
        break;
}

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
        $tabela->id_igreja = $request->igreja;

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
