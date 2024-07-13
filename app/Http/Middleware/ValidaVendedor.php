<?php

namespace App\Http\Middleware;

use App\Enums\FuncoesEnum;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidaVendedor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()->funcao != FuncoesEnum::VENDEDOR)
            return response()->json(['mensagem' => 'Usuário não autorizado !'], 401);

        return $next($request);
    }
}
