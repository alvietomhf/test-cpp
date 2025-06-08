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

                        <div class="mb-2 text-justify">
                            <h5 class="font-weight-bold mb-1">Studi Kasus</h5>
                            {!! $data['group']->question->case ?? '' !!}
                        </div>

                        <hr>

                        <div class="row justify-content-center">
                            <div class="col-lg-10 col-md-12">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        @if ($data['passed'])
                                            <form>
                                                <input type="hidden" name="pg_work_id" value="{{ $data['pgWork']->id }}">
                                                <div class="form-group">
                                                    <label class="font-weight-bold">Rumusan Masalah</label>
                                                    <textarea class="form-control" id="desc_1" name="desc_1" rows="3" readonly>{{ $data['passed'] ? $data['pgwProblem']->desc_1 : '' }}</textarea>
                                                </div>

                                                <div class="form-group mt-2">
                                                    <label class="font-weight-bold">Indikator Pemecahan
                                                        Masalah</label>
                                                    <textarea class="form-control" id="desc_2" name="desc_2" rows="3" readonly>{{ $data['passed'] ? $data['pgwProblem']->desc_2 : '' }}</textarea>
                                                </div>

                                                <div class="form-group mt-2 mb-2">
                                                    <label class="font-weight-bold">Analisis Masalah</label>
                                                    <textarea class="form-control" id="desc_3" name="desc_3" rows="3" readonly>{{ $data['passed'] ? $data['pgwProblem']->desc_3 : '' }}</textarea>
                                                </div>
                                            </form>

                                            <div class="text-center mt-5">
                                                <div class="d-inline-block rounded-circle border border-success p-4">
                                                    <i class="la la-check text-success" style="font-size: 48px;"></i>
                                                </div>
                                                <p class="mt-2 font-weight-semibold">Kelompok ini sudah menyelesaikan
                                                    {{ $data['phase']->name }}.</p>
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
