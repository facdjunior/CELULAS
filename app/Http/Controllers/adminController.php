<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        return view('painel-admin.index');
    }

    public function editar(Request $request, usuario $usuario){

        $usuario->usu_nome = $request->nome;
        $usuario->usu_cpf = $request->cpf;
        $usuario->usu_usuario = $request->email;
        $usuario->usu_senha = $request->senha;
        $usuario->save();
        return redirect()->route('admin.index');
    }
}
