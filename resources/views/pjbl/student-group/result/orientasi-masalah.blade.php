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

                        <div class="mb-2 text-justify">
                            <h5 class="font-weight-bold mb-1">Studi Kasus</h5>
                            {!! $data['group']->question->case ?? '' !!}
                        </div>

                        <hr>

                        <div class="row justify-content-center">
                            <div class="col-lg-10 col-md-12">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('student.pjbl.group.problem.store') }}">
                                            @csrf
                                            <input type="hidden" name="pg_work_id" value="{{ $data['pgWork']->id }}">
                                            <div class="form-group">
                                                <label class="font-weight-bold">Rumusan Masalah</label>
                                                <textarea class="form-control" id="desc_1" name="desc_1" rows="3"
                                                    placeholder="Masukan rumusan masalah disini..." {{ $data['passed'] ? 'readonly' : 'required' }}>{{ $data['passed'] ? $data['pgwProblem']->desc_1 : '' }}</textarea>
                                                @error('desc_1')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group mt-2">
                                                <label class="font-weight-bold">Indikator Pemecahan Masalah</label>
                                                <textarea class="form-control" id="desc_2" name="desc_2" rows="3"
                                                    placeholder="Masukan deskripsi masalah disini..." {{ $data['passed'] ? 'readonly' : 'required' }}>{{ $data['passed'] ? $data['pgwProblem']->desc_2 : '' }}</textarea>
                                                @error('desc_2')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group mt-2 mb-2">
                                                <label class="font-weight-bold">Analisis Masalah</label>
                                                <textarea class="form-control" id="desc_3" name="desc_3" rows="3"
                                                    placeholder="Masukan analisis masalah disini..." {{ $data['passed'] ? 'readonly' : 'required' }}>{{ $data['passed'] ? $data['pgwProblem']->desc_3 : '' }}</textarea>
                                                @error('desc_3')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            @unless ($data['passed'])
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button type="submit"
                                                        class="btn btn-info glow mb-1 mb-sm-0 mr-0 mr-sm-1">Simpan</button>
                                                </div>
                                            @endunless
                                        </form>

                                        @if ($data['passed'])
                                            <div class="text-center mt-5">
                                                <div class="d-inline-block rounded-circle border border-success p-4">
                                                    <i class="la la-check text-success" style="font-size: 48px;"></i>
                                                </div>
                                                <p class="mt-2 font-weight-semibold">Kelompokmu sudah menyelesaikan
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
