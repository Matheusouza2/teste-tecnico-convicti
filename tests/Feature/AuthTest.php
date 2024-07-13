<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * Test authentication of the user
     */
    public function test_auth(): void
    {

        //Testa o login com a senha errada
        $response = $this->postJson('/api/v1/auth', [
            'email' => 'pele@magazineaziul.com.br',
            'senha' => '123mudaa'
        ]);

        $response->assertStatus(401);

        //Testa o login com o email errado
        $response = $this->postJson('/api/v1/auth', [
            'email' => 'pile@magazineaziul.com.br',
            'senha' => '123mudar'
        ]);

        $response->assertStatus(401);

        //Testa o login com sucesso
        $response = $this->postJson('/api/v1/auth', [
            'email' => 'pele@magazineaziul.com.br',
            'senha' => '123mudar'
        ]);



        $response->assertStatus(200);
    }
}
