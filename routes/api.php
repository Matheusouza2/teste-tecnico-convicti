<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\VendasController;
use App\Http\Middleware\ValidaVendedor;
use Illuminate\Support\Facades\Route;

/**
 * Responsável pela autenticação do usuário.
 * @param [email, senha]
 * @return [usuario, token, mensagem]
 */
Route::post('auth', [UserController::class, 'auth']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::get('logout', [UserController::class, 'logout']);

    Route::get('inicio', [UserController::class, 'telaInicial']);

    Route::prefix('venda')->group(function () {
        /**
         * Salva as vendas realizadas.
         * @param [valor, latitude, longitude]
         * @return Response
         */
        Route::post('salvar', [VendasController::class, 'salvar'])->middleware(ValidaVendedor::class);

        /**
         * Lista as vendas realizadas.
         * @param [periodo_inicial, periodo_final]
         * @return Vendas
         */
        Route::get('listar', [VendasController::class, 'listar']);

        /**
         * Detalhes da venda.
         * @param venda_id
         * @return Venda
         */
        Route::get('detalhes/{venda}', [VendasController::class, 'detalhes']);
    });
});
