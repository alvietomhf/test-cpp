@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
@php
    $resultCount = count($result);
@endphp
@if ($resultCount)
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="font-weight-bold">Hasil Tes</h4>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Waktu</th>
                                        <th>Tes</th>
                                        <th>Percobaan</th>
                                        <th>Nilai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($result as $key => $value)
                                    <tr class="">
                                        <td class="align-middle">{{ $value->created_at }}</td>
                                        <td class="align-middle">{{ $value->competency->title }}</td>
                                        <td class="align-middle">Ke - {{ $value->attempt }}</td>
                                        <td class="align-middle">{{ $value->score ?? '0' }}/100<span style="display: block; color: {{ $value->passed ? 'green' : 'red' }};">{{ $value->passed ? '(Lulus)' : '(Tidak Lulus)' }}</span></td>
                                        <td class="align-middle">
                                            <button type="button" class="btn btn-info btn-modal rounded" data-href="{{ route('student.test.result.show', [$value->competency->slug, $value->id]) }}" data-container=".app-modal">Lihat Hasil Tes</button>
                                            <button type="button" class="btn btn-warning btn-modal rounded" onclick="window.location.href = this.dataset.href" data-href="{{ route('student.test.result.download', [$value->competency->slug, $value->id]) }}">Download Hasil Tes</button></td>
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
    <div class="d-flex justify-content-center align-items-center">
        <div class="card col-12 col-md-6" style="border: 1px solid #1995C9">
            <h1 class="p-2 font-bold text-center">Belum ada hasil tes</h1>
        </div>

    </div>
@endif
<div class="modal app-modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true"></div>
@endsection