<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $studies = [
            ['code' => 'MTK', 'name' => 'Matematika', 'remark' => 'Pelajaran Matematika', 'color' => '#FF0000'],
            ['code' => 'BIO', 'name' => 'Biologi', 'remark' => 'Pelajaran Biologi', 'color' => '#00FF00'],
            ['code' => 'FIS', 'name' => 'Fisika', 'remark' => 'Pelajaran Fisika', 'color' => '#0000FF'],
            ['code' => 'KIM', 'name' => 'Kimia', 'remark' => 'Pelajaran Kimia', 'color' => '#FF00FF'],
            ['code' => 'SOS', 'name' => 'Sosiologi', 'remark' => 'Pelajaran Sosiologi', 'color' => '#FFFF00'],
            ['code' => 'GEO', 'name' => 'Geografi', 'remark' => 'Pelajaran Geografi', 'color' => '#00FFFF'],
            ['code' => 'SAS', 'name' => 'Sejarah', 'remark' => 'Pelajaran Sejarah', 'color' => '#FFA500'],
            ['code' => 'EKO', 'name' => 'Ekonomi', 'remark' => 'Pelajaran Ekonomi', 'color' => '#800080'],
        ];
        DB::table('studies')->insert($studies);
    }
}
