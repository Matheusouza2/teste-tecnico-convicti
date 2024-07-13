<?php

namespace App\Http\Controllers;

use App\Enums\FuncoesEnum;
use App\Models\Diretoria;
use App\Models\Unidade;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VendasController extends Controller
{
    /**
     * Salva as vendas realizadas.
     * @param Request [valor, latitude, longitude, data_hora]
     * @return Response
     */
    public function salvar(Request $request)
    {
        $request->validate([
            'valor' => 'required|numeric',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'data_hora' => 'required|date'
        ]);

        $request->merge(['vendedor' => Auth::user()->id]); //Atribui o id do vendedor que fez a requisição para o sistema;
        $request->merge(['unidade_venda' => Auth::user()->unidade]); //Atribui a unidade do vendedor que fez a requisição para o sistema;

        $unidadeProxima = UnidadeController::distanciaUnidades($request->latitude, $request->longitude);
        $unidadeProxima = $unidadeProxima?->id == Auth::user()->unidade ? null : $unidadeProxima;

        $request->merge(['unidade_proxima' => $unidadeProxima?->id]); //Atribui a unidade mais próxima da venda;

        $venda = Venda::create($request->all());

        return response()->json($venda, 201);
    }

    /**
     * Lista as vendas realizadas.
     * @param Request
     * @return Vendas
     */
    public function listar(Request $request)
    {
        $request->validate([
            'periodo_inicial' => 'required|date',
            'periodo_final' => 'required|date',
        ], [
            'periodo_inicial.required' => 'O campo período inicial é obrigatório.',
            'periodo_final.required' => 'O campo período final é obrigatório.',
            'periodo_inicial.date' => 'O campo período inicial deve ser uma data válida.',
            'periodo_final.date' => 'O campo período final deve ser uma data válida.',
        ]);

        switch (Auth::user()->funcao) {
            case FuncoesEnum::VENDEDOR:
                $vendas = self::listarVendasVendedor($request);
                break;
            case FuncoesEnum::GERENTE:
                $vendas = self::listarVendasUnidade($request);
                break;
            case FuncoesEnum::DIRETOR:
                $vendas = self::listarVendasDiretoria($request);
                break;
            case FuncoesEnum::DIRETOR_NACIONAL:
                $vendas = self::listarVendasNacional($request);
                break;
            default:
                $vendas = [];
                break;
        }

        return response()->json($vendas, 200);
    }

    /**
     * Lista as vendas realizadas pelo vendedor.
     */
    private function listarVendasVendedor(Request $request)
    {
        $vendas = Venda::select([
            'vendas.id',
            'data_hora',
            'valor',
            DB::raw('users.nome as vendedor'),
            DB::raw('unidades.nome as unidade'),
            DB::raw('diretorias.nome as diretoria'),
            DB::raw('IF(unidade_proxima IS NOT NULL, TRUE, FALSE) as roaming'),
        ])
            ->join('users', 'users.id', 'vendedor')
            ->join('unidades', 'unidades.id', 'unidade_venda')
            ->join('diretorias', 'diretorias.id', 'unidades.diretoria')
            ->where('vendedor', Auth::user()->id)
            ->whereBetween('vendas.data_hora', ["$request->periodo_inicial 00:00:00", "$request->periodo_final 23:59:59"])
            ->orderBy('data_hora')
            ->get();

        return $vendas;
    }

    /**
     * Lista as vendas realizadas pela unidade.
     */
    private function listarVendasUnidade(Request $request)
    {

        $vendas = Venda::select([
            'vendas.id',
            'data_hora',
            'valor',
            DB::raw('users.nome as vendedor'),
            DB::raw('unidades.nome as unidade'),
            DB::raw('diretorias.nome as diretoria'),
            DB::raw('IF(unidade_proxima IS NOT NULL, TRUE, FALSE) as roaming'),
        ])
            ->join('users', 'users.id', 'vendedor')
            ->join('unidades', 'unidades.id', 'unidade_venda')
            ->join('diretorias', 'diretorias.id', 'unidades.diretoria')
            ->where(function ($query) use ($request) {
                if ($request->vendedor) {
                    $query->where('vendedor', $request->vendedor);
                }
            })
            ->where('unidade_venda', Auth::user()->unidade)
            ->whereBetween('vendas.data_hora', ["$request->periodo_inicial 00:00:00", "$request->periodo_final 23:59:59"])
            ->orderBy('vendas.data_hora')
            ->get();

        return $vendas;
    }

    /**
     * Lista as vendas realizadas pelas unidades pertencentes a diretoria.
     */
    private function listarVendasDiretoria(Request $request)
    {
        $diretoria = Diretoria::where('diretor', Auth::user()->id)->first();

        $vendas = Venda::select([
            'vendas.id',
            'data_hora',
            'valor',
            DB::raw('users.nome as vendedor'),
            DB::raw('unidades.nome as unidade'),
            DB::raw('diretorias.nome as diretoria'),
            DB::raw('IF(unidade_proxima IS NOT NULL, TRUE, FALSE) as roaming'),
        ])
            ->join('users', 'users.id', 'vendedor')
            ->join('unidades', 'unidades.id', 'unidade_venda')
            ->join('diretorias', 'diretorias.id', 'unidades.diretoria')
            ->where(function ($query) use ($request) {
                if ($request->unidade) {
                    $query->where('unidade_venda', $request->unidade);
                }
            })
            ->where(function ($query) use ($request) {
                if ($request->vendedor) {
                    $query->where('vendedor', $request->vendedor);
                }
            })
            ->where('unidades.diretoria', $diretoria->id)
            ->whereBetween('vendas.data_hora', ["$request->periodo_inicial 00:00:00", "$request->periodo_final 23:59:59"])
            ->orderBy('vendas.data_hora')
            ->get();


        return $vendas;
    }

    /**
     * Lista todas as vendas do sistema
     */
    private function listarVendasNacional(Request $request)
    {
        $vendas = Venda::select([
            'vendas.id',
            'vendas.data_hora',
            'valor',
            DB::raw('users.nome as vendedor'),
            DB::raw('unidades.nome as unidade'),
            DB::raw('diretorias.nome as diretoria'),
            DB::raw('IF(unidade_proxima IS NOT NULL, TRUE, FALSE) as roaming'),
        ])
            ->join('users', 'users.id', 'vendedor')
            ->join('unidades', 'unidades.id', 'unidade_venda')
            ->join('diretorias', 'diretorias.id', 'unidades.diretoria')
            ->where(function ($query) use ($request) {
                if ($request->diretoria) {
                    $query->where('diretorias.id', $request->diretoria);
                }
            })
            ->where(function ($query) use ($request) {
                if ($request->unidade) {
                    $query->where('unidade_venda', $request->unidade);
                }
            })
            ->where(function ($query) use ($request) {
                if ($request->vendedor) {
                    $query->where('vendedor', $request->vendedor);
                }
            })
            ->whereBetween('vendas.data_hora', ["$request->periodo_inicial 00:00:00", "$request->periodo_final 23:59:59"])
            ->orderBy('vendas.data_hora')
            ->get();


        return $vendas;
    }

    /**
     * Detalhes da venda.
     * @param venda_id
     * @return Venda
     */
    public function detalhes($venda)
    {
        $vendaRetorno = Venda::select([
            'data_hora',
            'valor',
            'vendas.latitude',
            'vendas.longitude',
            DB::raw('users.nome as vendedor'),
            DB::raw('unidades.nome as unidade_venda'),
            DB::raw('IF(unidade_proxima IS NOT NULL, TRUE, FALSE) as roaming'),
            DB::raw('unidades_proximas.nome as unidade_proxima'),
        ])
            ->join('users', 'users.id', 'vendedor')
            ->join('unidades', 'unidades.id', 'unidade_venda')
            ->leftJoin('unidades as unidades_proximas', 'unidades_proximas.id', 'unidade_proxima')
            ->where('vendas.id', $venda)
            ->first();


        return response()->json($vendaRetorno, 200);
    }
}
