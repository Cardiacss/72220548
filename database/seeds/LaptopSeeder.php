<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LaptopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=0;$i<150;$i++)
        {
            DB::table('laptop')->insert([
                'merek' => $faker->word(),
                'nama' => $faker->word(),
                'tahun' => $faker->year(),
                'spek' => $faker->word(),
                'harga' => $faker->randomNumber(8, true),
                'gambar' =>$faker->ipv4()
            ]);
        }

    }
}
