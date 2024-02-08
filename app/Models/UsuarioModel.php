<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class UsuarioModel extends Model
{
    protected $connection = 'mysql';
    protected $table = 'usuarios';

    public static function listar(int $limite)
    {
        $query = self::select([
            "id",
            "nome",
            "email",
            "senha",
            "data_cadastro"
        ])
            ->limit($limite)
            ->get();
        
            return $query;
    }

    public static function cadastrar(Request $request)
    {
        return self::insert([
            "nome" => $request->input('nome'),
            "email" => $request->input('email'),
            "senha" => Hash::make($request->input('senha')),
            "data_cadastro" => now()
        ]);
    }
}
