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
        $subjectA = ['Tipe Data', 'Operator'];
        $subjectB = ['Percabangan', 'Perulangan'];
        $subjectC = ['Array', 'List'];
        $subjectD = ["Tipe Data", "Operator", "Operasi Aritmatika", "Operasi Logika", "Percabangan", "Perulangan", "Array", "List"];

        Competency::create([
            'title' => 'Tipe Data',
            'name' => 'Tipe Data',
            'slug' => 'tipe-data',
            'description' => 'Membuat kode program dengan tipe data, dan operator.',
            'subject' => json_encode($subjectA),
        ]);
        Competency::create([
            'title' => 'Struktrur Kontrol',
            'name' => 'Struktrur Kontrol',
            'slug' => 'struktur-kontrol',
            'description' => 'Membuat kode program struktur kontrol.',
            'subject' => json_encode($subjectB),
        ]);
        Competency::create([
            'title' => 'Struktur Data',
            'name' => 'Struktur Data',
            'slug' => 'struktur-data',
            'description' => 'Membuat kode program struktur data.',
            'subject' => json_encode($subjectC),
        ]);
        Competency::create([
            'title' => 'Tes Psikomotorik',
            'name' => 'Tes Psikomotorik C++',
            'slug' => 'psikomotorik',
            'description' => 'Tes ini bertujuan untuk mengukur pemahaman peserta didik dalam menerapkan konsep dasar pemrograman C++ melalui pengelolaan data siswa dalam suatu kelas. Peserta diminta membuat program yang menyimpan data nama, nilai, dan kehadiran siswa, menghitung total dan rata-rata nilai, menampilkan siswa dengan nilai tertinggi dan kehadiran terbaik, serta mengidentifikasi siswa yang tidak lulus dan siswa dengan kehadiran kurang dari 80%. Post test ini menilai kemampuan dalam penggunaan array, struktur kontrol (perulangan dan percabangan), serta pemilihan tipe data yang tepat dalam konteks pemrograman dasar.',
            'subject' => json_encode($subjectD),
        ]);
    }
}
