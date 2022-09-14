<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel35">Tambah Pertanyaan</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="create-question" data-action="{{ route('teacher.pertanyaan.store', [$competency->slug]) }}">
            <div class="modal-body">
                <fieldset class="form-group floating-label-form-group">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="5" placeholder="Description"></textarea>
                </fieldset>
                <fieldset class="form-group floating-label-form-group">
                    <label for="output">Output</label>
                    <textarea class="form-control" id="output" name="output" rows="5" placeholder="Output"></textarea>
                </fieldset>
                <fieldset class="form-group floating-label-form-group">
                    <label for="image">Gambar Output</label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="Image">
                </fieldset>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-info">Simpan</button>
            </div>
        </form>
    </div>
</div>
<script>
    CKEDITOR.replace('description');
</script>