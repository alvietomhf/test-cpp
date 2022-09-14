<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="myModalLabel35">Edit Kunci Jawaban</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="edit-third-key" data-action="{{ route('teacher.kj-ketiga.update', [$secondAnswer->id, $thirdAnswer->id, $data->id]) }}">
            <div class="modal-body">
                <fieldset class="form-group floating-label-form-group">
                    <label for="detail">Detail</label>
                    <textarea class="form-control" id="detail" name="detail"></textarea>
                </fieldset>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-info">Simpan</button>
            </div>
        </form>
    </div>
</div>
<script>
    var detailData = @json($data->detail);
    var cm = CodeMirror.fromTextArea(
        document.getElementById('detail'), {
            mode: "text/x-c++src",
            theme: "solarized",
            lineNumbers: true,
            autoRefresh:true,
            lineWrapping: true,
            indentWithTabs: true,
            tabMode: "indent",
            tabSize: 4,
            indentUnit: 4,
            autoCloseBrackets: true,
            matchBrackets: true,
            styleActiveLine: true,
            styleActiveSelected: true,
        }
    )
    cm.setValue(detailData);
    cm.on("change", editor => { editor.save() });
    cm.setSize(null, 250);

    var style = {
        "border": "0",
        "border-top": "2px solid",
        "border-color": "#1995C9",
    }
    $('.CodeMirror.cm-s-solarized.CodeMirror-wrap').css(style);
    $('.CodeMirror.cm-s-default').css({ ...style, padding: '10px 20px' });
</script>