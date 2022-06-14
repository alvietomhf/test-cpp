<?php

namespace Database\Seeders;

use App\Models\Competency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjectA = ['Tipe Data', 'Variabel', 'Konstanta', 'Operator', 'Ekspresi'];
        $subjectB = ['Operasi Aritmatika', 'Operasi Logika'];
        $subjectC = ['Percabangan'];
        $subjectD = ['Perulangan'];

        Competency::create([
            'title' => 'KD 4.4',
            'name' => 'Kompetensi Dasar 4.4',
            'slug' => 'kompetensi-dasar-4.4',
            'description' => 'Membuat kode program dengan tipe data, variabel, konstanta, operator dan ekspresi.',
            'subject' => json_encode($subjectA),
        ]);
        Competency::create([
            'title' => 'KD 4.5',
            'name' => 'Kompetensi Dasar 4.5',
            'slug' => 'kompetensi-dasar-4.5',
            'description' => 'Membuat kode program dengan operasi aritmatika dan logika.',
            'subject' => json_encode($subjectB),
        ]);
        Competency::create([
            'title' => 'KD 4.6',
            'name' => 'Kompetensi Dasar 4.6',
            'slug' => 'kompetensi-dasar-4.6',
            'description' => 'Membuat kode program struktur kontrol percabangan.',
            'subject' => json_encode($subjectC),
        ]);
        Competency::create([
            'title' => 'KD 4.7',
            'name' => 'Kompetensi Dasar 4.7',
            'slug' => 'kompetensi-dasar-4.7',
            'description' => 'Membuat kode program struktur kontrol perulangan.',
            'subject' => json_encode($subjectD),
        ]);
    }
}
