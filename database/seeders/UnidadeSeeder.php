<?php

namespace Database\Seeders;

use App\Models\Unidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unidades = [
            [
                "id" => 1,
                "nome" => "Porto Alegre",
                "diretoria" => 1,
                "latitude" => -30.0487500575419,
                "longitude" => -51.2285874229908
            ],
            [
                "id" => 2,
                "nome" => "Florianopolis",
                "diretoria" => 1,
                "latitude" => -27.5539352501739,
                "longitude" => -48.4984151588502
            ],

            [
                "id" => 3,
                "nome" => "Curitiba",
                "diretoria" => 1,
                "latitude" => -25.4737044657317,
                "longitude" => -49.2478719899287
            ],

            [
                "id" => 4,
                "nome" => "Sao Paulo",
                "diretoria" => 2,
                "latitude" => -23.5442594376128,
                "longitude" => -46.6437071402913
            ],

            [
                "id" => 5,
                "nome" => "Rio de Janeiro",
                "diretoria" => 2,
                "latitude" => -22.9234475106048,
                "longitude" => -43.2320849543885
            ],

            [
                "id" => 6,
                "nome" => "Belo Horizonte",
                "diretoria" => 2,
                "latitude" => -19.9178548297163,
                "longitude" => -43.9408938595476
            ],

            [
                "id" => 7,
                "nome" => "Vitória",
                "diretoria" => 2,
                "latitude" => -20.3409924207722,
                "longitude" => -40.3833227147509
            ],

            [
                "id" => 8,
                "nome" => "Campo Grande",
                "diretoria" => 3,
                "latitude" => -20.4626520063003,
                "longitude" => -54.6156589376666
            ],

            [
                "id" => 9,
                "nome" => "Goiania",
                "diretoria" => 3,
                "latitude" => -16.6731262408143,
                "longitude" => -49.252488263542
            ],

            [
                "id" => 10,
                "nome" => "Cuiaba",
                "diretoria" => 3,
                "latitude" => -15.6017544583208,
                "longitude" => -56.0983270655808
            ]
        ];

        Unidade::insert($unidades);
    }
}
