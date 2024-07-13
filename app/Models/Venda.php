<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    use HasFactory;

    protected $table = 'vendas';

    protected $fillable = [
        'data_hora',
        'vendedor',
        'valor',
        'latitude',
        'longitude',
        'unidade_venda',
        'unidade_proxima',
    ];

    protected function casts()
    {
        return [
            'data_hora' => 'datetime',
        ];
    }

    public function vendedorFk()
    {
        return $this->hasOne(User::class, 'id', 'vendedor');
    }

    public function unidadeVenda()
    {
        return $this->belongsTo(Unidade::class, 'id', 'unidade_venda');
    }

    public function unidadeProxima()
    {
        return $this->hasOne(Unidade::class, 'id', 'unidade_proxima');
    }
}
