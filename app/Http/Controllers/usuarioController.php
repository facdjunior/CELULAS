<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;

class usuarioController extends Controller
{
    public function login(Request $request){

        $usuario = $request->usuario;
        $senha = $request->senha;

        $usuarios = usuario::where('usu_usuario', '=', $usuario)->where('usu_senha', '=', $senha )->first();

        if(@$usuarios->id != null){
            @session_start();
            $_SESSION['id_usuario'] = $usuarios->id;
            $_SESSION['nome_usuario'] = $usuarios->usu_nome;
            $_SESSION['nivel_usuario'] = $usuarios->usu_nivel;
            $_SESSION['igreja'] = $usuarios->id_igreja;
            $_SESSION['cpf_usuario'] = $usuarios->usu_cpf;
            $_SESSION['id_membro'] = $usuarios->id_membro;


            if($_SESSION['nivel_usuario'] == 'supadmin'){
                return view('painel-admin.index');
            }

            if($_SESSION['nivel_usuario'] == 'admin'){
                return view('painel-admin.index');
            }

            if($_SESSION['nivel_usuario'] == 'lider'){
                return view('painel-admin.index');
            }

            if($_SESSION['nivel_usuario'] == 'diaconato'){
                return view('painel-diaconato.index');
            }

        }else{
            echo "<script language='javascript'> window.alert('Usuário ou Senha incorretos') </script>";
            return view('index');
        }
    }

    public function logout(){
        @session_start();
        @session_destroy();
        return view('index');
    }

    public function index(){
        $tabela = usuario::orderby('id', 'desc')->paginate();
        return view('painel-admin.usuarios.index', ['itens' => $tabela]);
    }


    public function delete(usuario $item){
        $item->delete();
        return redirect()->route('usuarios.index');
     }

     public function modal($id){
        $item = usuario::orderby('id', 'desc')->paginate();
        return view('painel-admin.usuarios.index', ['itens' => $item, 'id' => $id]);

     }


}
