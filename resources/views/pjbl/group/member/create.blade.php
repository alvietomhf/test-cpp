<div class="modal-dialog" role="document">
    <form action="{{ route('teacher.pjbl.group.member.store', [$group->id]) }}" method="POST">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Tambah Anggota</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="member">Pilih Siswa</label>
                    <select class="form-control" id="member" name="member"
                        oninvalid="this.setCustomValidity('Mohon diisi dengan lengkap')"
                        oninput="this.setCustomValidity('')" required>
                        <option value="" disabled selected>Pilih Siswa</option>
                        @foreach ($students as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-info">Simpan</button>
            </div>
        </div>
    </form>
</div>
