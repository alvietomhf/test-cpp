@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
    <section id="group-detail" class="p-2">
        <div class="row justify-content-center">
            <div class="col-12">
                @include('flash::message')
                <div class="row breadcrumbs-top mb-1">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('teacher.pjbl.group.show', $data['group']->id) }}"
                                    style="color: grey"><i class="ft ft-arrow-left"></i> Kembali</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h2 class="font-weight-bold">{{ $data['phase']->name }}</h2>
                        <p class="mb-2 text-justify">{{ $data['phase']->description }}</p>
                        <hr>

                        <div class="row justify-content-center">
                            <div class="col-lg-10 col-md-12">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        @foreach ($data['pgwReflection'] as $reflection)
                                            <div class="form-group mb-2">
                                                <label
                                                    class="font-weight-bold d-block">{{ $reflection->member->user->name }}</label>

                                                @if (!empty($reflection->file))
                                                    <div
                                                        class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between border border-info rounded p-2 shadow-sm">
                                                        <p class="mb-2 mb-md-0 font-italic text-muted">
                                                            File refleksi tersedia. Silakan lihat file PDF berikut:
                                                        </p>
                                                        <a href="{{ asset('storage/pdf/' . $reflection->file) }}"
                                                            target="_blank" class="btn btn-outline-primary btn-sm">
                                                            📄 Lihat File PDF
                                                        </a>
                                                    </div>
                                                @else
                                                    <div class="text-danger mt-1">
                                                        Belum ada file refleksi yang diunggah.
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                        @if ($data['passed'])
                                            <div class="text-center mt-2">
                                                <div>
                                                    <div class="d-inline-block rounded-circle border border-success p-4">
                                                        <i class="la la-check text-success" style="font-size: 48px;"></i>
                                                    </div>
                                                    <p class="mt-2 font-weight-semibold">Kelompok ini sudah menyelesaikan
                                                        {{ $data['phase']->name }}.</p>
                                                </div>
                                            </div>
                                        @else
                                            <div class="text-center mt-2">
                                                <div class="d-inline-block rounded-circle border border-warning p-4">
                                                    <i class="la la-clock-o text-warning" style="font-size: 48px;"></i>
                                                </div>
                                                <p class="mt-2 font-weight-semibold">Anggota Kelompok ini masih ada yang
                                                    belum menyelesaikan
                                                    {{ $data['phase']->name }}.</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
