@extends('layouts.app')

@section('css')
<style>
    input:focus {
        outline: solid 1px #1e9ff2;
    }
</style>
@endsection

@section('body')
<body class="vertical-layout vertical-menu 1-column   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="1-column">
@endsection

@section('content')
<div class="card p-2" style="">
    <div class="bg-info p-1 rounded text-white text-center font-weight-bold">
        TES UJI KOMPETENSI PEMROGRAMAN C++
    </div>
    @php
        $questionCount = count($data);
    @endphp
    @foreach ($data as $key => $value)
    <div class="row justify-content-center tab" data-question="{{ $value->id }}" style="display: none;">
        <div class="col-md-4 col-12 d-flex flex-column justify-content-between p-1 pt-2">
            <input type="hidden" class="success" id="success-{{ $key + 1 }}" value="false">
            <div>
                <div class="d-flex flex-xl-row flex-column justify-content-between" style="border-bottom: 2px solid; border-color: #1995C9">
                    <p class="font-weight-bold">Pertanyaan {{ $key + 1 }} dari {{ $questionCount }}</p>
                    <p class="">waktu tersisa : <span class="timer">20 menit 0 detik</span></p>
                </div>
                <div class="mt-2">
                    <div class="font-weight-bold">{!! $value->description !!}</div>
                    @foreach ($value->descriptions as $description)
                        {{ $description->detail }}
                        <ul>
                            @foreach ($description->firstAnswers as $firstAnswer)
                                <li>{{ $firstAnswer->detail }}</li>
                                @if($firstAnswer->nested)
                                    <ul>
                                        @foreach ($firstAnswer->secondAnswers as $secondAnswer)
                                            <li>{{ $secondAnswer->detail }}</li>
                                            @if($secondAnswer->nested)
                                                <ul>
                                                    @foreach ($secondAnswer->thirdAnswers as $thirdAnswer)
                                                        <li>{{ $thirdAnswer->detail }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        @endforeach
                                    </ul>
                                @endif
                            @endforeach
                        </ul> 
                    @endforeach
                    <p>Output sebagai berikut :</p>
                    <img src="{{ asset('storage/images/' . json_decode($value->image)[0]) }}" alt="Output Question" style="width: 230px; height: 130px;">
                </div>
            </div>
            <div class="d-flex flex-lg-row flex-column mt-md-0 mt-2 align-items-lg-center justify-content-lg-between">
                <button type="submit" id="nextBtn-{{ $key + 1 }}" class="btn btn-info px-3 rounded btn-next">Next</button>
            </div>
        </div>
        <div class="col-md-8 col-12 p-1 pt-2" style="background-color: #F5F5F5;">
            <p>cpp gcc 11.1.0</p>
            <div>
                <div class="form-group">
                    <textarea class="script" id="script-{{ $key + 1 }}" name="script" required="required"></textarea>
                </div>
                <div class="d-flex flex-column flex-sm-row align-items-sm-center">
                    <div class="{{ $value->input ? 'd-block' : 'd-none' }}  mr-0 mr-sm-5 mb-1 mb-sm-0">
                        <label for="input-{{ $key + 1 }}">Input : </label>
                        <input id="input-{{ $key + 1 }}" type="text" style="padding: 5px; border: 1px solid #1995C9;">
                    </div>
                    <button type="submit" id="run-{{ $key + 1 }}" class="btn btn-info btn-run"><i class="ft-play" aria-hidden="true"></i> Run Code</button>
                </div>
            </div>
            <div class="form-group mt-2">
                <textarea class="result" id="result-{{ $key + 1 }}" disabled></textarea>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('js')
<script type="text/javascript">
    const minuteDuration = 20;
    let timeDurationArr = [];
    let submitted = false;

    document.addEventListener('copy', function(e) {
        e.preventDefault();
    });

    $(document).ready(function() {
        let currentTab = 0;
        showTab(currentTab);

        // Code Mirror
        let textScript = document.getElementsByClassName("script");
        let textResult = document.getElementsByClassName("result");
        let editors = [];
        let results = [];

        for (let i = 0; i < textScript.length ; i++) {
            // Editors
            editors[i] = CodeMirror.fromTextArea($(textScript[i])[0], {
                mode: "text/x-c++src",
                theme: "solarized",
                lineNumbers: true,
                autoRefresh:true,
                lineWrapping: true,
                indentWithTabs: true,
                tabMode: "indent",
                tabSize: 4,
                indentUnit: 4,
                autoCloseBrackets: true,
                matchBrackets: true,
                styleActiveLine: true,
                styleActiveSelected: true,
            });
            editors[i].on("change", editor => { editor.save() });
            editors[i].setOption('placeholder', 'Tulis kode disini...');
            editors[i].on("beforeChange", function(_, change) {
                if (change.origin == "paste") change.cancel()
            });
            editors[i].setSize(null, 400);

            // Results
            results[i] = CodeMirror.fromTextArea($(textResult[i])[0], {
                readOnly: true,
            });
            results[i].on("change", result => { result.save() });
            results[i].setOption('placeholder', 'Hasil running akan keluar disini.');
            results[i].setSize(null, 200);
        }

        // Timer
        function countdown(minutes, seconds, prevTab) {
            const x = document.getElementsByClassName("tab");
            const el = document.getElementsByClassName("timer");
            const currentTimerEl = el[prevTab];

            const interval = setInterval(function() {
                if (minutes == 0 && seconds == 7 && currentTab === prevTab && currentTab === (x.length - 1) && !submitted) runCode(currentTab + 1);

                if (seconds == 0) {
                    if (minutes == 0) {
                        clearInterval(interval);

                        if (currentTab === prevTab) {
                            if (currentTab === (x.length - 1)) {
                                if (submitted) return;
                                submitted = true;

                                if (Swal.isVisible()) {
                                    Swal.close();
                                }

                                Swal.fire({
                                    icon: 'success',
                                    title: 'Waktu pengerjaan habis!',
                                    text: 'Halaman akan dialihkan dalam 3 detik',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                }).then((result) => {
                                    const successEl = document.getElementsByClassName("success");

                                    timeDurationArr.push({
                                        timeUp: minuteDuration * 60,
                                        isTimeUp: true,
                                    });

                                    const data = editors.map((editor, i) => {
                                        const id = x[i].dataset.question;
                                        const time = timeDurationArr[i];
                                        const script = editor.getValue();
                                        const result = results[i].getValue();
                                        const success = successEl[i].value;

                                        return {
                                            id,
                                            script,
                                            result,
                                            time,
                                            success,
                                        };
                                    });

                                    $.ajax({
                                        url: "{{ route('student.test.store', [$competency->slug]) }}",
                                        data: { data },
                                        type: 'POST',
                                        headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
                                        datatype: 'JSON',
                                        success: function (res) {
                                            window.location.href = "{{ route('dashboard') }}"
                                        },
                                        error: function (err) {
                                            console.log(err)
                                        }
                                    });
                                });
                            } else {
                                nextPrev(1, true);
                            }
                        }

                        return;
                    } else {
                        minutes--;
                        seconds = 60;
                    }
                }

                const text = `${minutes} menit ${seconds} detik`;
                currentTimerEl.innerHTML = text;

                seconds--;
            }, 1000);
        }

        // Wizard
        function showTab(n) {
            const x = document.getElementsByClassName("tab");
            x[n].style.display = "flex";

            const button = document.getElementById(`nextBtn-${currentTab + 1}`);
            if (n == (x.length - 1)) {
                button.insertAdjacentHTML('beforebegin', '<span>*otomatis submit jika waktu habis</span>');
                button.innerHTML = "Submit";
            } else {
                button.insertAdjacentHTML('beforebegin', '<span>*otomatis next jika waktu habis</span>');
                button.innerHTML = "Next";
            }

            if (currentTab === 0) {
                countdown(minuteDuration, 0, 0);
            }
        }

        // Next or Submit
        function nextPrev(n, auto = false) {
            const x = document.getElementsByClassName("tab");
            const timerEl = document.getElementsByClassName("timer");
            const currentTimerEl = timerEl[currentTab];

            if (currentTab == (x.length - 1)) {
                if (!submitted) runCode(currentTab + 1);

                x[currentTab].style.display = "flex";

                Swal.fire({
                    title: 'Konfirmasi Submit',
                    text: 'Apakah Anda yakin ingin menyelesaikan tes ini?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'YA',
                    cancelButtonText: 'BATAL',
                }).then((result) => {
                    if (result.isConfirmed) {
                        if (submitted) return;
                        submitted = true;

                        const currentTimerVal = currentTimerEl.textContent;

                        Swal.fire({
                            icon: 'success',
                            title: 'Tes berhasil diselesaikan!',
                            text: 'Halaman akan dialihkan dalam 3 detik',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        }).then((result) => {
                            const successEl = document.getElementsByClassName("success");
                            const currentTimerValArr = currentTimerVal.split(' ');
                            const minute = +currentTimerValArr[0];
                            const second = +currentTimerValArr[2];
                            const timeUp = (minuteDuration * 60) - (minute * 60 + second );
                            timeDurationArr.push({
                                timeUp,
                                isTimeUp: false,
                            });

                            const data = editors.map((editor, i) => {
                                const id = x[i].dataset.question;
                                const time = timeDurationArr[i];
                                const script = editor.getValue();
                                const result = results[i].getValue();
                                const success = successEl[i].value;

                                return {
                                    id,
                                    script,
                                    result,
                                    time,
                                    success,
                                };
                            });

                            $.ajax({
                                url: "{{ route('student.test.store', [$competency->slug]) }}",
                                data: { data },
                                type: 'POST',
                                headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
                                datatype: 'JSON',
                                success: function (res) {
                                    window.location.href = res.url;
                                },
                                error: function (err) {
                                    console.log(err)
                                }
                            });
                        });
                    }
                });
            } else {
                if (auto) {
                    if (Swal.isVisible()) {
                        Swal.close();
                    }

                    timeDurationArr.push({
                        timeUp: minuteDuration * 60,
                        isTimeUp: true,
                    });

                    runCode(currentTab + 1);

                    x[currentTab].style.display = "none";
                    currentTab = currentTab + n;

                    showTab(currentTab);
                    countdown(minuteDuration, 0, currentTab);
                } else {
                    Swal.fire({
                        title: 'Anda yakin?',
                        text: 'Tidak bisa kembali ke soal ini apabila klik "YA"!',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'YA',
                        cancelButtonText: 'BATAL',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const currentTimerVal = currentTimerEl.textContent;
                            const currentTimerValArr = currentTimerVal.split(' ');
                            const minute = +currentTimerValArr[0];
                            const second = +currentTimerValArr[2];
                            const timeUp = (minuteDuration * 60) - (minute * 60 + second );
                            timeDurationArr.push({
                                timeUp,
                                isTimeUp: false,
                            });

                            runCode(currentTab + 1);
                            
                            x[currentTab].style.display = "none";
                            currentTab = currentTab + n;
    
                            showTab(currentTab);
                            countdown(minuteDuration, 0, currentTab);
                        }
                    });
                }
            }
        }

        // Auto Run Code
        function runCode(elementId) {
            const numcode = parseInt(elementId) - 1;

            const script = editors[numcode].getValue();
            const stdin = document.getElementById(`input-${elementId}`).value;
            const successEl = document.getElementById(`success-${elementId}`);

            $.ajax({
                url: "{{ route('student.execute') }}",
                data: { 
                    script,
                    stdin,
                },
                type: 'POST',
                headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
                datatype: 'JSON',
                success: function (res) {
                    res.data.output ? successEl.value = true : successEl.value = false;
                },
                error: function (err) {
                    successEl.value = false;
                }
            });
        }

        // Next Button
        $(".btn-next").on("click", function(e) {
            e.preventDefault();
            nextPrev(1);
        });

        // Run Code
        $(".btn-run").on("click", function(e) {
            e.preventDefault();
            let isLoading = true;

            const ppp = $(this).attr("id").split("-")[1];
            const numcode = parseInt(ppp) - 1;

            const script = editors[numcode].getValue();
            const result = results[numcode];
            const stdin = document.getElementById(`input-${ppp}`).value;
            const successEl = document.getElementById(`success-${ppp}`);

            isLoading && result.setValue('Running the program...');

            $.ajax({
                url: "{{ route('student.execute') }}",
                data: { 
                    script,
                    stdin,
                },
                type: 'POST',
                headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },
                datatype: 'JSON',
                success: function (res) {
                    isLoading = false;
                    res.data.output ? successEl.value = true : successEl.value = false;
                    result.setValue(res.data.output || res.data);
                },
                error: function (err) {
                    isLoading = false;
                    successEl.value = false;
                    result.setValue(err.responseJSON.data);
                }
            });
        });

        // Border Blue
        const style = {
            "border": "0",
            "border-top": "2px solid",
            "border-color": "#1995C9",
        }
        $('.CodeMirror.cm-s-solarized.CodeMirror-wrap').css(style);
        $('.CodeMirror.cm-s-default').css({ ...style, padding: '10px 20px' });
    });
</script>
@endsection