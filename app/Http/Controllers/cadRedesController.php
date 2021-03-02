<?php

namespace App\Http\Controllers;

use App\Models\membro;
use App\Models\rede;
use App\Models\usuario;
use Illuminate\Http\Request;

class cadRedesController extends Controller
{
    public function index(){
        $tabela = rede::orderby('id', 'desc')->paginate();
        return view('painel-admin.redes.index', ['itens'=> $tabela]);
    }

    public function create(){
        $tbmembros = membro::select('mem_nome', 'id')->get();
        return view('painel-admin.redes.create', compact('tbmembros'));
    }

    public function insert(Request $request){

        $tabela = new rede();
        $tabela->nome = $request->nome;
        $tabela->id_coordenador = $request->coordenador;
        $tabela->dtcadastro = $request->dtcadastro;
        $tabela->telefone = $request->fone;
        $tabela->celular = $request->celular;

        $itens = rede::where('nome', '=', $request->nome)->count();
        if($itens > 0){
            echo "<script language='javascript'> window.alert('Rede já cadastrado!')</script>";
            return view('painel-admin.redes.create');
        }
        $tabela->save();
        return redirect()->route('redes.index');
    }

    public function edit(rede $item){

        return view('painel-admin.redes.edit', ['item' => $item]);

     }

    public function editar(Request $request, rede $item){

        $item->nome = $request->nome;
        $item->id_coordenador = $request->coordenador;
        $item->dtcadastro = $request->dtcadastro;
        $item->telefone = $request->fone;
        $item->celular = $request->celular;


        $oldnome = $request->oldnome;


        if($oldnome != $request-> nome){

            $itens = rede::where('nome', '=', $request->nome)->count();
            if($itens > 0){
                echo "<script language='javascript'> window.alert('Rede já cadastrada!')</script>";
                return view('painel-admin.redes.edit', ['item' => $item]);
            }

        }



        $item->save();
        return redirect()->route('redes.index');
    }

    public function delete(rede $item){
        $item->delete();
        return redirect()->route('redes.index');
     }

     public function modal($id){
        $item = rede::orderby('id', 'desc')->paginate();
        return view('painel-admin.redes.index', ['itens' => $item, 'id' => $id]);

     }
}
