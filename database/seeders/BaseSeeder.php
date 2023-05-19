<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BaseSeeder extends Seeder
{
    public $faker;

    function __construct() {
        $this->faker = Faker::create('id_ID');
    }
}
