@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
<section id="configuration">
    <div class="row justify-content-center">
        <div class="col-12">
            @include('flash::message')
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Kelas</h4>
                    <div class="card-subtitle float-right">
                        <a class="btn btn-info btn-modal" href="javascript:void(0);" data-href="{{ route('admin.kelas.create') }}" data-container=".app-modal"><i class="ft-plus"></i> Tambah</a>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $value->name ?? '' }}</td>
                                        <td>{{ $value->season ?? '' }}</td>
                                        <td>
                                            <a href="{{ route('admin.siswa.index', [$value->id]) }}" class="btn btn-primary btn-sm"><i class="ft-eye"></i> Siswa</a>
                                            <button data-href="{{ route('admin.kelas.edit', [$value->id]) }}" data-container=".app-modal" class="btn btn-success btn-sm btn-modal"><i class="ft-edit-2"></i> Ubah</button>
                                            <button data-href="{{ route('admin.kelas.destroy', [$value->id]) }}" class="btn btn-danger btn-sm btn-delete"><i class="ft-trash-2"></i> Hapus</button> 
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
<div class="modal app-modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true"></div>
@endsection