@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
    <section class="p-2">
        <div class="card d-flex justify-content-center align-items-center">
            <div class="card-content col-12">
                <div class="card-header pb-0">
                    <h4 class="font-weight-bold">Edit Kelompok Project Based Learning</h4>
                </div>
                <div class="card-body">
                    <form id="edit-group" data-action="{{ route('teacher.pjbl.group.update', $group->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="clas">Kelas</label>
                                    <select class="form-control" id="clas" name="clas" disabled>
                                        @foreach ($clas as $value)
                                            <option value="{{ $value->id }}"
                                                {{ $value->id == $group->clas_id ? 'selected' : '' }}>
                                                {{ $value->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="question">Soal Project Based Learning</label>
                                    <select class="form-control" id="question" name="question" disabled>
                                        @foreach ($questions as $value)
                                            <option value="{{ $value->id }}"
                                                {{ $value->id == $group->question_id ? 'selected' : '' }}>
                                                {{ $value->competency->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Nama Kelompok</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                        value="{{ $group->name }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="max_member">Jumlah Anggota</label>
                                    <input type="number" id="max_member" name="max_member" class="form-control"
                                        value="{{ $group->max_member }}" readonly>
                                </div>
                            </div>

                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                <button type="submit" class="btn btn-info glow mb-1 mb-sm-0 mr-0 mr-sm-1">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).on('submit', '#edit-group', function(e) {
            e.preventDefault();
            $(document).find('small.text-error').remove();

            const formData = new FormData($(this)[0]);

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
                        $(document).find(`[name=${key}]`).after(
                            `<small class="text-danger text-error">${error}</small>`
                        )
                    })
                },
            });
        });
    </script>
@endsection
