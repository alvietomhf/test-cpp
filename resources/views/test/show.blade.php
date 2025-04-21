@extends('layouts.app')

@section('css')
    <style>
        @media (min-width: 768px) {
            .w-md-25 {
                width: 25% !important;
            }
        }
    </style>
@endsection

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
    <div id="main" class="p-2">
        @include('flash::message')
        <div class="card p-3">
            <div>
                <h1 class="font-weight-bold">{{ $progress->competency->name }}</h1>
                <p style="white-space: pre-line;">{{ $progress->competency->description }}</p>
            </div>
            <div class="row mt-2">
                <div class="col-12 col-md-4 mb-2">
                    <div class="w-100 overflow-auto">
                        <h4 class="font-weight-bold">Substansi Materi</h4>
                        <div class="pl-2 border-left" style="border-color: #512da8">
                            <ul class="list-unstyled">
                                @php
                                    $subject = json_decode($progress->competency->subject);
                                @endphp
                                @foreach ($subject as $value)
                                    <li>{{ $value }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-8">
                    <h3 class="font-weight-bold">Panduan Pelaksanaan Pengerjaan Soal</h3>
                    <ol class="pl-3">
                        @unless ($progress->competency->id === 6)
                            <li>Terdapat 1 soal yang harus dikerjakan.</li>
                        @endunless

                        <li>Pengerjaan berbentuk live coding, di mana peserta menuliskan langsung kode programnya.</li>

                        <li>Waktu pengerjaan adalah 15 menit.</li>

                        @if ($progress->competency->id === 6)
                            <li>Skor berada pada rentang 0-100. Dapatkan skor minimum 75.</li>
                        @endif

                        <li>Pastikan perangkat yang digunakan mendukung coding dan terhubung ke internet secara stabil.</li>
                    </ol>

                    @if ($progress->status === 'unlock')
                        <button type="button" class="btn btn-info w-100 w-md-25 btn-next">Selanjutnya</button>
                    @else
                        <button type="button" data-href="{{ route('student.test.result', [$progress->competency->slug]) }}"
                            class="btn btn-info w-100 w-md-25 btn-result">Lihat Hasil</button>
                    @endif
                </div>
            </div>

        </div>
    </div>

    <div id="term" class="p-2" style="display: none;">
        <div class="card p-3">
            <div class="mb-3">
                <h1 class="font-weight-bold mb-2">Aturan atau Ketentuan Kode Program</h1>
                <ol class="pl-1">
                    <li>Ikuti langkah-langkah atau urutan pengerjaan sesuai dengan yang dijelaskan dalam soal.</li>
                    <li>
                        Bila ada beberapa variabel yang memiliki tipe data serupa, tetap tuliskan deklarasinya <b>satu per
                            satu di baris terpisah</b>.
                        <span class="d-block">Contoh :</span>
                        <span class="d-block font-italic ml-1">int jumlah;</span>
                        <span class="d-block font-italic ml-1">int harga;</span>
                        <span class="d-block font-italic ml-1">int bayar;</span>
                    </li>
                    <li>Untuk penulisan <b>string</b>, gunakan <b>tanda kutip ganda ("")</b>, dan untuk <b>karakter
                            (char)</b>, gunakan <b>tanda
                            kutip tunggal ('')</b>.</li>
                    <li>
                        Gunakan <b>cout</b> untuk mencetak output ke layar.
                        <span class="d-block">Contoh :</span>
                        <span class="d-block font-italic ml-1">cout << "Output" ;</span>
                                <span class="d-block font-italic ml-1">{{ 'cout << "Jumlah = " << jumlah;' }}</span>
                    </li>
                    <li>
                        Untuk berpindah ke baris baru saat mencetak, gunakan <b>endl</b>.
                        <span class="d-block">Contoh :</span>
                        <img class="d-block" src="{{ asset('assets/images/term/endl.png') }}" alt="Endl">
                        <span class="d-block">Untuk menghasilkan output seperti gambar diatas, berikut kodenya</span>
                        <span class="d-block font-italic ml-1">{{ 'cout << "Jumlah = " << jumlah << endl;' }}</span>
                        <span class="d-block font-italic ml-1">{{ 'cout << "Harga = " << harga;' }}</span>

                    </li>
                </ol>
            </div>
            <div class="d-flex flex-column flex-sm-row">
                <button type="button" class="btn btn-outline-info btn-back mr-sm-2 mb-sm-0 mb-1">Kembali</button>
                <button type="button" data-href="{{ route('student.test.start', [$progress->competency->slug]) }}"
                    class="btn btn-info px-5 btn-start">Mulai</button>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script>
        $(".btn-next").on("click", function(e) {
            e.preventDefault();

            $("#main").hide();
            $("#term").show();
        });

        $(".btn-back").on("click", function(e) {
            e.preventDefault();

            $("#main").show();
            $("#term").hide();
        });

        $(".btn-start").on("click", function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin mulai?',
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#14a318',
                cancelButtonColor: '#d33',
                confirmButtonText: 'YA',
                cancelButtonText: 'BATAL',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = $(this).data('href');
                }
            })
        });

        $(".btn-result").on("click", function(e) {
            e.preventDefault();

            window.location.href = $(this).data('href');
        });
    </script>
@endsection
