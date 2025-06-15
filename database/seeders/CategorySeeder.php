<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Desarrollo Web',
            'Desarrollo Móvil',
            'Diseño Movil',
            'Robotica',
            'Ciberseguridad',
            'Inteligencia Artificial',
            'Fibra Óptica',
            'Redes y Telecomunicaciones',
            'Electricidad y Electrónica',
            'Energia Renovable',
            'Taller'

        ];
        foreach ($categories as $category) {
        category::create([
                'name' => $category,
            ]);
        }
    }
}
