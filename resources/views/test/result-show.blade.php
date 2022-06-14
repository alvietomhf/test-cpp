<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header bg-info">
            <h4 class="modal-title text-white" id="myModalLabel1">Hasil Tes</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                @foreach ($data->resultDetails as $value)
                <div class="col-12">
                    <p class="h4 font-weight-bold">Soal {{ $loop->iteration }}</p>
                    <div>
                        {!! $value->question->description ?? '' !!}
                    </div>
                    <hr>
                    <div>
                        <p class="bg-info text-white text-center px-2" style="padding: 3px 0px;">Code Siswa</p>
                        <p class="mt-n2 px-2" style="white-space: pre-line;">
                            {{ $value->answer ?? '' }}
                        </p>
                    </div>
                    <hr>
                    <p class="d-block px-2 font-weight-bold text-center">
                        @php
                        $minutes = floor(($value->timeup / 60) % 60);
                        $seconds = $value->timeup % 60;
                        @endphp
                        Code siswa dikerjakan dalam <span class="text-info">{{ $minutes }} menit {{ $seconds }} detik</span>
                        <span class="d-block">Hasil Running Code : <span style="color: {{ $value->is_success ? 'green' : 'red' }};">{{ $value->is_success ? 'SUKSES' : 'GAGAL' }}</span></span>
                        <span class="d-block">Waktu Habis : <span style="color: {{ $value->is_timeup ? 'red' : 'green' }};">{{ $value->is_timeup ? 'YA' : 'TIDAK' }}</span></span>
                    </p>
                    <hr>
                    <div>
                        <p class="bg-info text-white text-center px-2" style="padding: 3px 0px;">Hasil Analisis Jawaban</p>
                        <ul>
                            @foreach ($value->resultDetailAnswers as $val)
                            <li>{{ $val->answer->description }} <span style="color: {{ $val->correct ? 'green' : 'red' }};">{{ $val->correct ? 'Benar' : 'Salah' }}</span></li>
                            @endforeach
                        </ul>
                    </div>
                    @if ($loop->iteration !== $data->result_details_count)
                    <div class="divider bg-dark"><hr></div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-info" data-dismiss="modal">Tutup</button>
        </div>
    </div>
</div>