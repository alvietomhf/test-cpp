@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
<div class="row match-height">
    <div class="col-12">
        <table width="100%" class="mb-2">
            <td style="width:1px; padding: 0 10px; white-space: nowrap;"><h3 class="text-dark font-weight-bold">HASIL TES SISWA</h3></td>
            <td><hr /></td>
        </table>
        <div class="row">
            @foreach ($clas as $key => $value)
            <div class="col-xl-3 col-12">
                <a class="card p-1" href="{{ route('teacher.result.clas', [$value->id]) }}" style="border-bottom: 3px solid #1995C9">
                    <div class="card-content text-center">
                        <p class="h3 text-dark font-weight-bold">{{ $value->name }}</p>
                        <p class="h4 text-dark">TA. {{ $value->season }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="modal app-modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true"></div>
@endsection