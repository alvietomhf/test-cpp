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
            <span class="text-white" style="font-size: 18px;">Buat Soal Kognitif</span>
        </div>

        <div class="card d-flex justify-content-center align-items-center" style="margin-bottom: 0;">
            <div class="card-content col-12 col-xl-10">
                <div class="card-body">
                    <form id="create-kognitif" data-action="{{ route('teacher.kognitif.store') }}">
                        <div class="row">
                            <div class="col-12">
                                <fieldset class="form-group floating-label-form-group">
                                    <label class="fw-600" for="case">Studi Kasus</label>
                                    <textarea class="form-control" id="case" name="case" rows="5" placeholder="Studi Kasus"></textarea>
                                </fieldset>
                                <fieldset class="form-group floating-label-form-group">
                                    <label class="fw-600" for="question">Pertanyaan</label>
                                    <textarea class="form-control" id="question" name="question" rows="5" placeholder="Pertanyaan"></textarea>
                                </fieldset>
                                <fieldset class="form-group floating-label-form-group">
                                    <label class="fw-600" for="note">Penjelasan</label>
                                    <textarea class="form-control" id="note" name="note" rows="5" placeholder="Penjelasan"></textarea>
                                </fieldset>
                                <fieldset class="form-group floating-label-form-group">
                                    <label class="fw-600" for="difficulty">Level</label>
                                    <select class="form-control" id="difficulty" name="difficulty">
                                        <option disabled selected>Pilih Level</option>
                                        <option value="easy">Mudah</option>
                                        <option value="medium">Sedang</option>
                                        <option value="hard">Sulit</option>
                                    </select>
                                </fieldset>
                                <fieldset class="form-group floating-label-form-group">
                                    <label class="fw-600" for="image">Gambar</label>
                                    <input type="file" class="form-control" id="image" name="image"
                                        placeholder="Gambar">
                                </fieldset>
                                <fieldset class="form-group floating-label-form-group">
                                    <label class="fw-600">Pilihan Jawaban</label>
                                    @for ($i = 0; $i < 4; $i++)
                                        <div class="form-group mb-0">
                                            <label>Opsi {{ $i + 1 }}</label>
                                            <textarea name="options[{{ $i }}][title]" id="option_{{ $i }}" class="form-control" required></textarea>
                                            <fieldset class="radio">
                                                <label>
                                                    <input type="radio" name="correct_option" value="{{ $i }}"
                                                        {{ $i == 0 ? 'checked' : '' }}>
                                                    Tandai sebagai jawaban benar
                                                </label>
                                            </fieldset>
                                        </div>
                                    @endfor
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
        CKEDITOR.replace('case');
        CKEDITOR.replace('question');
        CKEDITOR.replace('note');
        for (let i = 0; i < 4; i++) {
            CKEDITOR.replace('option_' + i);
        }
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('submit', '#create-kognitif', function(e) {
                e.preventDefault();

                let valid = true;
                let messages = [];

                const caseVal = CKEDITOR.instances['case'].getData().trim();
                const questionVal = CKEDITOR.instances['question'].getData().trim();
                const noteVal = CKEDITOR.instances['note'].getData().trim();

                if (!caseVal) {
                    valid = false;
                    messages.push('📝 Studi Kasus wajib diisi.');
                }
                if (!questionVal) {
                    valid = false;
                    messages.push('❓ Pertanyaan wajib diisi.');
                }
                if (!noteVal) {
                    valid = false;
                    messages.push('📌 Penjelasan wajib diisi.');
                }

                const difficulty = document.getElementById('difficulty').value;
                if (!difficulty || difficulty === 'Pilih Level') {
                    valid = false;
                    messages.push('⚙️ Level wajib dipilih.');
                }

                for (let i = 0; i < 4; i++) {
                    const optionId = 'option_' + i;
                    const content = CKEDITOR.instances[optionId].getData().trim();
                    if (!content) {
                        valid = false;
                        messages.push(`🧩 Opsi ${i + 1} wajib diisi.`);
                    }
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
