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
                                            <div class="">
                                                @if (!empty($data['pgWork']->file))
                                                    <a href="{{ asset('storage/pdf/' . $data['pgWork']->file) }}"
                                                        target="_blank" class="btn btn-primary mb-2">
                                                        📄 Lihat File PDF
                                                    </a>
                                                @endif

                                                <h6 class="font-weight-bold mb-2">Feedback Nilai dan Evaluasi dari Guru</h6>
                                                @foreach ($data['pgMembers'] as $member)
                                                    @php
                                                        $score = $member->scores->first();
                                                        $evaluation = $member->evaluations->first();
                                                    @endphp
                                                    <div class="form-group">
                                                        <label>{{ $member->user->name }}</label>
                                                        <input type="number" class="form-control"
                                                            value="{{ $score ? $score->value : '0' }}" readonly>
                                                        <textarea class="form-control mt-2" rows="3" readonly>{{ $evaluation ? $evaluation->description : '-' }}</textarea>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="text-center mt-4">
                                                <div>
                                                    <div class="d-inline-block rounded-circle border border-success p-4">
                                                        <i class="la la-check text-success" style="font-size: 48px;"></i>
                                                    </div>
                                                    <p class="mt-2 font-weight-semibold">Kelompokmu sudah menyelesaikan
                                                        {{ $data['phase']->name }}.</p>
                                                </div>
                                            </div>
                                        @else
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
