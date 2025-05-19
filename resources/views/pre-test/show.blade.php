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
                    @if (!$result)
                        <h1 class="font-weight-bold">Tes Kognitif: Mengukur Pemahaman Awal Kamu</h1>
                        <p>Sebelum mulai belajar, coba isi tes ini dulu, ya! Tujuannya buat ngecek seberapa paham kamu
                            sama materi yang akan dipelajari. Tenang, hasilnya nggak ngaruh ke nilai akhir, kok. Anggap aja
                            pemanasan biar belajarnya makin pas buat kamu.</p>

                        <h3 class="font-weight-bold mt-4">Panduan Pelaksanaan Pengerjaan Soal</h3>
                        <ol class="pl-3">
                            <li>Ada <strong>16 soal</strong> yang harus kamu kerjakan. Baca soalnya baik-baik, ya!</li>
                            <li>Waktu yang disediakan cuma <strong>50 menit</strong>, jadi jangan terlalu lama di satu soal.
                            </li>
                            <li>Pastikan koneksi internet di komputermu <strong>stabil</strong>.</li>
                            <li>Fokus ngerjain soal dan <strong>jangan ngobrol</strong> saat tes berlangsung.</li>
                            <li><strong>Kerjakan sendiri</strong>. Nyontek atau bantuin teman itu pelanggaran, ya.</li>
                            <li>Kalau sudah selesai, <strong>periksa lagi jawabanmu</strong> sebelum klik submit.</li>
                        </ol>

                        <p><strong>Perhatian:</strong> Tes Kognitif ini hanya bisa dikerjakan sekali, jadi pastikan kamu
                            sudah
                            siap sebelum memulai!</p>

                        <button type="button" data-href="{{ route('student.pretest.start') }}"
                            class="btn btn-info w-100 w-md-25 btn-start mt-3">Mulai</button>
                    @else
                        <h1 class="font-weight-bold">Kamu Sudah Menyelesaikan Tes Kognitif</h1>
                        <p>Mantap! Kamu udah ngerjain tes-nya. Sekarang saatnya lihat hasilnya biar kamu bisa tahu
                            sejauh mana pemahaman awalmu sebelum mulai belajar materi inti. Hasil ini bisa bantu kamu dan
                            gurumu buat menyesuaikan pembelajaran supaya lebih pas dan efektif buat kamu.</p>
                        <p class="mt-2 mb-0">Yuk, klik tombol di bawah ini untuk melihat hasil pengerjaanmu!</p>

                        <button type="button" data-href="{{ route('student.result') }}"
                            class="btn btn-info w-100 w-md-25 btn-result mt-1">Lihat Hasil</button>
                    @endif
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
