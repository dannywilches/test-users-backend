<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombres',
        'apellidos',
        'cedula',
        'email',
        'pais',
        'direccion',
        'celular',
        'categoria_id',
        'created_at',
        'updated_at',
    ];

    public function getCategoria() {
        return $this->belongsTo(Categorias::class, 'categoria_id', 'id');
    }
}
