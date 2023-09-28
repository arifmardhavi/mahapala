<?php

namespace Database\Seeders;

use App\Models\Logistik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LogistikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            Logistik::create([
                'nama' => $faker->name,
                'qty' => $faker->numberBetween(1, 9), // Menghasilkan angka acak 1 digit
                'kondisi' => $faker->word, // Ini bisa diganti dengan jenis data yang sesuai
            ]);
        }
        
    }
}
