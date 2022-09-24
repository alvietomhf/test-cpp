<?php

namespace Database\Seeders;

use App\Models\Clas;
use App\Models\Progress;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MhsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $total = 50;
        $testClas = Clas::create([
            'name' => 'PTI',
            'season' => '2022/2023',
        ]);

        for ($i = 1; $i <= $total; $i++) {
            $user = User::create([
                'clas_id' => $testClas,
                'name' => 'Mahasiswa ' . $i,
                'username' => 'mhstest' . $i,
                'password' => Hash::make('password'),
            ]);
            $user->assignRole('student');
            Progress::create([
                'user_id' => $user->id,
                'competency_id' => 1,
                'status' => 'unlock',
            ]);
            Progress::create([
                'user_id' => $user->id,
                'competency_id' => 2,
                // 'status' => 'unlock',
            ]);
            Progress::create([
                'user_id' => $user->id,
                'competency_id' => 3,
                // 'status' => 'unlock',
            ]);
            Progress::create([
                'user_id' => $user->id,
                'competency_id' => 4,
                // 'status' => 'unlock',
            ]);
        }

        // for ($i = 1; $i <= $total; $i++) {
        //     $user = User::create([
        //         'clas_id' => 5,
        //         'name' => 'Mahasiswa ' . $i,
        //         'username' => 'mhskedua' . $i,
        //         'password' => Hash::make('password'),
        //     ]);
        //     $user->assignRole('student');
        //     Progress::create([
        //         'user_id' => $user->id,
        //         'competency_id' => 1,
        //         'status' => 'unlock',
        //     ]);
        //     Progress::create([
        //         'user_id' => $user->id,
        //         'competency_id' => 2,
        //         'status' => 'unlock',
        //     ]);
        //     Progress::create([
        //         'user_id' => $user->id,
        //         'competency_id' => 3,
        //         'status' => 'unlock',
        //     ]);
        //     Progress::create([
        //         'user_id' => $user->id,
        //         'competency_id' => 4,
        //         'status' => 'unlock',
        //     ]);
        // }
    }
}
