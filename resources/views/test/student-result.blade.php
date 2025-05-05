@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
    @php
        $resultCount = count($result);
    @endphp
    @if ($resultCount)
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
                                                <td class="align-middle">
                                                    {{ $value->competency ? ($value->competency->id === 4 ? 'Post Test' : 'Play Ground : ' . $value->competency->title) : 'Pre Test' }}
                                                </td>
                                                <td class="align-middle">Ke - {{ $value->attempt }}</td>
                                                <td class="align-middle">
                                                    {{ round((($value->score ?? 0) / ($value->competency ? ($value->competency->id === 4 ? $maxScoreCode : $maxScorePlayground) : $maxScoreMcq)) * 100) }}
                                                </td>
                                                <td class="align-middle">{{ $value->created_at }}</td>
                                                <td class="align-middle">
                                                    @if ($value->type === 'code')
                                                        <button type="button" class="btn btn-info btn-modal rounded"
                                                            data-href="{{ route('student.test.result.show', [$value->competency->slug, $value->id]) }}"
                                                            data-container=".app-modal">Lihat</button>
                                                        @if ($value->competency->id === 4)
                                                            <button type="button" class="btn btn-warning btn-modal rounded"
                                                                data-href="{{ route('student.test.rubric.show', [$value->competency->slug, $value->id]) }}"
                                                                data-container=".app-modal">Rubrik</button>
                                                        @endif
                                                    @else
                                                        <button type="button" class="btn btn-info btn-modal rounded"
                                                            data-href="{{ route('student.pretest.result.show', $value->id) }}"
                                                            data-container=".app-modal">Lihat</button>
                                                    @endif
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
    @else
        <div class="d-flex justify-content-center align-items-center mt-2">
            <div class="card col-12 col-md-6" style="border: 1px solid #5a3da1">
                <h1 class="p-2 font-bold text-center">Belum ada hasil pengerjaan</h1>
            </div>

        </div>
    @endif
    <div class="modal app-modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true"></div>
@endsection
