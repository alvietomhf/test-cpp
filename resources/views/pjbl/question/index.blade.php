@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
    <section id="configuration" class="p-2">
        <div class="row justify-content-center">
            <div class="col-12">
                @include('flash::message')
                <div class="card">
                    <div class="card-header">
                        <h4 class="font-weight-bold">Soal Project Based Learning</h4>
                        <div class="card-subtitle float-right">
                            <a class="btn btn-info btn-modal" href="{{ route('teacher.pjbl.question.create') }}"><i
                                    class="ft-plus"></i> Tambah</a>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">No</th>
                                            <th style="text-align: center;">Nama Materi</th>
                                            <th style="text-align: center;">Deskripsi</th>
                                            <th style="text-align: center;">Studi Kasus</th>
                                            <th style="text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($questions as $question)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $question->custom_competency ?? ($question->competency_id ? $question->competency->title : '') }}
                                                </td>
                                                <td>{!! $question->description !!}</td>
                                                <td>{!! $question->case !!}</td>
                                                <td>
                                                    <a href="{{ route('teacher.pjbl.question.edit', $question->id) }}"
                                                        class="btn btn-sm btn-primary"><i class="ft-edit-2"></i> Edit</a>
                                                    <button
                                                        data-href="{{ route('teacher.pjbl.question.destroy', [$question->id]) }}"
                                                        class="btn btn-danger btn-sm btn-delete"><i class="ft-trash-2"></i>
                                                        Hapus
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal app-modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true"></div>
@endsection
