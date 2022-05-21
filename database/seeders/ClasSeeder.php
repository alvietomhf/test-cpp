<?php

namespace Database\Seeders;

use App\Models\Clas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clas::create([
            'name' => 'X RPL 1',
            'season' => '2022/2023',
        ]);
        Clas::create([
            'name' => 'X RPL 2',
            'season' => '2022/2023',
        ]);
    }
}
