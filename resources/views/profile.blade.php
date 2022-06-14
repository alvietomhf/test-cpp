@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
@include('flash::message')
<section class="users-edit">
    <div class="card d-flex justify-content-center align-items-center">
        <div class="card-content col-12 col-xl-8">
            <div class="card-body">
                <form id="edit-profile" data-action="{{ route('profile.update') }}">
                    <div class="media mb-2">
                        <a class="mr-2" href="javascript:void(0);">
                            <img src="{{ $data->avatar ? asset('storage/images/' . $data->avatar) : asset('assets/images/portrait/small/avatar-s-23.png') }}" alt="users avatar" class="users-avatar-shadow rounded-circle" height="64" width="64" id="blah">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">Avatar</h4>
                            <div id="btn-upload" class="col-12 px-0 d-flex">
                                <label id="lbl-avatar" class="btn btn-sm btn-info mr-25" for="image-upload">Upload</label>
                                <input type="file" class="form-control" name="avatar" id="image-upload" onchange="onChangeFile(this)" hidden>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div class="controls">
                                    <label for="name">Nama</label>
                                    <input
                                    oninvalid="this.setCustomValidity('Mohon diisi dengan lengkap')"
                                    oninput="this.setCustomValidity('')"
                                    type="text" id="name" class="form-control" placeholder="Nama" name="name" value="{{ $data->name ?? '' }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label for="username">Username</label>
                                    <input
                                    oninvalid="this.setCustomValidity('Mohon diisi dengan lengkap')"
                                    oninput="this.setCustomValidity('')"
                                    type="text" id="username" class="form-control" placeholder="username" name="username" value="{{ $data->username ?? '' }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label for="email">Email</label>
                                    <input
                                    oninvalid="this.setCustomValidity('Mohon diisi dengan lengkap')"
                                    oninput="this.setCustomValidity('')"
                                    type="email" id="email" class="form-control" placeholder="email@email.com" name="email" value="{{ $data->email ?? '' }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label for="phone">Nomor HP</label>
                                    <input
                                    oninvalid="this.setCustomValidity('Mohon diisi dengan lengkap')"
                                    oninput="this.setCustomValidity('')"
                                    type="text" id="phone" class="form-control" placeholder="08123456789" name="phone" value="{{ $data->phone ?? '' }}" required">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label for="password">Password</label><small> (opsional)</small>
                                    <div class="form-group position-relative has-icon-right">
                                        <input type="password" id="password" class="form-control" placeholder="Password" name="password">
                                        <div class="form-control-position">
                                            <i toggle="#password-field" class="ft-eye font-medium-5 ml-n1 line-height-1 text-muted icon-align toggle-password"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="controls">
                                    <label for="password_confirmation">Konfirmasi Password</label><small> (opsional)</small>
                                    <div class="form-group position-relative has-icon-right">
                                        <input type="password" id="password_confirmation" class="form-control" placeholder="Password" name="password_confirmation">
                                        <div class="form-control-position">
                                            <i toggle="#password-field" class="ft-eye font-medium-5 ml-n1 line-height-1 text-muted icon-align toggle-confirm-password"></i>
                                        </div>
                                    </div>
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
    const originSrc = document.getElementById('blah').src

    // Toogle Password
    $(document).on('click', '.toggle-password', function() {
        $(this).toggleClass('ft-eye-off')
        const input = $('#password')
        input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
    })
    $(document).on('click', '.toggle-confirm-password', function() {
        $(this).toggleClass('ft-eye-off')
        const input2 = $('#password_confirmation')
        input2.attr('type') === 'password' ? input2.attr('type','text') : input2.attr('type','password')
    })

    function onChangeFile(e) {
        if (e.files[0]) {
            document.getElementById('blah').src = window.URL.createObjectURL(e.files[0])
        } else {
            document.getElementById('blah').src = originSrc
            e.value = []
        }
    }

    $(document).ready(function () {
        // Update
        $(document).on('submit', '#edit-profile', function(e) {
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
                success: function (res) {
                    if (res.status) {
                        window.location.href = res.url
                    }
                },
                error: function (err) {
                    $.each(err.responseJSON.data, function(key, error) {
                        if (key === 'avatar') {
                            $(document).find(`[id=btn-upload]`).after(`<small class="text-danger text-error">${error}</small>`)
                        } else {
                            $(document).find(`[name=${key}]`).after(`<small class="text-danger text-error">${error}</small>`)
                        }
                    })
                },
            });
        })
    })
</script>
@endsection