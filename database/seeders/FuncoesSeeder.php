<?php

namespace Database\Seeders;

use App\Models\Funcao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FuncoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $funcoes = [
            ['descricao' => 'Diretor Nacional'],
            ['descricao' => 'Diretor'],
            ['descricao' => 'Gerente'],
            ['descricao' => 'Vendedor'],
        ];

        Funcao::insert($funcoes);
    }
}
