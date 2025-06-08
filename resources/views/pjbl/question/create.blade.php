@extends('layouts.app')

@section('css')
    <style>
        .fw-600 {
            font-weight: 600;
        }
    </style>
@endsection

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
    <section class="p-2">
        <div style="padding: 10px 0px; text-align: center; margin-bottom: 10px;" class="bg-info rounded">
            <span class="text-white" style="font-size: 18px;">Buat Soal Project Based Learning</span>
        </div>

        <div class="card d-flex justify-content-center align-items-center" style="margin-bottom: 0;">
            <div class="card-content col-12 col-xl-10">
                <div class="card-body">
                    <form id="create-question" data-action="{{ route('teacher.pjbl.question.store') }}">
                        <div class="row">
                            <div class="col-12">
                                <fieldset class="form-group floating-label-form-group">
                                    <label class="fw-600" for="competency">Materi</label>
                                    <select class="form-control" id="competency" name="competency">
                                        <option disabled selected>Pilih Materi</option>
                                        @foreach ($competencies as $competency)
                                            <option value="{{ $competency->id }}">{{ $competency->title }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                                <fieldset class="form-group floating-label-form-group">
                                    <label class="fw-600" for="description">Deskripsi</label>
                                    <textarea class="form-control" id="description" name="description" rows="5" placeholder="Pertanyaan"></textarea>
                                </fieldset>
                                <fieldset class="form-group floating-label-form-group">
                                    <label class="fw-600" for="case">Studi Kasus</label>
                                    <textarea class="form-control" id="case" name="case" rows="5" placeholder="Studi Kasus"></textarea>
                                </fieldset>
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
        CKEDITOR.replace('description');
        CKEDITOR.replace('case');
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('submit', '#create-question', function(e) {
                e.preventDefault();

                let valid = true;
                let messages = [];

                const competency = document.getElementById('competency').value;
                if (!competency || competency === 'Pilih Materi') {
                    valid = false;
                    messages.push('⚙️ Materi wajib dipilih.');
                }

                const descVal = CKEDITOR.instances['description'].getData().trim();
                const caseVal = CKEDITOR.instances['case'].getData().trim();

                if (!descVal) {
                    valid = false;
                    messages.push('❓ Deskrripsi wajib diisi.');
                }
                if (!caseVal) {
                    valid = false;
                    messages.push('📝 Studi Kasus wajib diisi.');
                }

                if (!valid) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Validasi Gagal',
                        html: messages.join('<br>'),
                        confirmButtonText: 'Oke',
                    });
                    return;
                }

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
                        if (res.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                html: res.message,
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            }).then((result) => {
                                window.location.href =
                                    res.data.url;
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: res.message
                            })
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi kesalahan',
                            text: 'Silakan coba lagi!',
                        });
                    },
                });
            })
        })
    </script>
@endsection
