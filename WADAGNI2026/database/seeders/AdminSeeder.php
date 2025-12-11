<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Vérifier si l'admin existe déjà
        if (!User::where('role', 'admin')->exists()) {
            User::create([
                'nom' => 'Admin Principal',
                'email' => 'idohoumoubarack@gmail.com', // change selon ton choix
                'fonction' => 'Administrateur',
                'role' => 'admin',
                'password' => Hash::make('admin123'), // mot de passe par défaut
            ]);
        }
    }
}
