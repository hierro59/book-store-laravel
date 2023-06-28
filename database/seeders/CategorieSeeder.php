<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            [
                'name' => 'Uncategorized',
                'detail' => 'Sin categoria'
            ],
            [
                'name' => 'Ficción',
                'detail' => 'Libros de Ficción'
            ],
            [
                'name' => 'No ficción',
                'detail' => 'Libros de No ficción'
            ],
            [
                'name' => 'Misterio',
                'detail' => 'Libros de Misterio'
            ],
            [
                'name' => 'Romance',
                'detail' => 'Libros de Romance'
            ],
            [
                'name' => 'Ciencia ficción',
                'detail' => 'Libros de Ciencia ficción'
            ],
            [
                'name' => 'Novela',
                'detail' => 'Novelas'
            ],
            [
                'name' => 'Relato',
                'detail' => 'Libros de Relatos'
            ],
            [
                'name' => 'Poesia',
                'detail' => 'Libros de Poesia'
            ],
            [
                'name' => 'Consulta y referencia',
                'detail' => 'Libros de diccionarios, enciclopedias y atlas.'
            ],
            [
                'name' => 'Artístico o ilustrado',
                'detail' => 'Libros de catálogos de museo, arte y libros de fotografía'
            ],
            [
                'name' => 'Divulgativo',
                'detail' => 'Libros de biografías o divulgación científica'
            ],
            [
                'name' => 'Texto',
                'detail' => 'Libros para las escuelas'
            ],
            [
                'name' => 'Técnicos o especializados',
                'detail' => 'Libros de cálculo, de anatomía o de lingüística'
            ],
            [
                'name' => 'Prácticos',
                'detail' => 'Libros de recetarios, instructivos y manuales'
            ],
            [
                'name' => 'Religiosos y sagrados',
                'detail' => 'Libros de de oración o de catequesis'
            ],
            [
                'name' => 'Autoayuda',
                'detail' => 'Libros para superar el duelo o dejar de fumar'
            ],
            [
                'name' => 'Infantiles',
                'detail' => 'Libros para aprender a leer, historias infantiles o para bebés'
            ]
        ];

        foreach($status as $statu) {
            Categorie::create([
                'name' => $statu['name'],
                'detail' => $statu['detail'],
            ]);
        }
    }
}
