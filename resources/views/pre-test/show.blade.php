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
            <div class="row d-flex justify-content-center mt-2">
                <div class="col-12 col-md-8">
                    <h1 class="font-weight-bold">Pretest: Mengukur Pemahaman Awal Kamu</h1>
                    <p style="">Sebelum mulai belajar, coba isi pretest ini dulu, ya! Tujuannya
                        buat ngecek
                        seberapa paham kamu sama materi yang akan dipelajari. Tenang, hasilnya nggak ngaruh ke nilai akhir,
                        kok.
                        Anggap aja pemanasan biar belajarnya makin pas buat kamu.</p>
                </div>
                <div class="col-12 col-md-8 mt-3">
                    <h3 class="font-weight-bold">Panduan Pelaksanaan Pengerjaan Soal</h3>
                    <ol class="list-unstyled">
                        <li>1. Terdapat 16 soal yang harus dikerjakan.</li>
                        <li>2. Waktu pengerjaan adalah 40 menit.</li>
                        <li>3. Pastikan perangkat yang digunakan mendukung dan terhubung ke internet secara stabil.</li>
                    </ol>

                    {{-- @if ($progress->status === 'unlock') --}}
                    <button type="button" data-href="{{ route('student.pretest.start') }}"
                        class="btn btn-info w-100 w-md-25 btn-start">Mulai</button>
                    {{-- @else
                        <button type="button" data-href="{{ route('student.pre-test.result') }}"
                            class="btn btn-info w-100 w-md-25 btn-result">Lihat Hasil</button>
                    @endif --}}
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script>
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
