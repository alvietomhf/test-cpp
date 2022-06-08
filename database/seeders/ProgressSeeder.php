<?php

namespace Database\Seeders;

use App\Models\Progress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Progress::create([
            'user_id' => 3,
            'competency_id' => 1,
            'status' => 'unlock',
        ]);
        Progress::create([
            'user_id' => 3,
            'competency_id' => 2,
        ]);
        Progress::create([
            'user_id' => 3,
            'competency_id' => 3,
        ]);
        Progress::create([
            'user_id' => 3,
            'competency_id' => 4,
        ]);
    }
}
