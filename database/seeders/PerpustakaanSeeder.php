<?php

namespace Database\Seeders;

use App\Models\Perpustakaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerpustakaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i=0; $i < 10; $i++) { 
            Perpustakaan::create([
                'nama' => $faker->name,
                'divisi' => $faker->numberBetween(1, 10),
                'kategori' => $faker->numberBetween(1, 10),
                'berkas' => $faker->word(),
            ]);
        }
    }
}
