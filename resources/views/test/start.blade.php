@extends('layouts.app')

@section('css')
    <style>
        input:focus {
            outline: solid 1px #512da8;
        }
    </style>
@endsection

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
    <div class="card px-1" style="margin-bottom: 0">
        <div class="row w-full justify-content-start bg-info p-1 rounded text-white font-weight-bold">
            <span>{{ $competency->name }}</span>
        </div>
        @php
            $questionCount = count($data);
        @endphp
        @foreach ($data as $key => $value)
            <div class="row justify-content-center tab" data-question="{{ $value->id }}" style="display: none;">
                <div class="col-md-4 col-12 p-2 d-flex flex-column justify-content-between"
                    style="background-color: #F5F5F5;">
                    <input type="hidden" class="success" id="success-{{ $key + 1 }}" value="false">
                    <div class="bg-white p-2" style="border-radius: 20px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
                        <div class="d-flex flex-row" style="border-bottom: 2px solid; border-color: #d6d6d6;">
                            <p class="font-weight-bold">Pertanyaan {{ $key + 1 }} dari {{ $questionCount }}</p>
                        </div>
                        <div class="mt-2">
                            <div class="font-weight-bold">{!! $value->description !!}</div>
                            @foreach ($value->descriptions as $description)
                                {{ $description->detail }}
                                <ul>
                                    @foreach ($description->firstAnswers as $firstAnswer)
                                        <li>{{ $firstAnswer->detail }}</li>
                                        @if ($firstAnswer->nested)
                                            <ul>
                                                @foreach ($firstAnswer->secondAnswers as $secondAnswer)
                                                    <li>{{ $secondAnswer->detail }}</li>
                                                    @if ($secondAnswer->nested)
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
                        </div>
                        <div class="d-flex flex-column mt-2">
                            <p class="font-weight-bold mb-1">Output Program</p>
                            <img src="{{ asset('storage/images/' . json_decode($value->image)[0]) }}" alt="Output Question"
                                style="width: 230px; height: 130px;">
                        </div>
                        <div class="d-flex flex-column mt-2">
                            <p class="font-weight-bold mb-1">Sisa Waktu</p>
                            <div class="text-center" style="border: 1px solid #e6e6e6; padding: 7px; border-radius: 10px;">
                                <span class="timer font-weight-bold" style="font-size: 17px; color: #5a30bf">15 : 00</span>
                            </div>
                        </div>
                        <div class="d-flex flex-row mt-2 align-items-center justify-content-end">
                            <button type="submit" id="nextBtn-{{ $key + 1 }}" class="btn px-3 btn-next"
                                style="background: linear-gradient(to right, #512da8, #7e57c2); color: white; border-radius: 20px;">Selanjutnya</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-12 p-2" style="background-color: #F5F5F5;">
                    <div class="bg-white p-2" style=" border-radius: 20px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
                        <p class="font-weight-bold">Compiler</p>
                        <div>
                            <div class="form-group">
                                <textarea class="script" id="script-{{ $key + 1 }}" name="script" required="required"></textarea>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="{{ $value->input ? 'd-block' : 'd-none' }}  mr-0 mr-sm-5 mb-1 mb-sm-0">
                                    <label for="input-{{ $key + 1 }}">Input : </label>
                                    <input id="input-{{ $key + 1 }}" type="text"
                                        style="padding: 5px; border: 1px solid #5a3da1;">
                                </div>
                                <div class="row d-flex justify-content-end">
                                    <button type="submit" id="run-{{ $key + 1 }}" class="btn px-3 btn-run"
                                        style="background: linear-gradient(to right, #00b09b, #96c93d); color: white; border-radius: 20px;">RUN
                                        <i class="ft-play" style="margin-left: 2px;"></i></button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-2 mt-2" style=" border-radius: 20px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
                        <p class="font-weight-bold">Output</p>
                        <div class="form-group mt-2">
                            <textarea class="result" id="result-{{ $key + 1 }}" disabled></textarea>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        const minuteDuration = 15;
        let timeDurationArr = [];
        let submitted = false;

        // document.addEventListener('copy', function(e) {
        //     e.preventDefault();
        // });

        $(document).ready(function() {
            let currentTab = 0;
            showTab(currentTab);

            // Code Mirror
            let textScript = document.getElementsByClassName("script");
            let textResult = document.getElementsByClassName("result");
            let editors = [];
            let results = [];

            for (let i = 0; i < textScript.length; i++) {
                // Editors
                editors[i] = CodeMirror.fromTextArea($(textScript[i])[0], {
                    mode: "text/x-c++src",
                    theme: "solarized",
                    lineNumbers: true,
                    autoRefresh: true,
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
                editors[i].on("change", editor => {
                    editor.save()
                });
                editors[i].setOption('placeholder', 'Mulai coding disini');
                // editors[i].on("beforeChange", function(_, change) {
                //     if (change.origin == "paste") change.cancel()
                // });
                editors[i].setSize(null, 400);

                // Results
                results[i] = CodeMirror.fromTextArea($(textResult[i])[0], {
                    readOnly: true,
                });
                results[i].on("change", result => {
                    result.save()
                });
                results[i].setOption('placeholder', 'Output akan keluar disini');
                results[i].setSize(null, 200);
            }

            // Timer
            function countdown(minutes, seconds, prevTab) {
                const x = document.getElementsByClassName("tab");
                const el = document.getElementsByClassName("timer");
                const currentTimerEl = el[prevTab];

                const format = (num) => String(num).padStart(2, '0');

                const interval = setInterval(function() {
                    currentTimerEl.innerHTML = `${format(minutes)} : ${format(seconds)}`;

                    if (minutes == 0 && seconds == 7 && currentTab === prevTab && currentTab === (x.length -
                            1) && !submitted) runCode(currentTab + 1);

                    if (seconds == 0) {
                        if (minutes == 0) {
                            currentTimerEl.innerHTML = "00 : 00";
                            clearInterval(interval);

                            if (currentTab === prevTab) {
                                if (currentTab === (x.length - 1)) {
                                    if (submitted) return;
                                    submitted = true;

                                    if (Swal.isVisible()) {
                                        Swal.close();
                                    }

                                    Swal.fire({
                                        icon: 'info',
                                        title: 'Waktu pengerjaan habis!',
                                        text: 'Hasil kode akan disubmit otomatis',
                                        showConfirmButton: false,
                                        timer: 3000,
                                        timerProgressBar: true,
                                    }).then((result) => {
                                        const successEl = document.getElementsByClassName(
                                            "success");

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
                                            data: {
                                                data
                                            },
                                            type: 'POST',
                                            headers: {
                                                'X-CSRF-Token': $('meta[name="csrf-token"]')
                                                    .attr('content')
                                            },
                                            datatype: 'JSON',
                                            success: function(res) {
                                                if (res.data.passed) {
                                                    const competencyId = res.data
                                                        .competency_id;
                                                    let description;

                                                    if (competencyId === 6) {
                                                        description =
                                                            `Skormu: <b>${res.data.score}</b> / Minimum: <b>${res.data.min_score}</b><br>${res.data.description}`
                                                    } else {
                                                        description = res.data
                                                            .description;
                                                    }

                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Bagus!',
                                                        html: description,
                                                        showConfirmButton: false,
                                                        timer: 3000,
                                                        timerProgressBar: true,
                                                    }).then((result) => {
                                                        window.location.href =
                                                            res.data.url;
                                                    });
                                                } else {
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Belum berhasil',
                                                        html: `Skormu: <b>${res.data.score}</b> / Minimum: <b>${res.data.min_score}</b><br>${res.data.description}`,
                                                        showConfirmButton: false,
                                                        timer: 3000,
                                                        timerProgressBar: true,
                                                    }).then((result) => {
                                                        window.location.href =
                                                            res.data.url;
                                                    });
                                                }
                                            },
                                            error: function(err) {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Terjadi kesalahan',
                                                    text: 'Silakan coba lagi.',
                                                });
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
                            seconds = 59;
                        }
                    } else {
                        seconds--;
                    }

                    currentTimerEl.innerHTML = `${format(minutes)} : ${format(seconds)}`;

                }, 1000);
            }

            // Wizard
            function showTab(n) {
                const x = document.getElementsByClassName("tab");
                x[n].style.display = "flex";

                const button = document.getElementById(`nextBtn-${currentTab + 1}`);
                if (n == (x.length - 1)) {
                    button.innerHTML = "Submit";
                } else {
                    button.innerHTML = "Selanjutnya";
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
                        title: 'Konfirmasi',
                        text: 'Apakah Anda yakin ingin menyelesaikan?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#14a318',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'YA',
                        cancelButtonText: 'BATAL',
                    }).then((res) => {
                        if (res.isConfirmed) {
                            if (submitted) return;
                            submitted = true;

                            const currentTimerVal = currentTimerEl.textContent;

                            const successEl = document.getElementsByClassName("success");
                            const currentTimerValArr = currentTimerVal.split(' ');
                            const minute = +currentTimerValArr[0];
                            const second = +currentTimerValArr[2];
                            const timeUp = (minuteDuration * 60) - (minute * 60 + second);
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
                                data: {
                                    data
                                },
                                type: 'POST',
                                headers: {
                                    'X-CSRF-Token': $('meta[name="csrf-token"]').attr(
                                        'content')
                                },
                                datatype: 'JSON',
                                success: function(res) {
                                    if (res.data.passed) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Bagus!',
                                            html: `Skormu: <b>${res.data.score}</b> / Minimum: <b>${res.data.min_score}</b><br>${res.data.description}`,
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        }).then((result) => {
                                            window.location.href = res.data.url;
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Belum berhasil',
                                            html: `Skormu: <b>${res.data.score}</b> / Minimum: <b>${res.data.min_score}</b><br>${res.data.description}`,
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                        }).then((result) => {
                                            window.location.href = res.data.url;
                                        });
                                    }
                                },
                                error: function(err) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Terjadi kesalahan',
                                        text: 'Silakan coba lagi.',
                                    });
                                }
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
                            confirmButtonColor: '#14a318',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'YA',
                            cancelButtonText: 'BATAL',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                const currentTimerVal = currentTimerEl.textContent;
                                const currentTimerValArr = currentTimerVal.split(' ');
                                const minute = +currentTimerValArr[0];
                                const second = +currentTimerValArr[2];
                                const timeUp = (minuteDuration * 60) - (minute * 60 + second);
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

                const result = results[numcode];
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
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    datatype: 'JSON',
                    success: function(res) {
                        if (res.success) {
                            successEl.value = true;
                        } else {
                            successEl.value = false;
                        }

                        result.setValue(res.data || 'No output');
                    },
                    error: function(err) {
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
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    datatype: 'JSON',
                    success: function(res) {
                        isLoading = false;

                        if (res.success) {
                            successEl.value = true;
                        } else {
                            successEl.value = false;
                        }

                        result.setValue(res.data || 'No output');
                    },
                    error: function(err) {
                        isLoading = false;
                        successEl.value = false;
                        result.setValue(err.responseJSON.data || 'No output');
                    }
                });
            });

            // Border Blue
            const style = {
                "border": "0",
                "border-top": "2px solid",
                "border-color": "#d6d6d6",
            }
            $('.CodeMirror.cm-s-solarized.CodeMirror-wrap').css(style);
            $('.CodeMirror.cm-s-default').css({
                ...style,
                padding: '10px 20px'
            });
        });
    </script>
@endsection
