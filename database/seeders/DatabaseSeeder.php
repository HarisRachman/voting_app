<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\Candidate::create([
            'nama' => 'Bintang',
            'daerah' => 'Indramayu',
            'image' => 'images/image1.jpeg',
        ]);

        \App\Models\Candidate::create([
            'nama' => 'Zahwa',
            'daerah' => 'Pekalongan',
            'image' => 'images/image2.jpeg',
        ]);

        \App\Models\Candidate::create([
            'nama' => 'Azkia',
            'daerah' => 'Bumi Ayu',
            'image' => 'images/image3.jpeg',
        ]);
    }
}
