@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
    <section id="configuration" class="p-2">
        <div class="row justify-content-center">
            <div class="col-12">
                @include('flash::message')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Anggota Kelompok {{ $group->name ?? '' }} - <span
                                class="badge badge-warning badge-pill">{{ count($member) }}/{{ $group->max_member }}</span>
                        </h4>
                        @if (count($member) < $group->max_member)
                            <div class="card-subtitle float-right">
                                <a class="btn btn-info btn-modal" href="javascript:void(0);"
                                    data-href="{{ route('teacher.pjbl.group.member.create', [$group->id]) }}"
                                    data-container=".app-modal"><i class="ft-plus"></i> Tambah</a>
                            </div>
                        @endif
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration datatable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Sebagai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($member as $key => $value)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $value->user->name ?? '' }}</td>
                                                <td>{{ $value->is_leader ? 'Ketua' : 'Anggota' }}</td>
                                                <td>
                                                    @if ($value->is_leader)
                                                        -
                                                    @else
                                                        <form method="POST"
                                                            action="{{ route('teacher.pjbl.group.member.lead', [$group->id]) }}"
                                                            style="display:inline;">
                                                            @csrf
                                                            <input type="hidden" name="user_id"
                                                                value="{{ $value->user->id }}">
                                                            <button type="submit" class="btn btn-success btn-sm">
                                                                <i class="ft-edit-2"></i> Set Ketua
                                                            </button>
                                                        </form>
                                                        <button
                                                            data-href="{{ route('teacher.pjbl.group.member.destroy', [$group->id, $value->id]) }}"
                                                            class="btn btn-danger btn-sm btn-delete"><i
                                                                class="ft-trash-2"></i>
                                                            Hapus</button>
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
    </section>
    <div class="modal app-modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true"></div>
@endsection
