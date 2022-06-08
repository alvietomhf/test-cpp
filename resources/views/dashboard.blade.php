@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
@role('student')
@include('flash::message')
<div class="card p-3">
    <h1 class="font-weight-bold">PENDAHULUAN</h1>
    <div class="d-flex align-items-center justify-content-center" style="background: linear-gradient(to bottom, #ffffff 0%,#ffffff 20%,#D5ECFD 20%,#D5ECFD 80%,#ffffff 80%,#ffffff 80%,#ffffff 100%);">
        <div class="d-md-block d-none p-2">
            <h2 class="font-weight-bold">provides a tool for assesment of coding capabilities</h2>
            <p>&bull; Memilik fitur untuk mengecek baris setiap code</p>
        </div>
        <img src="{{ asset('assets/images/cpp-dashboard.png') }}" alt="CPP Dashboard" style="width: 300px; height: 300px;">
    </div>
    <div class="w-100 overflow-y-auto my-2">
        <h3 class="font-weight-bold">C++ PENGENALAN</h3>
        <div style="border-left: 2px solid; border-color: #1995C9">
            <ul>
                <li>C++  merupakan bahasa pemrograman yang dikembangkan dari bahasa C.</li>
                <li>C++  dikembangkan oleh Bjarne Stroustrup.</li>
                <li>C++ adalah bahasa lintas platform yang dapat digunakan untuk membuat aplikasi berkinerja tinggi.</li>
                <li>C++ memberi pemrogram kontrol tingkat tinggi atas sumber daya dan memori sistem.</li>
            </ul>
        </div>
    </div>
    <div class="my-2">
        <h3 class="text-center font-weight-bold pb-3">Materi yang diajukan :</h3>
        <div class="row match-height px-5">
            @foreach ($competency as $key => $value)
            <div class="col-xl-3 col-md-6 col-sm-12">
                <div class="card" style="background-color: #D9D9D9; height: 210px;">
                    <div class="card-content">
                        <div class="card-body text-center">
                            <h4 class="card-title font-weight-bold">{{ $value->title }}</h4>
                            <hr style="border-top: 2px solid #1995C9">
                            <p class="card-text">{{ $value->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <hr class="d-flex align-self-center my-3" style="border-top: 2px solid #1995C9; width: 50%;"></hr>
    <div class="text-center h4" style="padding-top: 30px; padding-bottom: 30px;">
        Aplikasi ini dikembangkan untuk mengukur serta mengevaluasi kompetensi pemrograman C++ yang dimiliki siswa dan ditujukan kepada siswa SMK kelas X rekayasa perangkat lunak.
    </div>
    <hr class="d-flex align-self-center my-3" style="border-top: 2px solid #1995C9; width: 50%;"></hr>
    <div class="mt-3">
        <h3 class="text-center font-weight-bold pb-3">Ayo Tunjukan Kemampuan Pemrogramanmu</h3>
        <div class="row match-height p-2">
            @foreach ($progress as $key => $value)
            <div class="col-xl-6 col-12 mb-1">
                <div class="card pt-1" style="background-color: #D9D9D9; height: 200px; position: relative;">
                    <div class="d-flex align-items-center @if($value->status !== 'lock') justify-content-center @endif">
                        <div class="card-content w-75">
                            <div class="card-body">
                                <h4 class="card-title font-weight-bold">{{ $value->competency->title }}</h4>
                                <hr style="border-top: 2px solid #1995C9">
                                <p class="card-text">{{ $value->competency->description }}</p>
                            </div>
                        </div>
                        @if($value->status === 'unlock')
                        <a class="btn btn-info w-25 m-2 ml-n1" href="{{ route('student.test.show', [$value->competency->slug]) }}">Selesaikan</a>
                        @endif
                        @if($value->status === 'passed')
                        <button onclick="window.location.href='{{ route('student.test.result', [$value->competency->slug]) }}'" class="btn btn-info w-25 m-2 ml-n1">Lihat Hasil</button>
                        @endif
                    </div>
                    @if($value->status === 'unlock')
                    <div class="p-1 text-white rounded" style="position: absolute; background-color: #1995C9; top: -25px; left: -20px;">Skor >= 75 untuk membuka tes berikutnya</div>
                    @endif
                    @if($value->status === 'lock')
                    <div class="d-flex flex-column align-items-center justify-content-center w-100 h-100 p-1" style="position: absolute; top: 0px;background-color: #d9d9d9bd;">
                        <img src="{{ asset('assets/images/lock.png') }}" alt="Lock Icon" style="width: 100px; height: 100px;">
                        <div class="text-center text-dark mt-1">
                            Tes ini terkunci.
                            <span class="d-block">
                                Skor >=75 pada tes sebelumnya untuk membuka tes ini.
                            </span>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col-12">
        <img src="{{ asset('assets/images/gallery/smekda.jpg') }}" class="img-fluid rounded" style="width: 100%; max-height: 400px; height: auto; object-fit: cover; object-position: 100% 60%;" alt="timeline image">
        <div class="user-data text-center bg-white rounded pb-2 mb-md-2">
            <img src="{{ auth()->user()->avatar ? asset('storage/images/' . auth()->user()->avatar) : asset('assets/images/portrait/small/avatar-s-23.png') }}" class="img-fluid rounded-circle width-150 profile-image shadow-lg border border-3" alt="timeline image">
            <h4 class="mt-1 mb-0">{{ auth()->user()->name ?? '' }}</h4>
            <p class="m-0">Surabaya, INA</p>
            <h1 class="mt-2">Welcome to Dashboard</h1>
        </div>
    </div>
</div>
@endrole
@endsection
