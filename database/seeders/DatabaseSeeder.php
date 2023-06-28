<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\RolesSeeders;
use Database\Seeders\CategorieSeeder;
use Database\Seeders\BooksStatusSeeders;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesSeeders::class,
            UsersSeeder::class,
            BooksStatusSeeders::class,
            CategorieSeeder::class
        ]);
        //\App\Models\Books::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
