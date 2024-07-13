<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    /**
     * Calcula a distancia entre as coordenadas passadas e as unidades cadastradas através da função de Haversine.
     * @param latitude, longitude
     * @return Unidade unidade
     */
    public static function distanciaUnidades($latitude, $longitude)
    {
        $raio = 2000; // 2000 km

        $unidadeProxima = Unidade::selectRaw("
            id,
            nome,
            (6371 * acos(cos(radians($latitude))
            * cos(radians(latitude))
            * cos(radians(longitude) - radians($longitude))
            + sin(radians($latitude))
            * sin(radians(latitude))) ) AS distancia
        ")->having('distancia', '<', $raio)
            ->orderBy('distancia')
            ->first();

        return $unidadeProxima;
    }
}
