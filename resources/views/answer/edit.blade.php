<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel35">Edit Butir Jawaban</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="edit-answer" data-action="{{ route('teacher.butir-jawaban.update', [$competency->slug, $question->id, $data->id]) }}">
            <div class="modal-body">
                <fieldset class="form-group floating-label-form-group">
                    <label for="description">Deskripsi</label>
                    <input
                    oninvalid="this.setCustomValidity('Mohon diisi dengan lengkap')"
                    oninput="this.setCustomValidity('')"
                    type="text" class="form-control" id="description" name="description" placeholder="Deskripsi" required value="{{ $data->description ?? '' }}">
                </fieldset>
                <fieldset class="form-group floating-label-form-group">
                    <label for="score">Poin</label>
                    <input
                    oninvalid="this.setCustomValidity('Mohon diisi dengan lengkap')"
                    oninput="this.setCustomValidity('')"
                    type="text" class="form-control" id="score" name="score" placeholder="Poin" required value="{{ $data->score ?? '' }}">
                </fieldset>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-info">Simpan</button>
            </div>
        </form>
    </div>
</div>