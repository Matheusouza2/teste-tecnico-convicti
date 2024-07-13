<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendasSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendas = [
            [
                "data_hora" => "2024-07-12T10:30:00",
                "vendedor" => 15,
                "valor" => 1500.75,
                "latitude" => -23.55052,
                "longitude" => -46.63331,
                "unidade_venda" => 4,
                "unidade_proxima" => 6
            ],
            [
                "data_hora" => "2024-07-12T11:00:00",
                "vendedor" => 19,
                "valor" => 2300.50,
                "latitude" => -22.90685,
                "longitude" => -43.17290,
                "unidade_venda" => 6,
                "unidade_proxima" => 8
            ],
            [
                "data_hora" => "2024-07-12T11:30:00",
                "vendedor" => 20,
                "valor" => 1750.00,
                "latitude" => -19.91668,
                "longitude" => -43.93449,
                "unidade_venda" => 8,
                "unidade_proxima" => null
            ],
            [
                "data_hora" => "2024-07-12T12:00:00",
                "vendedor" => 56,
                "valor" => 1950.25,
                "latitude" => -15.78014,
                "longitude" => -47.92917,
                "unidade_venda" => 4,
                "unidade_proxima" => null
            ],
            [
                "data_hora" => "2024-07-12T12:30:00",
                "vendedor" => 19,
                "valor" => 2100.80,
                "latitude" => -3.71722,
                "longitude" => -38.54340,
                "unidade_venda" => 6,
                "unidade_proxima" => null
            ]
        ];
    }
}
