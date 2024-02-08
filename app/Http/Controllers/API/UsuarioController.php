<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UsuarioModel;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function salvar(Request $request){
        if(UsuarioModel::cadastrar($request)){
            return response("ok", 201);
        }else{
            return response("Error", 409);
        }
    }
}
