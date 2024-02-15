<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class jurnalseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            DB::table('user_manajemen')->insert([
                'nama' => $faker->name,
                'nik' => $faker->nik,
                'password' => $faker->password,
                'posisi' => $faker->address(),
                'area' => $faker->address()
            ]);
        }
    }
}
