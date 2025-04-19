@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
    <div class="row p-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="font-weight-bold">List Hasil</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Soal</th>
                                        <th>Percobaan</th>
                                        <th>Skor</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $key => $value)
                                        <tr class="">
                                            <td class="align-middle">{{ $value->competency->title }}</td>
                                            <td class="align-middle">Ke - {{ $value->attempt }}</td>
                                            <td class="align-middle" style="color: {{ $value->passed ? 'green' : 'red' }};">
                                                {{ $value->score ?? '0' }}
                                            </td>
                                            <td class="align-middle">{{ $value->created_at }}</td>
                                            <td class="align-middle">
                                                <button type="button" class="btn btn-info btn-modal rounded"
                                                    data-href="{{ route('student.test.result.show', [$value->competency->slug, $value->id]) }}"
                                                    data-container=".app-modal">Lihat</button>
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
