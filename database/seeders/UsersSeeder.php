<?php

namespace Database\Seeders;

use App\Enums\FuncoesEnum;
use App\Models\Diretoria;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $senhaDefault = Hash::make('123mudar');

        $users = [
            //Diretor nacional
            [
                'id' => 1,
                'nome' => 'Edson A. do Nascimento',
                'unidade' => null,
                'email' => 'pele@magazineaziul.com.br',
                'funcao' => FuncoesEnum::DIRETOR_NACIONAL,
                'senha' => $senhaDefault,
            ],
            // Diretores
            [
                'id' => 2,
                'nome' => 'Vagner Mancini',
                'unidade' => null,
                'email' => 'vagner.mancini@magazineaziul.com.br',
                'funcao' => FuncoesEnum::DIRETOR,
                'senha' => $senhaDefault,
            ],
            [
                'id' => 3,
                'nome' => 'Abel Ferreira',
                'unidade' => null,
                'email' => 'abel.ferreira@magazineaziul.com.br',
                'funcao' => FuncoesEnum::DIRETOR,
                'senha' => $senhaDefault,
            ],
            [
                'id' => 4,
                'nome' => 'Rogerio Ceni',
                'unidade' => null,
                'email' => 'rogerio.ceni@magazineaziul.com.br',
                'funcao' => FuncoesEnum::DIRETOR,
                'senha' => $senhaDefault,
            ],
            //  Gerentes
            [
                'id' => 5,
                'nome' => "Ronaldinho Gaucho",
                'unidade' => 1,
                'email' => "ronaldinho.gaucho@magazineaziul.com.br",
                'funcao' => FuncoesEnum::GERENTE,
                'senha' => $senhaDefault
            ],
            [
                'id' => 6,
                'nome' => "Roberto Firmino",
                'unidade' => 2,
                'email' => "roberto.firmino@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::GERENTE
            ],
            [
                'id' => 7,
                'nome' => "Alex de Souza",
                'unidade' => 3,
                'email' => "alex.de.souza@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::GERENTE
            ],
            [
                'id' => 8,
                'nome' => "Françoaldo Souza",
                'unidade' => 4,
                'email' => "françoaldo.souza@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::GERENTE
            ],
            [
                'id' => 9,
                'nome' => "Romário Faria",
                'unidade' => 5,
                'email' => "romário.faria@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::GERENTE
            ],
            [
                'id' => 10,
                'nome' => "Ricardo Goulart",
                'unidade' => 6,
                'email' => "ricardo.goulart@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::GERENTE
            ],
            [
                'id' => 11,
                'nome' => "Dejan Petkovic",
                'unidade' => 7,
                'email' => "dejan.petkovic@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::GERENTE
            ],
            [
                'id' => 12,
                'nome' => "Deyverson Acosta",
                'unidade' => 8,
                'email' => "deyverson.acosta@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::GERENTE
            ],
            [
                'id' => 13,
                'nome' => "Harlei Silva",
                'unidade' => 9,
                'email' => "harlei.silva@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::GERENTE
            ],
            [
                'id' => 14,
                'nome' => "Walter Henrique",
                'unidade' => 10,
                'email' => "walter.henrique@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::GERENTE
            ],

            // Vendedores
            [
                'id' => 15,
                'nome' => "Afonso Afancar",
                'unidade' => 6,
                'email' => "afonso.afancar@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 16,
                'nome' => "Alceu Andreoli",
                'unidade' => 6,
                'email' => "alceu.andreoli@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 17,
                'nome' => "Amalia Zago",
                'unidade' => 6,
                'email' => "amalia.zago@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 18,
                'nome' => "Carlos Eduardo",
                'unidade' => 6,
                'email' => "carlos.eduardo@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 19,
                'nome' => "Luiz Felipe",
                'unidade' => 6,
                'email' => "luiz.felipe@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 20,
                'nome' => "Breno",
                'unidade' => 8,
                'email' => "breno@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 21,
                'nome' => "Emanuel",
                'unidade' => 8,
                'email' => "emanuel@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 22,
                'nome' => "Ryan",
                'unidade' => 8,
                'email' => "ryan@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 23,
                'nome' => "Vitor Hugo",
                'unidade' => 8,
                'email' => "vitor.hugo@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 24,
                'nome' => "Yuri",
                'unidade' => 8,
                'email' => "yuri@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 25,
                'nome' => "Benjamin",
                'unidade' => 10,
                'email' => "benjamin@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 26,
                'nome' => "Erick",
                'unidade' => 10,
                'email' => "erick@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 27,
                'nome' => "Enzo Gabriel",
                'unidade' => 10,
                'email' => "enzo.gabriel@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 28,
                'nome' => "Fernando",
                'unidade' => 10,
                'email' => "fernando@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 29,
                'nome' => "Joaquim",
                'unidade' => 10,
                'email' => "joaquim@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 30,
                'nome' => "André",
                'unidade' => 3,
                'email' => "andré@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 31,
                'nome' => "Raul",
                'unidade' => 3,
                'email' => "raul@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 32,
                'nome' => "Marcelo",
                'unidade' => 3,
                'email' => "marcelo@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 33,
                'nome' => "Julio César",
                'unidade' => 3,
                'email' => "julio.césar@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 34,
                'nome' => "Cauê",
                'unidade' => 3,
                'email' => "cauê@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 35,
                'nome' => "Benício",
                'unidade' => 2,
                'email' => "benício@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 36,
                'nome' => "Vitor Gabriel",
                'unidade' => 2,
                'email' => "vitor.gabriel@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 37,
                'nome' => "Augusto",
                'unidade' => 2,
                'email' => "augusto@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 38,
                'nome' => "Pedro Lucas",
                'unidade' => 2,
                'email' => "pedro.lucas@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 39,
                'nome' => "Luiz Gustavo",
                'unidade' => 2,
                'email' => "luiz.gustavo@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 40,
                'nome' => "Giovanni",
                'unidade' => 9,
                'email' => "giovanni@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 41,
                'nome' => "Renato",
                'unidade' => 9,
                'email' => "renato@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 42,
                'nome' => "Diego",
                'unidade' => 9,
                'email' => "diego@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 43,
                'nome' => "João Paulo",
                'unidade' => 9,
                'email' => "joão.paulo@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 44,
                'nome' => "Renan",
                'unidade' => 9,
                'email' => "renan@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 45,
                'nome' => "Luiz Fernando",
                'unidade' => 1,
                'email' => "luiz.fernando@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 46,
                'nome' => "Anthony",
                'unidade' => 1,
                'email' => "anthony@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 47,
                'nome' => "Lucas Gabriel",
                'unidade' => 1,
                'email' => "lucas.gabriel@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 48,
                'nome' => "Thales",
                'unidade' => 1,
                'email' => "thales@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 49,
                'nome' => "Luiz Miguel",
                'unidade' => 1,
                'email' => "luiz.miguel@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 50,
                'nome' => "Henry",
                'unidade' => 5,
                'email' => "henry@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 51,
                'nome' => "Marcos Vinicius",
                'unidade' => 5,
                'email' => "marcos.vinicius@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 52,
                'nome' => "Kevin",
                'unidade' => 5,
                'email' => "kevin@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 53,
                'nome' => "Levi",
                'unidade' => 5,
                'email' => "levi@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 54,
                'nome' => "Enrico",
                'unidade' => 5,
                'email' => "enrico@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 55,
                'nome' => "João Lucas",
                'unidade' => 4,
                'email' => "joão.lucas@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 56,
                'nome' => "Hugo",
                'unidade' => 4,
                'email' => "hugo@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 57,
                'nome' => "Luiz Guilherme",
                'unidade' => 4,
                'email' => "luiz.guilherme@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 58,
                'nome' => "Matheus Henrique",
                'unidade' => 4,
                'email' => "matheus.henrique@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 59,
                'nome' => "Miguel",
                'unidade' => 4,
                'email' => "miguel@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 60,
                'nome' => "Davi",
                'unidade' => 7,
                'email' => "davi@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 61,
                'nome' => "Gabriel",
                'unidade' => 7,
                'email' => "gabriel@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 62,
                'nome' => "Arthur",
                'unidade' => 7,
                'email' => "arthur@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 63,
                'nome' => "Lucas",
                'unidade' => 7,
                'email' => "lucas@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
            [
                'id' => 64,
                'nome' => "Matheus",
                'unidade' => 7,
                'email' => "matheus@magazineaziul.com.br",
                'senha' => $senhaDefault,
                'funcao' => FuncoesEnum::VENDEDOR
            ],
        ];

        User::insert($users);

        Diretoria::all()->each(function ($diretoria, $key) {
            $diretoria->diretor = $key + 2;
            $diretoria->save();
        });
    }
}
