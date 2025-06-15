<?php

namespace Database\Seeders;

use App\Models\level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            'Básico',
            'Intermedio',
            'Avanzado',
            'Especializado',
        ];

        foreach ($levels as $level) {
          level::create([
                'name' => $level,
            ]);
        }
    }
}