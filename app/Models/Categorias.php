<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'categoria',
        'created_at',
        'updated_at',
    ];
}
