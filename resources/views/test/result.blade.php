@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
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
                                    <th>Nilai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($result as $key => $value)
                                <tr class="">
                                    <td class="align-middle">{{ $value->created_at }}</td>
                                    <td class="align-middle">{{ $value->competency->title }}</td>
                                    <td class="align-middle">{{ $value->score ?? '0' }}/100<span style="display: block; color: {{ $value->passed ? 'green' : 'red' }};">{{ $value->passed ? '(Lulus)' : '(Tidak Lulus)' }}</span></td>
                                    <td class="align-middle"><button type="button" class="btn btn-info btn-modal rounded" data-href="{{ route('student.test.result.show', [$value->competency->slug, $value->id]) }}" data-container=".app-modal">Lihat Hasil Tes</button></td>
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
<div class="modal app-modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true"></div>
@endsection