<div style="background-color: whitesmoke; width: 100%">
    <div style="background-color: #1319c7; color: white; padding: 20px; font-weight: 700; text-align: center; border-bottom: 5px solid red">
        Hasil Tes ({{ $data->attempt }}) | {{ $competency->title }} | {{ $data->created_at }}
    </div>
    <div style="padding-left: 20px; padding-right: 20px">
        @foreach ($data->resultDetails as $value)
        <div style="width: 100%;">
            <p><span style="font-weight: 700; background-color: yellow; padding: 5px; border-radius: 5px">Soal {{ $loop->iteration }}</span></p>
            <div style="margin-top: -30px">
                {!! $value->question->description ?? '' !!}
            </div>
            <hr>
            <div>
                <p style="background-color: #1e9ff2; color: white; text-align: center; padding-left: 2px; padding-right: 2px; padding-top: 3px; padding-bottom: 3px; border-radius: 5px">Code Siswa</p>
                <p style="white-space: pre-line; padding: 0px 25px; margin-top: -15px">
                    {{ $value->answer ?? '' }}
                </p>
            </div>
            <hr>
            <div style="display: block; font-weight: 700; text-align: center; margin-top: 10px; margin-bottom: 10px">
                @php
                $minutes = floor(($value->timeup / 60) % 60);
                $seconds = $value->timeup % 60;
                @endphp
                Code siswa dikerjakan dalam <span style="color: #1e9ff2">{{ $minutes }} menit {{ $seconds }} detik</span>
                <span style="display: block">Hasil Running Code : <span style="color: {{ $value->is_success ? 'green' : 'red' }};">{{ $value->is_success ? 'SUKSES' : 'GAGAL' }}</span></span>
                <span style="display: block">Waktu Habis : <span style="color: {{ $value->is_timeup ? 'red' : 'green' }};">{{ $value->is_timeup ? 'YA' : 'TIDAK' }}</span></span>
            </div>
            <hr>
            <div>
                <p style="padding: 3px 2px; background-color: #1e9ff2; color: white; text-align: center; border-radius: 5px">Hasil Analisis Jawaban</p>
                <ul>
                    @foreach ($value->resultDetailAnswers as $val)
                    <li>{{ $val->answer->description }} <span style="color: {{ $val->correct ? 'green' : 'red' }};">{{ $val->correct ? 'Benar' : 'Salah' }}</span></li>
                    @endforeach
                </ul>
            </div>
            @if ($loop->iteration !== $data->result_details_count)
            <hr style="border: none; height: 3px; background-color: black">
            @endif
        </div>
        @endforeach
    </div>
</div>