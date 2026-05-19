<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Technicien;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    public function run(): void
    {
        // Créer un admin
        $admin = User::updateOrCreate(
            ['email' => 'admin@test.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
                'role' => 'admin'
            ]
        );

        // Créer un manager
        $manager = User::updateOrCreate(
            ['email' => 'manager@test.com'],
            [
                'name' => 'Manager',
                'password' => Hash::make('password'),
                'role' => 'manager'
            ]
        );

        // Créer un technicien
        $technicien = User::updateOrCreate(
            ['email' => 'tech@test.com'],
            [
                'name' => 'Technicien',
                'password' => Hash::make('password'),
                'role' => 'technicien'
            ]
        );

        // Lier les techniciens aux utilisateurs
        Technicien::updateOrCreate(
            ['email' => 'tech@test.com'],
            [
                'nom' => 'Technicien',
                'user_id' => $technicien->id,
                'specialite' => 'Informatique',
                'actif' => true
            ]
        );

        echo "Utilisateurs de test créés avec succès!\n";
        echo "Admin: admin@test.com / password\n";
        echo "Manager: manager@test.com / password\n";
        echo "Technicien: tech@test.com / password\n";
    }
}
