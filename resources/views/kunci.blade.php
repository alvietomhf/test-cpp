@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
<div class="row match-height">
    <div class="col-md col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Buat Kunci</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" action="{{ route('kunci') }}" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <span>Answer ID</span>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="answer_id">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <span>Detail</span>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea class="form-control" id="detail" name="detail"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9 offset-md-3">
                                    <button type="submit" class="btn btn-info mr-1 mb-1">Kirim</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    const detail = CodeMirror.fromTextArea(
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
    detail.on("change", editor => { editor.save() });
    detail.setSize(null, 400);

    const style = {
        "border": "0",
        "border-top": "2px solid",
        "border-color": "#1995C9",
    }
    $('.CodeMirror.cm-s-solarized.CodeMirror-wrap').css(style);
    $('.CodeMirror.cm-s-default').css({ ...style, padding: '10px 20px' });
</script>
@endsection