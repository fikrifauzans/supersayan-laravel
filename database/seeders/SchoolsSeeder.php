<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolsSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = [
            [
                'code' => 'SMP1JKT',
                'address' => 'Jakarta',
                'name' => 'SMP Negeri 1 Jakarta',
                'city' => 'Jakarta',
                'province' => 'Jakarta',
                'long' => $this->faker->longitude,
                'lat' => $this->faker->latitude,
                'logo_id' => null
            ],
            [
                'code' => 'SMA2SBY',
                'address' => 'Surabaya',
                'name' => 'SMA Negeri 2 Surabaya',
                'city' => 'Surabaya',
                'province' => 'Jawa Timur',
                'long' => $this->faker->longitude,
                'lat' => $this->faker->latitude,
                'logo_id' => null
            ],
            [
                'code' => 'SMP3BDG',
                'address' => 'Bandung',
                'name' => 'SMP Negeri 3 Bandung',
                'city' => 'Bandung',
                'province' => 'Jawa Barat',
                'long' => $this->faker->longitude,
                'lat' => $this->faker->latitude,
                'logo_id' => null
            ],
            [
                'code' => 'SMP4SBG',
                'address' => 'Subang',
                'name' => 'SMP Negeri 4 Subang',
                'city' => 'Subang',
                'province' => 'Jawa Barat',
                'long' => $this->faker->longitude,
                'lat' => $this->faker->latitude,
                'logo_id' => null
            ],
            [
                'code' => 'SMA4MDN',
                'address' => 'Medan',
                'name' => 'SMA Negeri 4 Medan',
                'city' => 'Medan',
                'province' => 'Sumut',
                'long' => $this->faker->longitude,
                'lat' => $this->faker->latitude,
                'logo_id' => null
            ],
            [
                'code' => 'SMP5MKS',
                'address' => 'Makassar',
                'name' => 'SMP Negeri 5 Makassar',
                'city' => 'Makassar',
                'province' => 'Sulawesi',
                'long' => $this->faker->longitude,
                'lat' => $this->faker->latitude,
                'logo_id' => null
            ],
            [
                'code' => 'SMA6SMG',
                'address' => 'Semarang',
                'name' => 'SMA Negeri 6 Semarang',
                'city' => 'Semarang',
                'province' => 'Jawa Tengah',
                'long' => $this->faker->longitude,
                'lat' => $this->faker->latitude,
                'logo_id' => null
            ],
        ];

        DB::table('schools')->insert($schools);
    
        
    }
}
