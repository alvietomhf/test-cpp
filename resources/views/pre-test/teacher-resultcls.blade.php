@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
    <div class="row p-2">
        <div class="col-12">
            <div class="row breadcrumbs-top mb-1">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('teacher.result') }}" style="color: grey"><i
                                    class="ft ft-arrow-left"></i> Kembali</a>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="font-weight-bold">List Hasil {{ $clas->name }}</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="table">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Skor</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $key => $value)
                                        <tr class="">
                                            <td class="align-middle">{{ $value->user->name }}</td>
                                            <td class="align-middle">
                                                {{ round((($value->score ?? 0) / $maxScoreMcq) * 100) }}
                                            </td>
                                            <td class="align-middle">{{ $value->created_at }}</td>
                                            <td class="align-middle">
                                                <button type="button" class="btn btn-info btn-modal rounded"
                                                    data-href="{{ route('teacher.result.kognitif.show', [$clas->id, $value->id]) }}"
                                                    data-container=".app-modal">Lihat</button>
                                            </td>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal app-modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true"></div>
@endsection

@section('js')
    <script>
        $('#table').dataTable({
            "order": [],
        });
    </script>
@endsection
