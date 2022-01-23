<?php

namespace Database\Seeders;

use App\Models\Category_Model;
use Illuminate\Database\Seeder;

// Memanggil Faker
use Faker\Factory as Faker;

class Category_ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ( $i = 0; $i < 100 ; $i++)
        {
            $data = [
                'kategori' => $faker->name,
                'keterangan' => $faker->text
            ];
    
            Category_Model::create($data);
        }
    }
}
