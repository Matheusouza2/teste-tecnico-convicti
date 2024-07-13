<?php

namespace Database\Seeders;

use App\Models\Diretoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiretoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $diretorias = [
            [
                'id' => 1,
                'nome' => 'Sul',
            ],
            [
                'id' => 2,
                'nome' => 'Sudeste',
            ],
            [
                'id' => 3,
                'nome' => 'Centro-oeste',
            ],
        ];

        Diretoria::insert($diretorias);
    }
}
