<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categorias = [
            ['categoria' => 'Cliente'],
            ['categoria' => 'Proveedor'],
            ['categoria' => 'Funcionario Interno']
        ];
        DB::table('categorias')->insert($categorias);
    }
}
