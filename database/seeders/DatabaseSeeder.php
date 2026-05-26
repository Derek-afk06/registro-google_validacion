<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Ejecuta CareerSeeder primero para tener las carreras en BD
        $this->call([
            CareerSeeder::class,
        ]);

        // Crea usuario de prueba tras llenar las carreras
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}