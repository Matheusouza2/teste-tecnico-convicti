<?php

namespace App\Http\Controllers;

use App\Enums\FuncoesEnum;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Break_;

class UserController extends Controller
{
    /**
     * Realiza a autenticação do usuário
     * @param Request [email, senha]
     * @return Response
     */
    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);


        $user = null;
        $token = null;
        $message = 'Usuário não autenticado !';

        if (Auth::attempt(['email' => $request->email, 'password' => $request->senha])) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;
            $message = 'Usuário autenticado com sucesso !';
        }

        return response()->json([
            'usuario' => $user,
            'token' => $token,
            'mensagem' => $message,
        ], $user ? 200 : 401);
    }

    /**
     * Realiza o logout do usuário
     * @param Request
     * @return Response
     */
    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return response()->json(['mensagem' => 'Usuário deslogado com sucesso !']);
    }

    /**
     * Tela inicial do usuário
     * @return Response
     */
    public function telaInicial()
    {
        $montanteVendas = Venda::select(DB::raw('SUM(valor) as total'), 'latitude', 'longitude')
            ->groupBy('unidade_venda')
            ->get();

        return response()->json($montanteVendas, 200);
    }
}
