<?php

namespace Database\Seeders;

use App\Models\BookStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BooksStatusSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            [
                'name' => 'Activo',
                'detail' => 'Libro disponible en catalogo'
            ],
            [
                'name' => 'Revision',
                'detail' => 'Libro en espera por aprobacion'
            ],
            [
                'name' => 'Eliminado',
                'detail' => 'Libro eliminado de inventario'
            ],
            [
                'name' => 'Privado',
                'detail' => 'Libro oculto en el catalogo pero en inventario'
            ],
            [
                'name' => 'Rechazado',
                'detail' => 'Libro rechazado para ser publicado'
            ]
        ];

        foreach($status as $statu) {
            BookStatus::create([
                'name' => $statu['name'],
                'detail' => $statu['detail'],
            ]);
        }
    }
}
