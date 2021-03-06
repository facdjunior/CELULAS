<?php

namespace App\Http\Controllers;

use App\Models\membro;
use App\Models\usuario;
use Illuminate\Http\Request;

class cadMembrosController extends Controller
{
    public function index(){

        $tabela = membro::orderby('id', 'desc')->paginate();
        return view('painel-admin.membros.index', ['itens'=> $tabela]);
    }

    public function create(){
        return view('painel-admin.membros.create');
    }

    public function insert(Request $request){

        $tabela = new membro();
        $tabela->mem_nome = $request->nome;
        $tabela->mem_cpf = $request->cpf;
        $tabela->email = $request->email;
        $tabela->mem_datanascimento = $request->dtnasc;
        $tabela->mem_estadocivil = $request->estadocivil;
        $tabela->mem_endereco = $request->rua;
        $tabela->mem_numero = $request->numero;
        $tabela->mem_bairro = $request->bairro;
        $tabela->mem_cidade = $request->cidade;
        $tabela->mem_uf = $request->estado;
        $tabela->mem_cep = $request->cep;
        $tabela->mem_celular = $request->celular;
        $tabela->mem_fone = $request->fone;
        $tabela->mem_complemento = $request->complemento;
        $tabela->sexo = $request->sexo;

        $itens = membro::where('mem_cpf', '=', $request->cpf)->orwhere('email', '=', '$email')->count();
        if($itens > 0){
            echo "<script language='javascript'> window.alert('Membro já cadastrado com este Email ou CPF!')</script>";
            return view('painel-admin.membros.create');
        }
        $tabela->save();
        return redirect()->route('membros.index');
    }

    public function edit(membro $item){
        return view('painel-admin.membros.edit', ['item' => $item]);
     }

    public function editar(Request $request, membro $item){

        $item->mem_nome = $request->nome;
        $item->mem_cpf = $request->cpf;
        $item->email = $request->email;
        $item->mem_datanascimento = $request->dtnasc;
        $item->mem_estadocivil = $request->estadocivil;
        $item->mem_endereco = $request->rua;
        $item->mem_numero = $request->numero;
        $item->mem_bairro = $request->bairro;
        $item->mem_cidade = $request->cidade;
        $item->mem_uf = $request->estado;
        $item->mem_cep = $request->cep;
        $item->mem_celular = $request->celular;
        $item->mem_fone = $request->fone;
        $item->mem_complemento = $request->complemento;
        $item->sexo = $request->sexo;

        $oldcpf = $request->oldcpf;
        $oldemail = $request->oldemail;

        if($oldcpf != $request-> cpf){

            $itens = membro::where('mem_cpf', '=', $request->cpf)->count();
            if($itens > 0){
                echo "<script language='javascript'> window.alert('CPF já cadastrado!')</script>";
                return view('painel-admin.membros.edit', ['item' => $item]);
            }

        }

        if($oldemail != $request-> email){

            $itens = membro::where('email', '=', $request->email)->count();
            if($itens > 0){
                echo "<script language='javascript'> window.alert('Email já cadastrado!')</script>";
                return view('painel-admin.membros.edit', ['item' => $item]);
            }

        }



        $item->save();
        return redirect()->route('membros.index');
    }

    public function delete(membro $item){
        $item->delete();
        return redirect()->route('membros.index');
     }

     public function modal($id){
        $item = membro::orderby('id', 'desc')->paginate();
        return view('painel-admin.membros.index', ['itens' => $item, 'id' => $id]);

     }
}
