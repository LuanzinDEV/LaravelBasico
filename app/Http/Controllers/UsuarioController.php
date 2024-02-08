<?php

namespace App\Http\Controllers;

use App\Models\UsuarioModel;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function cadastrar(){
        return view('usuario.cadastro');
    }

    public function salvar(Request $request){

        $request->validate([
            "nome" => "required",
            "email" => "required|email",
            "senha" => "min:5"
        ]);

        $usuarioModel = new UsuarioModel();
        
        if($usuarioModel::cadastrar($request)){             
            return view('usuario.sucesso', [
                "nome" => $request->input('nome')
            ]);
        }else{
            echo "Erro ao cadastrar";
        }
    }
}
