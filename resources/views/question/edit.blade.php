<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel35">Edit Pertanyaan</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="edit-question" data-action="{{ route('teacher.pertanyaan.update', [$competency->slug, $data->id]) }}">
            <div class="modal-body">
                <fieldset class="form-group floating-label-form-group">
                    <label for="description">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="5" placeholder="Description">{!! $data->description ?? '' !!}</textarea>
                </fieldset>
                <fieldset class="form-group floating-label-form-group">
                    <label for="output">Output</label>
                    <textarea class="form-control" id="output" name="output" rows="5" placeholder="Output">{!! $data->output ?? '' !!}</textarea>
                </fieldset>
                <fieldset class="form-group floating-label-form-group">
                    <label for="image">Gambar Output <span class="d-inline-block" style="transform: scale(0.7); color: gray">(optional)</span></label>
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