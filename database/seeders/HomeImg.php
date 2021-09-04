<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeImg extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home')->insert([
            'id' => '1',
            'img1' => '1.jpeg',
            'img2' => '2.jpeg',
            'img3' => '3.jpeg'
        ]);
    }
}