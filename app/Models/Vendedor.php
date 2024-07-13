<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;

    protected $table = 'vendedores';

    protected $fillable = [
        'vendedor',
        'unidade'
    ];

    /**
     * Get the unity that owns the Vendedor
     */
    public function unidade()
    {
        return $this->belongsTo(Unidade::class, 'unidade', 'id');
    }

    /**
     * Get the user that owns the Vendedor
     */
    public function vendedor()
    {
        return $this->hasOne(User::class, 'vendedor', 'id');
    }
}
