@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
    <section id="group-detail" class="p-2">
        <div class="row justify-content-center">
            <div class="col-12">
                @include('flash::message')
                <div class="card">
                    <div class="card-body">
                        <h2 class="font-weight-bold">Selamat Datang di Pembelajaran Project Based Learning</h2>
                        <p class="mb-2 text-justify">
                            Halo Guru! Ini merupakan halaman Pembelajaran Project Based Learning untuk memantau dan
                            memberikan umpan balik kepada siswa.
                            Silakan tinjau perkembangan, hasil kerja, serta kolaborasi siswa dalam setiap tahapan proyek.
                            Terima kasih atas bimbingan dan semangat Anda dalam mendampingi proses belajar mereka!
                        </p>

                        <hr>

                        @foreach ($phase as $key => $value)
                            <div class="row d-flex justify-content-center mt-2">
                                <div class="col-12 col-lg-10">
                                    @if ($value->unlock)
                                        <a class="border border-info shadow-sm rounded-pill rounded-lg mt-2 py-1 py-lg-2 px-4 d-flex justify-content-between align-items-center text-dark text-decoration-none"
                                            href="{{ route('teacher.pjbl.group.result', [$group->id, $value->slug]) }}">
                                            <div>
                                                <h6 class="mb-1 font-weight-bold">Sintaks {{ $loop->iteration }}</h6>

                                                <p class="mb-0">{{ $value->name }}</p>
                                            </div>
                                            @if ($value->passed)
                                                <div class="text-success">
                                                    <i class="la la-check"></i>
                                                </div>
                                            @endif
                                            @if (isset($value->doneFeedback) && !$value->doneFeedback)
                                                <small class="text-danger">Silahkan isi Feedback</small>
                                            @endif
                                        </a>
                                    @else
                                        <div class="border border-secondary bg-light text-muted shadow-sm rounded-pill rounded-lg mt-2 py-1 py-lg-2 px-4 d-flex justify-content-between align-items-center"
                                            style="cursor: not-allowed; opacity: 0.6;">
                                            <div>
                                                <h6 class="mb-1 font-weight-bold">Sintaks {{ $loop->iteration }}</h6>
                                                <p class="mb-0">{{ $value->name }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
