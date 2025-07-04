@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
    <div class="row match-height p-2">
        <div class="col-12">
            @include('flash::message')
            <table width="100%" class="mb-2">
                <td style="width:1px; padding: 0 10px; white-space: nowrap;">
                    <h3 class="text-dark font-weight-bold">Kelompok Project Based Learning SISWA</h3>
                </td>
                <td>
                    <hr />
                </td>
            </table>
            <div class="row">
                @foreach ($groups as $key => $group)
                    <div class="col-xl-4 col-12">
                        <a class="card p-1" href="{{ route('student.pjbl.group.show', [$group->id]) }}"
                            style="border-bottom: 3px solid #5a3da1">
                            <div class="card-content text-center">
                                <p class="h3 text-dark font-weight-bold">{{ $group->name }}</p>
                                <p class="h4 text-dark">Materi -
                                    {{ $group->question->custom_competency ?? ($group->question->competency_id ? $group->question->competency->title : '') }}
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="modal app-modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true"></div>
@endsection
