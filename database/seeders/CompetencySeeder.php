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
        $subjectB = ['Operasi Aritmatika', 'Operasi Logika'];
        $subjectC = ['Percabangan'];
        $subjectD = ['Perulangan'];
        $subjectE = ['Array', 'List'];

        Competency::create([
            'title' => 'Tipe Data',
            'name' => 'Tipe Data',
            'slug' => 'tipe-data',
            'description' => 'Membuat kode program dengan tipe data, dan operator.',
            'subject' => json_encode($subjectA),
        ]);
        Competency::create([
            'title' => 'Sekuensial',
            'name' => 'Struktur Sekuensial',
            'slug' => 'sekuensial',
            'description' => 'Membuat kode program dengan operasi aritmatika dan logika.',
            'subject' => json_encode($subjectB),
        ]);
        Competency::create([
            'title' => 'Percabangan',
            'name' => 'Struktur Kontrol Percabangan',
            'slug' => 'percabangan',
            'description' => 'Membuat kode program struktur kontrol percabangan.',
            'subject' => json_encode($subjectC),
        ]);
        Competency::create([
            'title' => 'Perulangan',
            'name' => 'Struktur Kontrol Perulangan',
            'slug' => 'perulangan',
            'description' => 'Membuat kode program struktur kontrol perulangan.',
            'subject' => json_encode($subjectD),
        ]);
        Competency::create([
            'title' => 'Struktur Data',
            'name' => 'Struktur Data',
            'slug' => 'struktur-data',
            'description' => 'Membuat kode program struktur data.',
            'subject' => json_encode($subjectE),
        ]);
        Competency::create([
            'title' => 'Proyek',
            'name' => 'Proyek Akhir',
            'slug' => 'proyek-akhir',
            'description' => 'Membuat kode program proyek akhir.',
            'subject' => json_encode(array_merge($subjectA, $subjectB, $subjectC, $subjectD, $subjectE)),
        ]);
    }
}
