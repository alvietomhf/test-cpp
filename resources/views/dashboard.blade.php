@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
    @role('student')
        <div style="background: #ffffff">
            <div class="d-flex flex-column p-2">
                @include('flash::message')
                <div class="user-data text-center rounded py-4 px-10">
                    <h1 class="font-weight-bold">Selamat datang {{ auth()->user()->name ?? '' }}</h1>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="warning">{{ intval($totalMateri) }}</h3>
                                            <span>Substansi Materi</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-notebook warning font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="success">{{ intval(optional($passed)->total ?? 0) }}</h3>
                                            <span>Tes Dikerjakan</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-rocket success font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="danger">{{ intval(optional($passed)->score ?? 0) }}</h3>
                                            <span>Skor Tes</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-bag danger font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="info">{{ intval(optional($project)->score ?? 0) }}</h3>
                                            <span>Skor Proyek</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-graduation info font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header bg-info text-white font-weight-bold">
                        Panduan Aplikasi
                    </div>
                    <div class="card-body">
                        <ol>
                            <li><strong>Menu Hasil</strong>
                                <ul>
                                    <li>Digunakan untuk melihat rekap hasil belajar siswa.</li>
                                    <li>Menampilkan daftar tes yang berhasil dilalui beserta skor yang diperoleh.</li>
                                    <li>Menampilkan skor proyek apabila siswa telah menyelesaikan proyek.</li>
                                </ul>
                            </li>

                            <li><strong>Menu Penulisan Kode</strong>
                                <ul>
                                    <li>Digunakan untuk membuka tab baru yang menampilkan file PDF panduan penulisan kode
                                        program.</li>
                                    <li>Bertujuan sebagai referensi untuk membantu siswa memahami sintaks dasar pemrograman.
                                    </li>
                                </ul>
                            </li>

                            <li><strong>Menu Referensi</strong>
                                <ul>
                                    <li>Digunakan untuk membuka tab baru yang berisi file PDF materi belajar.</li>
                                    <li>Berisi ringkasan teori atau penjelasan yang relevan dengan soal latihan yang diberikan.
                                    </li>
                                </ul>
                            </li>

                            <li><strong>Menu Soal Tes</strong>
                                <ul>
                                    <li>Berisi berbagai soal latihan berdasarkan kategori, yaitu:</li>
                                    <ol type="a">
                                        <li><strong>Tipe Data</strong>: Soal terkait jenis data dasar seperti integer, float,
                                            char, dll.</li>
                                        <li><strong>Sekuensial</strong>: Soal dengan alur program berurutan seperti menghitung
                                            luas.</li>
                                        <li><strong>Percabangan</strong>: Soal menggunakan kondisi seperti <code>if</code>,
                                            <code>if-else</code>, atau <code>switch-case</code>.
                                        </li>
                                        <li><strong>Perulangan</strong>: Soal menggunakan perulangan seperti <code>for</code>
                                            dan <code>do-while</code>.</li>
                                        <li><strong>Struktur Data</strong>: Soal lanjutan yang menggunakan array atau struktur
                                            data lainnya.</li>
                                    </ol>
                                </ul>
                            </li>

                            <li><strong>Menu Proyek</strong>
                                <ul>
                                    <li>Berisi tugas proyek pemrograman yang berisi gabungan dari soal sebelumnya.</li>
                                    <li>Siswa akan mengerjakan proyek sebagai bagian dari evaluasi kemampuan menyeluruh.</li>
                                </ul>
                            </li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>
    @else
        <div style="background: #ffffff">
            <div class="d-flex flex-column p-2">
                <div class="user-data text-center rounded py-4 px-10">
                    <h1 class="font-weight-bold">Selamat datang {{ auth()->user()->name ?? '' }}</h1>
                </div>

                <div class="row">
                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="danger">{{ intval($totalClass) }}</h3>
                                            <span>Kelas</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-screen-desktop danger font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="success">{{ intval($totalStudent) }}</h3>
                                            <span>Siswa</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-user success font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="warning">{{ intval($totalMateri) }}</h3>
                                            <span>Substansi Materi</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-notebook warning font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="media-body text-left">
                                            <h3 class="info">{{ intval($totalQuestion) }}</h3>
                                            <span>Butir Soal</span>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="icon-question info font-large-2 float-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header bg-info text-white font-weight-bold">
                        Panduan Aplikasi
                    </div>
                    <div class="card-body">
                        <ol>
                            <li><strong>Menu Kelas & Menu Siswa</strong><br>
                                <p>Menu ini digunakan untuk memanajemen data kelas dan siswa, seperti: menambah, mengedit dan
                                    menghapus data.</p>
                                <ul type="a">
                                    <li>Terdapat daftar nama siswa beserta username yang digunakan untuk login.</li>
                                    <li>Tombol Tambah digunakan untuk menambahkan data baru.</li>
                                    <li>Tombol berwarna hijau digunakan untuk mengedit data yang sudah ada.</li>
                                    <li>Tombol berwarna merah digunakan untuk menghapus data.</li>
                                </ul>
                            </li>

                            <li><strong>Menu Hasil Tes</strong><br>
                                <p>Menu ini digunakan untuk monitoring hasil tes siswa. Pada halaman ini terdapat daftar kelas
                                    dimana didalamnya ada tabel yang
                                    menampilkan nama-nama siswa beserta nilai.</p>
                                <ul type="a">
                                    <li>Terdapat daftar kelas beserta siswa.</li>
                                    <li>Tombol Lihat digunakan untuk membuka popup yang berisi data analisa serta kode program
                                        yang
                                        dikerjakan oleh siswa.</li>
                                </ul>
                            </li>

                            <li><strong>Menu Soal</strong><br>
                                <p>Menu ini digunakan untuk memanajemen data soal, seperti: menambah, mengedit dan menghapus
                                    data soal.</p>
                                <ul type="a">
                                    <li>Terdapat beberapa data substansi soal.</li>
                                    <li>Tombol Tambah digunakan untuk membuka popup yang berisi form untuk membuat soal
                                        baru.</li>
                                    <li>Tombol berwarna ungu dengan label <b>Keterangan</b> digunakan untuk membuka detail soal
                                        yang berisi instruksi,
                                        bobot poin serta kunci jawaban.</li>
                                    <li>Tombol berwarna hijau digunakan untuk mengedit data yang sudah ada.</li>
                                    <li>Tombol berwarna merah digunakan untuk menghapus data.</li>
                                </ul>
                            </li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>
    @endrole
@endsection
