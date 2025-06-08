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
                                        @if ($data['passed'])
                                            <div class="text-center">
                                                @if (!empty($data['pgWork']->file))
                                                    <a href="{{ asset('storage/pdf/' . $data['pgWork']->file) }}"
                                                        target="_blank" class="btn btn-primary mb-2">
                                                        📄 Lihat File PDF
                                                    </a>
                                                @endif

                                                <div>
                                                    <div class="d-inline-block rounded-circle border border-success p-4">
                                                        <i class="la la-check text-success" style="font-size: 48px;"></i>
                                                    </div>
                                                    <p class="mt-2 font-weight-semibold">Kelompok ini sudah menyelesaikan
                                                        {{ $data['phase']->name }}.</p>
                                                </div>
                                            </div>
                                        @else
                                            <div class="text-center mt-4">
                                                <div>
                                                    <div class="d-inline-block rounded-circle border border-warning p-4">
                                                        <i class="la la-clock-o text-warning" style="font-size: 48px;"></i>
                                                    </div>
                                                    <p class="mt-2 font-weight-semibold">Kelompok ini belum menyelesaikan
                                                        {{ $data['phase']->name }}.</p>
                                                </div>
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
