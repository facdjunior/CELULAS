<?php


namespace App\Http\Controllers;

use App\Models\visitante;
use App\Models\usuario;
use Illuminate\Http\Request;

class cadVisitantesController extends Controller
{
    public function index(){
        $tabela = visitante::orderby('id', 'desc')->paginate();
        return view('painel-admin.visitantes.index', ['itens'=> $tabela]);
    }

    public function create(){
        return view('painel-admin.visitantes.create');
    }

    public function insert(Request $request){

        $tabela = new visitante();
        $tabela->vis_nome = $request->nome;
        $tabela->vis_datanascimento = $request->dtnasc;
        $tabela->vis_datavisita = $request->dtvisita;

        $tabela->vis_estadocivil = $request->estadocivil;
        $tabela->vis_endereco = $request->rua;
        $tabela->vis_numero = $request->numero;
        $tabela->vis_bairro = $request->bairro;
        $tabela->vis_cidade = $request->cidade;
        $tabela->vis_uf = $request->estado;
        $tabela->vis_cep = $request->cep;
        $tabela->vis_celular = $request->celular;
        $tabela->vis_fone = $request->fone;
        $tabela->vis_complemento = $request->complemento;
        $tabela->vis_sexo = $request->sexo;

        $itens = visitante::where('vis_nome', '=', $request->nome)->count();
        if($itens > 0){
            echo "<script language='javascript'> window.alert('Visitante já cadastrado!')</script>";
            return view('painel-admin.visitantes.create');
        }
        $tabela->save();
        return redirect()->route('visitantes.index');
    }

    public function edit(visitante $item){
        return view('painel-admin.visitantes.edit', ['item' => $item]);
     }

    public function editar(Request $request, visitante $item){

        $item->vis_nome = $request->nome;
        $item->vis_datanascimento = $request->dtnasc;
        $item->vis_datavisita = $request->dtvisita;
        $item->vis_estadocivil = $request->estadocivil;
        $item->vis_endereco = $request->rua;
        $item->vis_numero = $request->numero;
        $item->vis_bairro = $request->bairro;
        $item->vis_cidade = $request->cidade;
        $item->vis_uf = $request->estado;
        $item->vis_cep = $request->cep;
        $item->vis_celular = $request->celular;
        $item->vis_fone = $request->fone;
        $item->vis_complemento = $request->complemento;
        $item->vis_sexo = $request->sexo;

        $oldnome = $request->oldnome;


        if($oldnome != $request-> nome){

            $itens = visitante::where('vis_nome', '=', $request->nome)->count();
            if($itens > 0){
                echo "<script language='javascript'> window.alert('Nome já cadastrado!')</script>";
                return view('painel-admin.visitantes.edit', ['item' => $item]);
            }

        }



        $item->save();
        return redirect()->route('visitantes.index');
    }

    public function delete(visitante $item){
        $item->delete();
        return redirect()->route('visitantes.index');
     }

     public function modal($id){
        $item = visitante::orderby('id', 'desc')->paginate();
        return view('painel-admin.visitante.index', ['itens' => $item, 'id' => $id]);

     }
}
