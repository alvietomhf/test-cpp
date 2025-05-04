<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header bg-info">
            <h4 class="modal-title text-white" id="myModalLabel1">Detail Jawaban</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row px-2 mb-n2">
                @foreach ($data->resultDetails as $value)
                    <div class="col-12 border border-info p-1 mb-2" style="border-radius: 10px;">
                        <p><span class="h4 font-weight-bold rounded">Nomor {{ $loop->iteration }}</span></p>

                        <p class="bg-info text-white font-weight-medium text-center px-2 rounded"
                            style="padding: 3px 0px; border-radius: 10px;">Pertanyaan</p>
                        <div>
                            {!! $value->question->case !!}
                            {!! $value->question->question !!}
                        </div>
                        <br>
                        <ul>
                            @foreach ($value->question->options as $opt)
                                <li @if ($opt->correct && $value->option->id == $opt->id) style="background-color: #d1ecf1;"
                                    @elseif ($opt->correct)
                                        style="background-color: #d4edda;"
                                    @elseif ($value->option->id == $opt->id)
                                        style="background-color: #cce5ff;" @endif
                                    class="rounded">
                                    {!! $opt->title !!}
                                </li>
                            @endforeach
                        </ul>

                        <p class="text-center font-weight-bold">
                            <span style="font-size: 12px; padding: 7px; border-radius: 8px;"
                                class="badge {{ $value->correct ? 'badge-success' : 'badge-danger' }}">
                                {{ $value->correct ? 'Jawaban Benar' : 'Jawaban Salah' }}
                            </span>
                        </p>

                        <p class="bg-info text-white font-weight-medium text-center px-2 rounded"
                            style="padding: 3px 0px; border-radius: 10px;">Penjelasan</p>
                        <div>
                            {!! $value->question->note !!}
                        </div>
                    </div>
                @endforeach
                <hr>
                <p class="d-block px-2 font-weight-bold text-center w-100">
                    @php
                        $minutes = floor(($data->timeup / 60) % 60);
                        $seconds = $data->timeup % 60;
                    @endphp
                    Durasi : <span class="text-info">{{ $minutes }} menit
                        {{ $seconds }} detik</span> <span class="d-block">Waktu Habis : <span
                            style="color: {{ $data->is_timeup ? 'red' : 'green' }};">{{ $value->is_timeup ? 'YA' : 'TIDAK' }}</span></span>
                </p>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-info" data-dismiss="modal">Tutup</button>
        </div>
    </div>
</div>
