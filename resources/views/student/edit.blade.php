<div class="modal-dialog" role="document">
    <form id="edit-student" data-action="{{ route('admin.siswa.update', [$kelasId, $data->id]) }}">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Edit Siswa</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input
                            oninvalid="this.setCustomValidity('Mohon diisi dengan lengkap')"
                            oninput="this.setCustomValidity('')"
                            type="text" id="name" class="form-control" value="{{ $data->name ?? '' }}" placeholder="Thomas Shelby" name="name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input
                            oninvalid="this.setCustomValidity('Mohon diisi dengan lengkap')"
                            oninput="this.setCustomValidity('')"
                            type="text" id="username" class="form-control" value="{{ $data->username ?? '' }}" placeholder="thomas123" name="username" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email <span class="d-inline-block" style="transform: scale(0.7); color: gray">(optional)</span></label>
                            <input type="email" id="email" class="form-control" value="{{ $data->email ?? '' }}" placeholder="thomas@gmail.com" name="email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Nomor HP <span class="d-inline-block" style="transform: scale(0.7); color: gray">(optional)</span></label>
                            <input
                            oninvalid="this.setCustomValidity('Mohon diisi dengan lengkap')"
                            oninput="this.setCustomValidity('')"
                            type="text" id="phone" class="form-control" value="{{ $data->phone ?? '' }}" placeholder="082234897654" name="phone">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="password">Password <span class="d-inline-block" style="transform: scale(0.7); color: gray">(optional)</span></label>
                        <div class="form-group position-relative has-icon-right">
                            <input
                            type="password" id="password" class="form-control" placeholder="Password" name="password">
                            <div class="form-control-position">
                                <i toggle="#password-field" class="ft-eye font-medium-5 line-height-1 text-muted icon-align toggle-password"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="password_confirmation">Konfirmasi Password <span class="d-inline-block" style="transform: scale(0.7); color: red">*password</span></label>
                        <div class="form-group position-relative has-icon-right">
                            <input
                            type="password" id="password_confirmation" class="form-control" placeholder="Password" name="password_confirmation">
                            <div class="form-control-position">
                                <i toggle="#password-field" class="ft-eye font-medium-5 line-height-1 text-muted icon-align toggle-confirm-password"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-info">Simpan</button>
            </div>
        </div>
    </form>
</div>