<?php

namespace Tests\Feature;

use Tests\TestCase;

class SalvarVendaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login_venda(): void
    {
        //Faz o login para pegar o token do usuário
        $response = $this->postJson('/api/v1/auth', [
            'email' => 'afonso.afancar@magazineaziul.com.br',
            'senha' => '123mudar'
        ]);

        $response->assertStatus(200);

        //Faz o lançamento de uma venda próximo a unidade do vendedor
        $response = $this->post('/api/v1/venda/salvar', [
            'valor' => 100.00,
            'latitude' => -19.8555410203833,
            'longitude' => -43.18155549998093,
        ], [
            'Authorization' => 'Bearer ' . $response->json('token')
        ]);

        $response->assertStatus(201);

        //Faz o lançamento de uma venda próximo a outra unidade.
        $response = $this->post('/api/v1/venda/salvar', [
            'valor' => 350.00,
            'latitude' => -20.348411807953006,
            'longitude' => -41.13683728500917,
        ], [
            'Authorization' => 'Bearer ' . $response->json('token')
        ]);

        $response->assertStatus(201);
    }
}
