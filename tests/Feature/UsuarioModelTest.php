<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\UsuarioModel;
use Illuminate\Http\Request;

class UsuarioModelTest extends TestCase
{
    use DatabaseTransactions;

    public function testCadastrar()
    {
        // Criar uma instância de Request com dados simulados
        $request = new Request([
            'nome' => 'NovoTeste',
            'email' => 'novoteste@example.com',
        ]);

        // Chamar o método cadastrar
        $insercao = UsuarioModel::cadastrar($request);

        // Assert para verificar se a inserção foi bem-sucedida
        $this->assertTrue($insercao);

        // Verificar se o novo registro está na tabela
        $this->assertDatabaseHas('usuarios', ['nome' => 'NovoTeste']);
    }
}
