@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
<section id="configuration">
    <div class="row justify-content-center">
        <div class="col-12">
            @include('flash::message')
            <div class="row breadcrumbs-top mb-1">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('teacher.pertanyaan.index', [$competency->slug]) }}" style="color: grey"><i class="ft ft-arrow-left"></i> Kembali</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="card p-2">
                <h4 class="font-weight-bold">Soal :</h4>
                {!! $question->description ?? '' !!}
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="mt-2">
                        <h4 class="font-weight-bold">Keterangan</h4>
                        <div class="card-subtitle float-right">
                            <a class="btn btn-info btn-modal" href="javascript:void(0);" data-href="{{ route('teacher.keterangan.create', [$competency->slug, $question->id]) }}" data-container=".app-modal"><i class="ft-plus"></i> Tambah</a>
                        </div>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No</th>
                                        <th style="text-align: center;">Detail</th>
                                        <th style="text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                    <tr>
                                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                                        <td>{{ $value->detail ?? '' }}</td>
                                        <td>
                                            <a href="{{ route('teacher.jawaban-pertama.index', [$competency->slug, $value->id]) }}" class="btn btn-primary btn-sm"><i class="ft-eye"></i> Jawaban</a>
                                            <button data-href="{{ route('teacher.keterangan.edit', [$competency->slug, $question->id, $value->id]) }}" data-container=".app-modal" class="btn btn-success btn-sm btn-modal"><i class="ft-edit-2"></i> Ubah</button>
                                            <button data-href="{{ route('teacher.keterangan.destroy', [$competency->slug, $question->id, $value->id]) }}" class="btn btn-danger btn-sm btn-delete"><i class="ft-trash-2"></i> Hapus</button> 
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
<div class="modal app-modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true"></div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        // Store
        $(document).on('submit', '#create-description', function(e) {
            e.preventDefault();
            const formData = $(this).serialize()
            $(document).find('small.text-error').remove();

            $.ajax({
                url: $(this).data('action'),
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formData,
                dataType: 'json',
                success: function (res) {
                    if (res.status) {
                        window.location.href = res.url
                    }
                },
                error: function (err) {
                    $.each(err.responseJSON.data, function(key, error) {
                        $(document).find(`[name=${key}]`).after(`<small class="text-danger text-error">${error}</small>`)
                    })
                },
            });
        })

        // Update
        $(document).on('submit', '#edit-description', function(e) {
            e.preventDefault();
            const detail = $('#detail').val()
            $(document).find('small.text-error').remove();

            $.ajax({
                url: $(this).data('action'),
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    _method: 'PUT',
                    detail,
                },
                dataType: 'json',
                success: function (res) {
                    if (res.status) {
                        window.location.href = res.url
                    }
                },
                error: function (err) {
                    $.each(err.responseJSON.data, function(key, error) {
                        $(document).find(`[name=${key}]`).after(`<small class="text-danger text-error">${error}</small>`)
                    })
                },
            })
        })
    })
</script>
@endsection