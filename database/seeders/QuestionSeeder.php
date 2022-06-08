<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Key;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        Answer::create([
            'question_id' => 1,
            'description' => 'Deklarasi variable a (int)',
            'score' => 20,
        ]);
        Answer::create([
            'question_id' => 1,
            'description' => 'Deklarasi variable b (int)',
            'score' => 20,
        ]);
        Answer::create([
            'question_id' => 1,
            'description' => 'Inisialisasi variable a = 20',
            'score' => 20,
        ]);
        Answer::create([
            'question_id' => 1,
            'description' => 'Inisialisasi variable b = 10',
            'score' => 20,
        ]);
        Answer::create([
            'question_id' => 1,
            'description' => 'Tampilkan hasil dari variable a dan b',
            'score' => 20,
        ]);

        // 2
        Answer::create([
            'question_id' => 2,
            'description' => 'Deklarasi variable nama (string)',
            'score' => 15,
        ]);
        Answer::create([
            'question_id' => 2,
            'description' => 'Deklarasi variable umur (int)',
            'score' => 15,
        ]);
        Answer::create([
            'question_id' => 2,
            'description' => 'Deklarasi variable jenis_kelamin (char)',
            'score' => 15,
        ]);
        Answer::create([
            'question_id' => 2,
            'description' => 'Inisialisasi variable nama = Lusi Anita',
            'score' => 15,
        ]);
        Answer::create([
            'question_id' => 2,
            'description' => 'Inisialisasi variable umur = 18',
            'score' => 15,
        ]);
        Answer::create([
            'question_id' => 2,
            'description' => 'Inisialisasi variable jenis_kelamin = P',
            'score' => 15,
        ]);
        Answer::create([
            'question_id' => 2,
            'description' => 'Tampilkan hasil dari ke-3 variable',
            'score' => 10,
        ]);

        // 3
        Answer::create([
            'question_id' => 3,
            'description' => 'Deklarasi konstanta dan inisialisasi panjang = 5 (int)',
            'score' => 20,
        ]);
        Answer::create([
            'question_id' => 3,
            'description' => 'Deklarasi konstanta dan inisialisasi lebar = 6 (int)',
            'score' => 20,
        ]);
        Answer::create([
            'question_id' => 3,
            'description' => 'Deklarasi variable hasil (int)',
            'score' => 20,
        ]);
        Answer::create([
            'question_id' => 3,
            'description' => 'Inisialisasi variable hasil = panjang x lebar',
            'score' => 20,
        ]);
        Answer::create([
            'question_id' => 3,
            'description' => 'Tampilkan hasil dari konstanta panjang dan lebar',
            'score' => 10,
        ]);
        Answer::create([
            'question_id' => 3,
            'description' => 'Tampilkan hasil perhitungan luas persegi panjang',
            'score' => 10,
        ]);

        // 4
        Answer::create([
            'question_id' => 4,
            'description' => 'Deklarasi variable panjang (int)',
            'score' => 10,
        ]);
        Answer::create([
            'question_id' => 4,
            'description' => 'Deklarasi variable lebar (int)',
            'score' => 10,
        ]);
        Answer::create([
            'question_id' => 4,
            'description' => 'Inisialisasi variable panjang = 5',
            'score' => 10,
        ]);
        Answer::create([
            'question_id' => 4,
            'description' => 'Inisialisasi variable lebar = 6',
            'score' => 10,
        ]);
        Answer::create([
            'question_id' => 4,
            'description' => 'Deklarasi variable hasil (int)',
            'score' => 20,
        ]);
        Answer::create([
            'question_id' => 4,
            'description' => 'Inisialisasi variable hasil = panjang x lebar',
            'score' => 20,
        ]);
        Answer::create([
            'question_id' => 4,
            'description' => 'Tampilkan hasil dari variable panjang dan lebar',
            'score' => 10,
        ]);
        Answer::create([
            'question_id' => 4,
            'description' => 'Tampilkan hasil perhitungan luas persegi panjang',
            'score' => 10,
        ]);

        // 5
        Answer::create([
            'question_id' => 5,
            'description' => 'Deklarasi variable x (int)',
            'score' => 15,
        ]);
        Answer::create([
            'question_id' => 5,
            'description' => 'Deklarasi variable y (int)',
            'score' => 15,
        ]);
        Answer::create([
            'question_id' => 5,
            'description' => 'Deklarasi variable z (int)',
            'score' => 15,
        ]);
        Answer::create([
            'question_id' => 5,
            'description' => 'Inisialisasi variable x = 10',
            'score' => 15,
        ]);
        Answer::create([
            'question_id' => 5,
            'description' => 'Inisialisasi variable y = x + 10',
            'score' => 15,
        ]);
        Answer::create([
            'question_id' => 5,
            'description' => 'Inisialisasi variable z = y + y',
            'score' => 15,
        ]);
        Answer::create([
            'question_id' => 5,
            'description' => 'Tampilkan hasil dari variable x, y, dan z',
            'score' => 10,
        ]);
    }
}
