@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
<div class="row match-height">
    <div class="col-md col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Buat Pertanyaan</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" action="{{ route('pertanyaan') }}" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <span>Kompetensi ID</span>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="competency_id">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <span>Gambar</span>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="images[]">
                                        </div>
                                    </div>
                                </div>
                                <div id="desc" class="col-12">
                                    <div class="form-group row">
                                        <div class="col-md-3">
                                            <span>Deskripsi</span>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea class="form-control" id="description" name="description"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9 offset-md-3">
                                    <button type="submit" class="btn btn-info mr-1 mb-1">Kirim</button>
                                    <button type="button" id="image" class="btn btn-info mr-1 mb-1">Tambah Input Gambar</button>
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
    CKEDITOR.replace('description');

    const elImage = `
        <div class="col-12">
            <div class="form-group row">
                <div class="col-md-3">
                    <span>Gambar</span>
                </div>
                <div class="col-md-9">
                    <input type="text" class="form-control" name="images[]">
                </div>
            </div>
        </div>
    `

    $('#image').on('click', function(e) {
        e.preventDefault();

        $(elImage).insertBefore('#desc');
    })
</script>
@endsection