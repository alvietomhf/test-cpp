<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel35">Edit Jawaban</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="edit-second-answer" data-action="{{ route('teacher.jawaban-kedua.update', [$description->id, $firstAnswer->id, $data->id]) }}">
            <div class="modal-body">
                <fieldset class="form-group floating-label-form-group">
                    <label for="detail">Detail</label>
                    <input
                    oninvalid="this.setCustomValidity('Mohon diisi dengan lengkap')"
                    oninput="this.setCustomValidity('')"
                    type="text" class="form-control" id="detail" name="detail" placeholder="Detail" required value="{{ $data->detail ?? '' }}">
                </fieldset>
                <fieldset class="form-group floating-label-form-group">
                    <label for="score">Poin</label>
                    <input
                    oninvalid="this.setCustomValidity('Mohon diisi dengan lengkap')"
                    oninput="this.setCustomValidity('')"
                    type="text" class="form-control" id="score" name="score" placeholder="Poin" required value="{{ $data->score ?? '' }}">
                </fieldset>
                <fieldset class="form-group floating-label-form-group">
                    <label for="nested">Nested</label>
                    <label class="d-block">
                        <input type="radio" name="nested" id="nested" value="true" {{ $data->nested ? 'checked' : '' }}>
                        Ya
                    </label>
                    <label class="d-block">
                        <input type="radio" name="nested" id="nested" value="false" {{ !$data->nested ? 'checked' : '' }}>
                        Tidak
                    </label>
                </fieldset>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-info">Simpan</button>
            </div>
        </form>
    </div>
</div>