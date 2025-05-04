@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
    <section id="configuration">
        <div class="row justify-content-center">
            <div class="col-12">
                @include('flash::message')
                <div class="card">
                    <div class="card-header">
                        <h4 class="font-weight-bold">Soal Pilihan Ganda / Kognitif</h4>
                        <div class="card-subtitle float-right">
                            <a class="btn btn-info btn-modal" href="{{ route('teacher.kognitif.create') }}"><i
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
                                            <th style="text-align: center;">Deskripsi</th>
                                            <th style="text-align: center;">Penjelasan</th>
                                            <th style="text-align: center;">Level</th>
                                            <th style="text-align: center;">Opsi</th>
                                            <th style="text-align: center;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($questions as $question)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <span><strong>Studi Kasus:</strong>
                                                        {!! $question->case !!}</span>
                                                    <span><strong>
                                                            Pertanyaan:</strong> {!! $question->question !!}</span>
                                                </td>
                                                <td>
                                                    {!! $question->note !!}
                                                </td>
                                                <td>
                                                    @php
                                                        switch ($question->difficulty) {
                                                            case 'easy':
                                                                $difficultyLabel = 'Mudah';
                                                                $difficultyColor = 'badge-success';
                                                                break;
                                                            case 'medium':
                                                                $difficultyLabel = 'Sedang';
                                                                $difficultyColor = 'badge-warning';
                                                                break;
                                                            default:
                                                                $difficultyLabel = 'Sulit';
                                                                $difficultyColor = 'badge-danger';
                                                                break;
                                                        }
                                                    @endphp
                                                    <span class="badge {{ $difficultyColor }}">{{ $difficultyLabel }}</span>
                                                </td>
                                                <td>
                                                    <ul class="pl-3 mb-0">
                                                        @foreach ($question->options as $option)
                                                            <li
                                                                class="{{ $option->correct ? 'list-group-item-success rounded' : '' }}">
                                                                {!! $option->title !!}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>
                                                    <a href="{{ route('teacher.kognitif.edit', $question->id) }}"
                                                        class="btn btn-sm btn-primary"><i class="ft-edit-2"></i> Edit</a>
                                                    <button
                                                        data-href="{{ route('teacher.kognitif.destroy', [$question->id]) }}"
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

@section('js')
    <script>
        $(document).ready(function() {
            // Store
            $(document).on('submit', '#create-question', function(e) {
                e.preventDefault();
                const formData = new FormData($(this)[0]);
                $(document).find('small.text-error').remove();

                $.ajax({
                    url: $(this).data('action'),
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    dataType: 'json',
                    enctype: 'multipart/form-data',
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        if (res.status) {
                            window.location.href = res.url
                        }
                    },
                    error: function(err) {
                        $.each(err.responseJSON.data, function(key, error) {
                            if (key === 'description') {
                                $(document).find(`[id=cke_description]`).after(
                                    `<small class="text-danger text-error">${error}</small>`
                                )
                            } else {
                                $(document).find(`[name=${key}]`).after(
                                    `<small class="text-danger text-error">${error}</small>`
                                )
                            }
                        })
                    },
                });
            })

            // Update
            $(document).on('submit', '#edit-question', function(e) {
                e.preventDefault();
                const formData = new FormData($(this)[0]);
                formData.append('_method', 'PUT');
                $(document).find('small.text-error').remove();

                $.ajax({
                    url: $(this).data('action'),
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    dataType: 'json',
                    enctype: 'multipart/form-data',
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        if (res.status) {
                            window.location.href = res.url
                        }
                    },
                    error: function(err) {
                        $.each(err.responseJSON.data, function(key, error) {
                            if (key === 'description') {
                                $(document).find(`[id=cke_description]`).after(
                                    `<small class="text-danger text-error">${error}</small>`
                                )
                            } else {
                                $(document).find(`[name=${key}]`).after(
                                    `<small class="text-danger text-error">${error}</small>`
                                )
                            }
                        })
                    },
                })
            })
        })
    </script>
@endsection
