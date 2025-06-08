@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
    <section class="p-2">
        <div class="card d-flex justify-content-center align-items-center">
            <div class="card-content col-12">
                <div class="card-header pb-0">
                    <h4 class="font-weight-bold">Tambah Kelompok Project Based Learning</h4>
                </div>
                <div class="card-body">
                    <form id="add-group" data-action="{{ route('teacher.pjbl.group.store') }}">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="controls">
                                        <label for="clas">Kelas</label>
                                        <select class="form-control" id="clas" name="clas"
                                            oninvalid="this.setCustomValidity('Mohon diisi dengan lengkap')"
                                            oninput="this.setCustomValidity('')" required>
                                            <option value="" disabled selected>Pilih Kelas</option>
                                            @foreach ($clas as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="controls">
                                        <label for="question">Soal Project Based Learning</label>
                                        <select class="form-control" id="question" name="question"
                                            oninvalid="this.setCustomValidity('Mohon diisi dengan lengkap')"
                                            oninput="this.setCustomValidity('')" required>
                                            <option value="" disabled selected>Pilih Soal</option>
                                            @foreach ($questions as $value)
                                                <option value="{{ $value->id }}">{{ $value->competency->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="controls">
                                        <label for="name">Nama Kelompok</label>
                                        <input oninvalid="this.setCustomValidity('Mohon diisi dengan lengkap')"
                                            oninput="this.setCustomValidity('')" type="text" id="name"
                                            class="form-control" placeholder="Nama Kelompok" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="controls">
                                        <label for="lead">Ketua Kelompok</label>
                                        <select class="form-control" id="lead" name="lead"
                                            oninvalid="this.setCustomValidity('Mohon diisi dengan lengkap')"
                                            oninput="this.setCustomValidity('')" required>
                                            <option value="" disabled selected>Pilih Ketua Kelompok</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="controls">
                                        <label for="max_member">Jumlah Anggota</label>
                                        <input oninvalid="this.setCustomValidity('Mohon diisi dengan lengkap')"
                                            oninput="this.setCustomValidity('')" type="number" id="max_member"
                                            class="form-control" placeholder="Jumlah Anggota" name="max_member" required">
                                    </div>
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
        $(document).ready(function() {
            $('#clas').on('change', function() {
                const classId = $(this).val();
                const route = "{{ route('teacher.student.byclass', ':id') }}";

                if (classId) {
                    $.ajax({
                        url: route.replace(':id', classId),
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            if (response.status) {
                                const students = response.data;

                                $('#lead').empty().append(
                                    '<option value="" disabled selected>Pilih Ketua Kelompok</option>'
                                );

                                students.forEach(function(student) {
                                    $('#lead').append(
                                        `<option value="${student.id}">${student.name}</option>`
                                    );
                                });
                            }
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi kesalahan',
                                text: 'Silakan coba lagi!',
                            });
                        }
                    });
                }
            });

            $(document).on('submit', '#add-group', function(e) {
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
            })
        })
    </script>
@endsection
