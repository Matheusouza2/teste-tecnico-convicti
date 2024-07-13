<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diretoria extends Model
{
    use HasFactory;

    protected $table = 'diretorias';

    protected $fillable = ['nome', 'diretor'];

    public function diretorFk()
    {
        return $this->hasOne(User::class, 'diretor', 'id');
    }
}
