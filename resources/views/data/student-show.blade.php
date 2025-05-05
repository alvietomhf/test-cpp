@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
    <div class="p-2">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                            <h1 class="font-weight-bold mb-2">Data Siswa</h1>
                            <div class="media mb-2">
                                <a class="mr-2" href="javascript:void(0)">
                                    <img src="{{ auth()->user()->avatar ? asset('storage/images/' . auth()->user()->avatar) : asset('assets/images/profile.png') }}"
                                        alt="users avatar" class="users-avatar-shadow rounded-circle" height="64"
                                        width="64">
                                </a>
                            </div>
                            <form novalidate>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Nama</label>
                                                <input type="text" class="form-control" disabled
                                                    value="{{ $data->name ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Username</label>
                                                <input type="text" class="form-control" disabled
                                                    value="{{ $data->username ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>E-mail</label>
                                                <input type="email" class="form-control" disabled
                                                    value="{{ $data->email ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>No Hp</label>
                                                <input type="text" class="form-control" disabled
                                                    value="{{ $data->phone ?? '' }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Kelas</label>
                                                <input type="text" class="form-control" disabled
                                                    value="{{ $data->clas->name ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="font-weight-bold">Hasil Tes</h1>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Soal</th>
                                            <th>Percobaan</th>
                                            <th>Skor</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result as $key => $value)
                                            <tr class="">
                                                <td class="align-middle">{{ $value->created_at }}</td>
                                                <td class="align-middle">
                                                    {{ $value->competency ? ($value->competency->id === 4 ? 'Post Test' : 'Play Ground : ' . $value->competency->title) : 'Pre Test' }}
                                                </td>
                                                <td class="align-middle">Ke - {{ $value->attempt }}</td>
                                                <td class="align-middle">
                                                    {{ round((($value->score ?? 0) / ($value->competency ? ($value->competency->id === 4 ? $maxScoreCode : $maxScorePlayground) : $maxScoreMcq)) * 100) }}
                                                </td>
                                                <td class="align-middle">
                                                    @if ($value->type === 'code')
                                                        <button type="button" class="btn btn-info btn-modal rounded"
                                                            data-href="{{ route('teacher.result.show', [$value->competency->slug, $value->id]) }}"
                                                            data-container=".app-modal">Lihat</button>
                                                    @else
                                                        <button type="button" class="btn btn-info btn-modal rounded"
                                                            data-href="{{ route('teacher.result.kognitif.show', [$data->clas->id, $value->id]) }}"
                                                            data-container=".app-modal">Lihat</button>
                                                    @endif
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
    </div>
    <div class="modal app-modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true"></div>
@endsection
