@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
@include('flash::message')
<div id="main" class="card p-3">
    <h1 class="font-weight-bold mb-2">{{ $progress->competency->name }}</h1>
    <p class="mb-3">{{ $progress->competency->description }}</p>
    <div class="w-100 overflow-y-auto mb-3">
        <h4 class="font-weight-bold">Materi Pokok</h4>
        <div class="" style="border-left: 2px solid; border-color: #1995C9">
            <ul class="list-unstyled ml-2">
                @php
                    $subject = json_decode($progress->competency->subject);
                @endphp
                @foreach ($subject as $value)
                    <li>{{ $value }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="mb-3">
        <h3 class="font-weight-bold">Aturan atau Ketentuan Pelaksanaan Test</h3>
        <ol class="pl-1">
            <li>Soal pada test Uji Kompetensi Pemrograman berjumlah 3 soal.</li>
            <li>Soal pada test Uji Kompetensi Pemrograman berbentuk live code.</li>
            <li>Durasi test yaitu 60 menit (20 menit tiap soal).</li>
            <li>Range skor Uji Kompetensi Pemrograman 0-100. Skor >= 75 dinyatakan lulus, sedangkan skor < 75 dinyatakan tidak lulus.</li>
            <li>Pastikan perangakat mendukung dan terhubung dengan jaringan internet.</li>
        </ol>
    </div>
    @if ($progress->status === 'unlock')
    <button type="button" class="btn btn-info w-25 btn-next">Selanjutnya</button>
    @else
    <button type="button" data-href="{{ route('student.test.result', [$progress->competency->slug]) }}" class="btn btn-info w-25 btn-result">Lihat Hasil Tes</button>
    @endif
</div>

<div id="term" class="card p-3" style="display: none;">
    <div class="mb-3">
        <h1 class="font-weight-bold mb-2">Ketentuan Penulisan Kode Program</h1>
        <ol class="pl-1">
            <li>Kerjakan sesuai dengan urutan atau langkah-langkah yang terdapat pada soal.</li>
            <li>
                Apabila beberapa varibel memiliki tipe data yang sama, maka penulisan deklarasi tetap dilakukan secara terpisah dibaris selanjutnya.
                <span class="d-block">Contoh :</span>
                <span class="d-block font-italic ml-1">int jumlah;</span>
                <span class="d-block font-italic ml-1">int harga;</span>
                <span class="d-block font-italic ml-1">int bayar;</span>
            </li>
            <li>Gunakan tanda kutip dua (") untuk penulisan string, dan kutip satu (') untuk penulisan char.</li>
            <li>
                Untuk menampilkan output gunakan perintah cout.
                <span class="d-block">Contoh :</span>
                <span class="d-block font-italic ml-1">cout << "Output";</span>
                <span class="d-block font-italic ml-1">{{ 'cout << "Jumlah = " << jumlah;' }}</span>
            </li>
            <li>
                Untuk membuat baris baru gunakan perintah endl secara terpisah dibaris selanjutnya.
                <span class="d-block">Contoh :</span>
                <img class="d-block" src="{{ asset('assets/images/term/endl.png') }}" alt="Endl">
                <span class="d-block">Untuk menghasilkan output seperti gambar diatas, berikut kodenya</span>
                <span class="d-block font-italic ml-1">{{ 'cout << "Jumlah = " << jumlah;' }}</span>
                <span class="d-block font-italic ml-1">{{ 'cout << endl;' }}</span>
                <span class="d-block font-italic ml-1">{{ 'cout << "Harga = " << harga;' }}</span>

            </li>
        </ol>
    </div>
    <div class="d-flex flex-column flex-sm-row">
        <button type="button" class="btn btn-outline-info btn-back mr-sm-2 mb-sm-0 mb-1">Kembali</button>
        <button type="button" data-href="{{ route('student.test.start', [$progress->competency->slug]) }}" class="btn btn-info px-5 btn-start">Mulai Tes</button>
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
            title: 'Konfirmasi Mengikuti Tes',
            text: 'Apakah Anda yakin ingin mengambil tes ini?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'MULAI TES',
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