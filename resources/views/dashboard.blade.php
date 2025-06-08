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
                                            <h3 class="success">
                                                {{ is_numeric(optional($playground)->total) ? intval($playground->total) : '-' }}
                                            </h3>
                                            <span>Latihan Dikerjakan</span>
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
                                            <h3 class="danger">
                                                {{ is_numeric(optional($mcq)->score) ? round((intval($mcq->score) / $maxScoreMcq) * 100) : '-' }}
                                            </h3>
                                            <span>Skor Tes Kognitif</span>
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
                                            <h3 class="info">
                                                {{ is_numeric(optional($project)->score) ? round((intval($project->score) / $maxScoreCode) * 100) : '-' }}
                                            </h3>
                                            <span>Skor Tes Psikomotorik</span>
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

                            <li><strong>Menu Play Ground</strong>
                                <ul>
                                    <li>Berisi berbagai soal latihan pemrograman berdasarkan kategori, yaitu:</li>
                                    <ol type="a">
                                        <li><strong>Tipe Data</strong>: Soal terkait jenis data dasar seperti integer, float,
                                            char, dll.</li>
                                        <li><strong>Struktur Kontrol</strong>: Soal menggunakan kondisi seperti <code>if</code>,
                                            <code>if-else</code>, atau <code>switch-case</code> dan juga perulangan seperti
                                            <code>for</code>
                                            dan <code>do-while</code>.
                                        </li>
                                        <li><strong>Struktur Data</strong>: Soal lanjutan yang menggunakan array atau struktur
                                            data lainnya.</li>
                                    </ol>
                                </ul>
                            </li>

                            <li><strong>Menu Tes Kognitif</strong>
                                <ul>
                                    <li>Berisi soal pilihan ganda yang mencakup berbagai topik materi pemrograman.</li>
                                    <li>Siswa mengerjakan soal-soal ini untuk mengukur pemahaman awal sebelum mengikuti
                                        pembelajaran.</li>
                                </ul>
                            </li>


                            <li><strong>Menu Tes Psikomotorik</strong>
                                <ul>
                                    <li>Berisi soal pemrograman berupa proyek yang terdiri dari gabungan beberapa materi.</li>
                                    <li>Siswa akan mengerjakan proyek sebagai bagian dari evaluasi kemampuan menyeluruh.</li>
                                </ul>
                            </li>

                            <li><strong>Menu PjBL</strong>
                                <ul>
                                    <li>Berisi aktivitas pembelajaran berbasis proyek yang dilakukan secara berkelompok.</li>
                                    <li>Siswa akan mengerjakan proyek sesuai sintaks pembelajaran yang telah ditentukan guru.
                                    </li>
                                    <li>Proyek yang dikerjakan akan menjadi bagian dari penilaian keterampilan dan kolaborasi
                                        siswa.</li>
                                </ul>
                            </li>

                        </ol>
                    </div>
                </div>

                <div class="card shadow-sm mt-4">
                    <div class="card-header bg-info text-white font-weight-bold">
                        Video Pembelajaran
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h5>Tipe Data dan Variabel</h5>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/_agqO67gOgg"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5>Struktur Data</h5>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/q04buHDFT6M"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5>Percabangan</h5>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/VSL19lCLqHk"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h5>Perulangan</h5>
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/UnjN6paBra0"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
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
                                <p>Menu ini digunakan untuk monitoring hasil tes kognitif dan psikomotorik siswa. Pada halaman
                                    ini
                                    terdapat daftar
                                    kelas
                                    dimana didalamnya ada tabel yang
                                    menampilkan nama-nama siswa beserta nilai / skor yang diperoleh.</p>
                                <ul type="a">
                                    <li>Terdapat daftar kelas beserta siswa.</li>
                                    <li>Tombol Lihat digunakan untuk membuka popup yang berisi data jawaban siswa.</li>
                                </ul>
                            </li>

                            <li><strong>Menu Soal Kognitif</strong><br>
                                <p>Menu ini digunakan untuk memanajemen soal-soal kognitif yang berbentuk pilihan ganda seperti
                                    menambahkan, mengedit, dan menghapus soal.</p>
                                <ul type="a">
                                    <li>Tombol <b>Tambah</b> digunakan untuk membuka halaman yang berisi form pembuatan soal
                                        baru
                                        dengan format pilihan ganda (opsi A–E).</li>
                                    <li>Tombol berwarna ungu digunakan untuk mengedit soal yang telah dibuat sebelumnya.</li>
                                    <li>Tombol berwarna merah digunakan untuk menghapus soal yang tidak digunakan.</li>
                                </ul>
                            </li>

                            <li><strong>Menu Soal Psikomotorik</strong><br>
                                <p>Menu ini digunakan untuk memanajemen data soal psikomotorik, seperti: menambah, mengedit dan
                                    menghapus
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

                            <li><strong>Menu PjBL</strong><br>
                                <p>Menu ini digunakan untuk mengelola pembelajaran berbasis proyek (Project Based Learning).
                                    Guru dapat membuat soal proyek dan mengelompokkan siswa untuk bekerja dalam tim.</p>
                                <ul type="a">
                                    <li>Terdapat dua submenu yaitu <b>Soal</b> dan <b>Kelompok</b>.</li>
                                    <li>Submenu <b>Soal</b> digunakan untuk membuat dan mengelola soal-soal proyek.</li>
                                    <li>Submenu <b>Kelompok</b> digunakan untuk membentuk kelompok siswa dan memantau
                                        perkembangan proyek mereka.</li>
                                    <li>Tombol Tambah digunakan untuk membuat soal atau kelompok baru.</li>
                                    <li>Tombol berwarna ungu digunakan untuk mengedit soal atau kelompok yang telah dibuat.
                                    </li>
                                    <li>Tombol berwarna merah digunakan untuk menghapus data soal atau kelompok.</li>
                                    <li>Tombol berwarna orange digunakan untuk melihat progress kelompok.</li>
                                    <li>Tombol berwarna hijau digunakan untuk melihat anggota kelompok.</li>
                                </ul>
                            </li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>
    @endrole
@endsection
