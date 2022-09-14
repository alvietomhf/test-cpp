<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header bg-info">
            <h4 class="modal-title text-white" id="myModalLabel1">Hasil Tes</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row px-2 mb-n2">
                @foreach ($data->resultDetails as $value)
                <div class="col-12 border border-info p-1 mb-2">
                    <p><span class="h4 font-weight-bold rounded">Soal {{ $loop->iteration }}</span></p>
                    <p class="bg-info text-white font-weight-medium text-center px-2 rounded" style="padding: 3px 0px;">Analisis</p>
                    <div class="font-weight-bold">{!! $value->question->description !!}</div>
                    @foreach ($value->resultDescriptions as $resultDescription)
                        {{ $resultDescription->description->detail }}
                        <ul>
                            @foreach ($resultDescription->rdFirstAnswers as $rdFirstAnswer)
                                <li>
                                    {{ $rdFirstAnswer->firstAnswer->detail }}
                                    <span class="ml-1" style="color: {{ $rdFirstAnswer->correct ? 'green' : 'red' }};">
                                        {{ $rdFirstAnswer->correct ? '(Benar)' : '(Salah)' }}
                                    </span>
                                </li>
                                @if($rdFirstAnswer->firstAnswer->nested)
                                    <ul>
                                        @foreach ($rdFirstAnswer->rdSecondAnswers as $rdSecondAnswer)
                                            <li>
                                                {{ $rdSecondAnswer->secondAnswer->detail }}
                                                <span class="ml-1" style="color: {{ $rdSecondAnswer->correct ? 'green' : 'red' }};">
                                                    {{ $rdSecondAnswer->correct ? '(Benar)' : '(Salah)' }}
                                                </span>
                                            </li>
                                            @if($rdSecondAnswer->secondAnswer->nested)
                                                <ul>
                                                    @foreach ($rdSecondAnswer->rdThirdAnswers as $rdThirdAnswer)
                                                        <li>
                                                            {{ $rdThirdAnswer->thirdAnswer->detail }}
                                                            <span class="ml-1" style="color: {{ $rdThirdAnswer->correct ? 'green' : 'red' }};">
                                                                {{ $rdThirdAnswer->correct ? '(Benar)' : '(Salah)' }}
                                                            </span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            @endforeach
                        </ul> 
                    @endforeach
                    <hr>
                    <div>
                        <p class="bg-info text-white font-weight-medium text-center px-2 rounded" style="padding: 3px 0px;">Code Siswa</p>
                        <p class="mt-n2 px-2" style="white-space: pre-wrap;">
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
                        <span class="d-block">Output Sesuai : <span style="color: {{ $value->is_output_match ? 'green' : 'red' }};">{{ $value->is_output_match ? 'YA' : 'TIDAK' }}</span></span>
                        <span class="d-block">Waktu Habis : <span style="color: {{ $value->is_timeup ? 'red' : 'green' }};">{{ $value->is_timeup ? 'YA' : 'TIDAK' }}</span></span>
                    </p>
                </div>
                @endforeach
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn grey btn-outline-info" data-dismiss="modal">Tutup</button>
        </div>
    </div>
</div>