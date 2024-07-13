<?php

namespace App\Models;

use App\Enums\FuncoesEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The table associated with the model.
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'email',
        'funcao',
        'unidade',
        'senha',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'senha',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'senha' => 'hashed',
            'funcao' => FuncoesEnum::class
        ];
    }

    public function funcaoFk()
    {
        return $this->hasOne(Funcao::class, 'funcao', 'id');
    }

    public function unidadeFk()
    {
        return $this->belongsTo(Unidade::class, 'unidade', 'id');
    }

    /**
     * Fornece o nome do campo de senha para os metodos de autenticação do Laravel.
     */
    public function getAuthPasswordName()
    {
        return 'senha';
    }

    /**
     * Retorna a senha do usuário para os metodos de autenticação do Laravel.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->senha;
    }
}
