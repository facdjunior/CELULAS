<?php

namespace App\Http\Controllers;

use App\Models\celula;
use Illuminate\Http\Request;

class cadCelulasController extends Controller
{
    public function index(){
        $tabela = celula::orderby('id', 'desc')->paginate();
        return view('painel-admin.celulas.index', ['itens'=> $tabela]);
    }

    public function create(){
        return view('painel-admin.celulas.create');
    }

    public function insert(Request $request){

        $tabela = new celula();
        $tabela->nome = $request->nome;
        $tabela->id_rede = $request->rede;
        $tabela->id_lider = $request->lider;
        $tabela->id_vicelider = $request->vicelider;
        $tabela->cep = $request->cep;
        $tabela->endereco = $request->rua;
        $tabela->numero = $request->numero;
        $tabela->bairro = $request->bairro;
        $tabela->cidade = $request->cidade;
        $tabela->uf = $request->estado;
        $tabela->frequencia = $request->frequencia;
        $tabela->diasemana = $request->diasemana;
        $tabela->horario = $request->horario;
        $tabela->idsupervisor = $request->supervisor;


        $itens = celula::where('nome', '=', $request->nome)->count();
        if($itens > 0){
            echo "<script language='javascript'> window.alert('Já Célula cadastrada com este nome!')</script>";
            return view('painel-admin.celulas.create');
        }
        $tabela->save();
        return redirect()->route('celulas.index');
    }

    public function edit(celula $item){
        return view('painel-admin.celulas.edit', ['item' => $item]);
    }

    public function editar(Request $request, celula $item){


        $item->nome = $request->nome;
        $item->id_rede = $request->rede;
        $item->id_lider = $request->lider;
        $item->id_vicelider = $request->vicelider;
        $item->cep = $request->cep;
        $item->endereco = $request->rua;
        $item->numero = $request->numero;
        $item->bairro = $request->bairro;
        $item->cidade = $request->cidade;
        $item->uf = $request->estado;
        $item->frequencia = $request->frequencia;
        $item->diasemana = $request->diasemana;
        $item->horario = $request->horario;
        $item->idsupervisor = $request->supervisor;

        $oldnome = $request->oldnome;


        if($oldnome != $request-> nome){

            $itens = celula::where('nome', '=', $request->nome)->count();
            if($itens > 0){
                echo "<script language='javascript'> window.alert('Célula já cadastrado!')</script>";
                return view('painel-admin.celulas.edit', ['item' => $item]);
            }

        }



        $item->save();
        return redirect()->route('celulas.index');
    }

    public function delete(celula $item){
        $item->delete();
        return redirect()->route('celulas.index');
    }

    public function modal($id){
        $item = celula::orderby('id', 'desc')->paginate();
        return view('painel-admin.celulas.index', ['itens' => $item, 'id' => $id]);

    }
}
