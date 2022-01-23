<?php

namespace Database\Seeders;

use App\Models\Pelanggan_Model;
use Illuminate\Database\Seeder;

// Memanggil Faker
use Faker\Factory as Faker;

class Pelanggan_ModelSeeder extends Seeder
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
                'pelanggan' => $faker->name,
                'alamat' => $faker->address,
                'no_hp' => $faker->phoneNumber
            ];
    
            Pelanggan_Model::create($data);
        }
    }
}
