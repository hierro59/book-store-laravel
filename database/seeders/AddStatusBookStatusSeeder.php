<?php

namespace Database\Seeders;

use App\Models\BookStatus;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddStatusBookStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = [
            [
                'name' => 'Aceptado',
                'detail' => 'Aceptar manuscrito o libro para el proceso de edicion'
            ],
            [
                'name' => 'Editando',
                'detail' => 'Manuscrito en proceso de edición'
            ],
            [
                'name' => 'Publicado',
                'detail' => 'Obra publicada en catálogo'
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
