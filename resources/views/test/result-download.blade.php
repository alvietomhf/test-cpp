<div style="background-color: white; width: 100%;">
    <div style="background-color: #1e45f2; color: white; font-weight: 700; text-align: center; padding: 20px; margin-bottom: 10px;">
        Hasil Tes ({{ $data->attempt }}) | {{ $competency->title }} | {{ $data->created_at }}
    </div>
    <div style="margin-bottom: -10px; padding-right: 50px;">
        @foreach ($data->resultDetails as $value)
        <div style="width: 100%; margin-bottom: 20px; padding: 10px 25px; outline: 2px solid #1e9ff2; outline-offset: -2px;">
            <p><span style="font-weight: 700; padding: 5px; border-radius: 5px">Soal {{ $loop->iteration }}</span></p>
            <p style="background-color: #1e9ff2; color: white; text-align: center; padding: 3px 2px; border-radius: 5px">Analisis</p>
            <div style="margin-top: -10px; font-weight: 700;">
                {!! $value->question->description ?? '' !!}
            </div>
            @foreach ($value->resultDescriptions as $resultDescription)
                {{ $resultDescription->description->detail }}
                <ul>
                    @foreach ($resultDescription->rdFirstAnswers as $rdFirstAnswer)
                        <li>
                            {{ $rdFirstAnswer->firstAnswer->detail }}
                            <span style="margin-left: 10px; color: {{ $rdFirstAnswer->correct ? 'green' : 'red' }};">
                                {{ $rdFirstAnswer->correct ? '(Benar)' : '(Salah)' }}
                            </span>
                        </li>
                        @if($rdFirstAnswer->firstAnswer->nested)
                            <ul>
                                @foreach ($rdFirstAnswer->rdSecondAnswers as $rdSecondAnswer)
                                    <li>
                                        {{ $rdSecondAnswer->secondAnswer->detail }}
                                        <span style="margin-left: 10px; color: {{ $rdSecondAnswer->correct ? 'green' : 'red' }};">
                                            {{ $rdSecondAnswer->correct ? '(Benar)' : '(Salah)' }}
                                        </span>
                                    </li>
                                    @if($rdSecondAnswer->secondAnswer->nested)
                                        <ul>
                                            @foreach ($rdSecondAnswer->rdThirdAnswers as $rdThirdAnswer)
                                                <li>
                                                    {{ $rdThirdAnswer->thirdAnswer->detail }}
                                                    <span style="margin-left: 10px; color: {{ $rdThirdAnswer->correct ? 'green' : 'red' }};">
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
                <p style="background-color: #1e9ff2; color: white; text-align: center; padding: 3px 2px; border-radius: 5px">Code Siswa</p>
                <p style="white-space: pre-wrap; padding: 0px 25px; margin-top: -15px">
                    {{ $value->answer ?? '' }}
                </p>
            </div>
            <hr>
            <div style="display: block; font-weight: 700; text-align: center; margin-top: 10px; margin-bottom: 10px">
                @php
                $minutes = floor(($value->timeup / 60) % 60);
                $seconds = $value->timeup % 60;
                @endphp
                <span>Code siswa dikerjakan dalam <span style="color: #1e9ff2">{{ $minutes }} menit {{ $seconds }} detik</span></span>
                <span style="display: block">Hasil Running Code : <span style="color: {{ $value->is_success ? 'green' : 'red' }};">{{ $value->is_success ? 'SUKSES' : 'GAGAL' }}</span></span>
                <span style="display: block">Output Sesuai : <span style="color: {{ $value->is_output_match ? 'green' : 'red' }};">{{ $value->is_output_match ? 'YA' : 'TIDAK' }}</span></span>
                <span style="display: block">Waktu Habis : <span style="color: {{ $value->is_timeup ? 'red' : 'green' }};">{{ $value->is_timeup ? 'YA' : 'TIDAK' }}</span></span>
            </div>
        </div>
        @endforeach
    </div>
</div>