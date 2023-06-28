<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class UsersSeeder extends Seeder
{
    use HasRoles;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'IamGod',
                'email' => 'hierro59@gmail.com',
                'password' => 'Atunis2716.',
                'role' => 'super-admin',
            ]
        ];

        foreach($users as $user) {
            
            $created_user = User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]); 
            $created_user->assignRole('super-admin');
        }
    }
}
