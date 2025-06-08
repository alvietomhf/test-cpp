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
                            <li class="breadcrumb-item"><a href="{{ route('student.pjbl.group.show', $data['group']->id) }}"
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
                                                @if (!empty($data['pgwReflection']->file))
                                                    <a href="{{ asset('storage/pdf/' . $data['pgwReflection']->file) }}"
                                                        target="_blank" class="btn btn-primary mb-2">
                                                        📄 Lihat File PDF
                                                    </a>
                                                @endif

                                                <div>
                                                    <div class="d-inline-block rounded-circle border border-success p-4">
                                                        <i class="la la-check text-success" style="font-size: 48px;"></i>
                                                    </div>
                                                    <p class="mt-2 font-weight-semibold">Kamu sudah menyelesaikan
                                                        {{ $data['phase']->name }}.</p>
                                                </div>
                                            </div>
                                        @else
                                            <div class="mb-4">
                                                <h5 class="font-weight-bold">Refleksi Proyek</h5>
                                                <ol class="pl-3">
                                                    <li class="mb-2"><strong>Apa tantangan terbesar yang kamu hadapi
                                                            selama proyek, dan bagaimana kamu menyelesaikannya?</strong>
                                                    </li>
                                                    <li class="mb-2"><strong>Apa ide atau solusi kreatif yang kamu berikan
                                                            dalam proyek ini?</strong></li>
                                                    <li class="mb-2"><strong>Bagaimana kamu berkontribusi dalam kerja
                                                            kelompok, dan bagaimana kelompokmu bekerja sama?</strong></li>
                                                    <li class="mb-2"><strong>Bagaimana kamu dan timmu menjaga komunikasi
                                                            selama proses proyek, terutama dalam kegiatan daring?</strong>
                                                    </li>
                                                    <li class="mb-2"><strong>Apa teknologi atau alat digital yang kamu
                                                            gunakan selama proyek, dan bagaimana pengalamanmu
                                                            menggunakannya?</strong></li>
                                                </ol>
                                            </div>

                                            <form method="POST" action="{{ route('student.pjbl.group.file.store') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="pg_work_id" value="{{ $data['pgWork']->id }}">
                                                <div class="form-group">
                                                    <label class="font-weight-bold">Upload File (PDF)</label>
                                                    <input type="file" name="pdf_file" class="form-control"
                                                        accept="application/pdf" required>
                                                    @error('pdf_file')
                                                        <small class="text-danger">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-3">
                                                    <button type="submit"
                                                        class="btn btn-info glow mb-1 mb-sm-0">Simpan</button>
                                                </div>
                                            </form>
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
