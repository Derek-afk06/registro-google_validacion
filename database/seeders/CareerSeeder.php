<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Career;

class CareerSeeder extends Seeder
{
    public function run(): void
    {
        Career::create(['name' => 'Ingeniería de Software']);
        Career::create(['name' => 'Diseño y Desarrollo de Videojuegos']);
        Career::create(['name' => 'Administración de Empresas Digitales']);
        Career::create(['name' => 'Marketing y Medios Digitales']);
        Career::create(['name' => 'Ciberseguridad y Redes']);
    }
}