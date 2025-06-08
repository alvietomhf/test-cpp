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
                                            <div class="">
                                                @if (!empty($data['pgWork']->file))
                                                    <a href="{{ asset('storage/pdf/' . $data['pgWork']->file) }}"
                                                        target="_blank" class="btn btn-primary mb-2">
                                                        📄 Lihat File PDF
                                                    </a>
                                                @endif

                                                <h6 class="font-weight-bold mb-2">Feedback Nilai dan Evaluasi @if (!$data['doneFeedback'])
                                                        <span class="text-danger">, Silahkan isi form input dibawah
                                                            ini!</span>
                                                    @endif
                                                </h6>

                                                <hr>

                                                <form method="POST"
                                                    action="{{ route('teacher.pjbl.group.feedback.store') }}">
                                                    @csrf
                                                    <input type="hidden" name="pg_work_id"
                                                        value="{{ $data['pgWork']->id }}">

                                                    @foreach ($data['pgMembers'] as $key => $member)
                                                        @php
                                                            $score = $member->scores->first();
                                                            $evaluation = $member->evaluations->first();
                                                        @endphp
                                                        <div class="form-group">
                                                            <label
                                                                class="font-weight-bold">{{ $member->user->name }}</label>

                                                            <input type="hidden"
                                                                name="feedbacks[{{ $key }}][member_id]"
                                                                value="{{ $member->id }}">

                                                            <input type="number"
                                                                name="feedbacks[{{ $key }}][score]"
                                                                class="form-control"
                                                                value="{{ $score ? $score->value : '0' }}" required>

                                                            <textarea name="feedbacks[{{ $key }}][evaluation]" class="form-control mt-2" rows="3"
                                                                placeholder="Tuliskan evaluasi..." required>{{ $evaluation ? $evaluation->description : '' }}</textarea>
                                                        </div>
                                                    @endforeach

                                                    <div
                                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                        <button type="submit"
                                                            class="btn btn-info glow mb-1 mb-sm-0 mr-0 mr-sm-1">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="text-center mt-4">
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
