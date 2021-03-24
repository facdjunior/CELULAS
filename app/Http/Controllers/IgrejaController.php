<?php

namespace App\Http\Controllers;

use App\Models\igreja;
use Illuminate\Http\Request;

class IgrejaController extends Controller
{
    public function index(){
        $tabela = igreja::orderby('id', 'desc')->paginate();
        return view('painel-admin.igrejas.index', ['itens'=> $tabela]);
    }

    public function create(){
        return view('painel-admin.igrejas.create');
    }

    public function insert(Request $request){

        $tabela = new igreja();
        $tabela->igre_nome = $request->nome;
        $tabela->igre_datafundacao = $request->dtfudacao;
        $tabela->igre_endereco = $request->rua;
        $tabela->igre_numero = $request->numero;
        $tabela->igre_bairro = $request->bairro;
        $tabela->igre_cidade = $request->cidade;
        $tabela->igre_uf = $request->estado;
        $tabela->igre_cep = $request->cep;



        $itens = igreja::where('igre_nome', '=', $request->nome)->count();
        if($itens > 0){
            echo "<script language='javascript'> window.alert('Igreja já cadastrada!')</script>";
            return view('painel-admin.igrejas.create');
        }
        $tabela->save();
        return redirect()->route('igrejas.index');
    }

    public function edit(igreja $item){
        return view('painel-admin.igrejas.edit', ['item' => $item]);
     }
}
