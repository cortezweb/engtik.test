<?php

namespace Database\Seeders;


use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('courses');
        Storage::makeDirectory('courses/images');


        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Luis Cortez',
            'email' => 'luiscortez@engtik.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
        ]);

        $this->call([
            CategorySeeder::class,
            PriceSeeder::class,
            LevelSeeder::class,
            CourseSeeder::class,
            // Add other seeders here
        ]);

    }
}