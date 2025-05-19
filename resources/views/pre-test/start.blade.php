@extends('layouts.app')

@section('css')
    <style>
        input:focus:not([type="radio"]) {
            outline: solid 1px #512da8;
        }

        input[type="radio"]+p {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
            margin-left: 5px;
        }
    </style>
@endsection

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('content')
    <div class="px-1" style="margin-bottom: 0; background-color: transparent;">
        @php
            $questionCount = count($data);
        @endphp
        <div class="row w-full justify-content-start bg-info p-1 rounded text-white font-weight-bold">
            <span>Tes Kognitif</span>
        </div>
        <div class="row">
            <div class="col-12 px-2 pt-2 d-flex flex-column">
                <div class="text-center p-1"
                    style="border: 1px solid #e6e6e6; padding: 7px; border-radius: 20px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); background-color: #ffffff;">
                    <p class="font-weight-bold mb-0">Sisa Waktu</p>
                    <span class="timer font-weight-bold" style="font-size: 17px; color: #5a30bf">40 : 00</span>
                </div>
            </div>
        </div>
        @foreach ($data as $key => $value)
            <div class="row justify-content-center tab" data-question="{{ $value->id }}" style="display: none;">
                <div class="col-12 p-2 d-flex flex-column justify-content-between">
                    <input type="hidden" class="success" id="success-{{ $key + 1 }}" value="false">
                    <div class="bg-white p-2" style="border-radius: 20px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);">
                        <div class="d-flex flex-row" style="border-bottom: 2px solid; border-color: #d6d6d6;">
                            <p class="font-weight-bold">Pertanyaan {{ $key + 1 }} dari {{ $questionCount }}</p>
                        </div>
                        <div class="mt-2">
                            <div>{!! $value->case !!}</div>
                            <br>
                            <div>{!! $value->question !!}</div>
                            <form>
                                @foreach ($value->options as $option)
                                    <div class="mt-2">
                                        <fieldset class="radio">
                                            <label class="w-100 flex flex-row" style="display: flex;">
                                                <input type="radio" name="radio-{{ $value->id }}"
                                                    value="{{ $option->id }}">
                                                {!! $option->title !!}
                                            </label>
                                        </fieldset>
                                    </div>
                                @endforeach
                            </form>
                        </div>

                        <div class="d-flex flex-row mt-2 align-items-center justify-content-end">
                            <button type="button" class="btn px-3 btn-prev"
                                style="background-color: #cccccc; color: black; border-radius: 20px;">Sebelumnya</button>

                            <button type="submit" id="nextBtn-{{ $key + 1 }}" class="btn px-3 btn-next ml-1"
                                style="background: linear-gradient(to right, #512da8, #7e57c2); color: white; border-radius: 20px;">Selanjutnya</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        const minuteDuration = 40;
        let submitted = false;

        $(document).ready(function() {
            let currentTab = 0;
            let answers = [];
            let timerInterval;
            let minutesRemaining = minuteDuration;
            let secondsRemaining = 0;
            let countdownStarted = false;
            let isTimeup = false;

            showTab(currentTab);

            function countdown(minutes, seconds) {
                const x = document.getElementsByClassName("tab");
                const el = document.getElementsByClassName("timer");
                const currentTimerEl = el[0];

                const format = (num) => String(num).padStart(2, '0');

                clearInterval(timerInterval);
                minutesRemaining = minutes;
                secondsRemaining = seconds;

                timerInterval = setInterval(function() {
                    currentTimerEl.innerHTML = `${format(minutesRemaining)} : ${format(secondsRemaining)}`;

                    if (secondsRemaining === 0) {
                        if (minutesRemaining === 0) {
                            currentTimerEl.innerHTML = "00 : 00";
                            clearInterval(timerInterval);

                            if (!submitted) {
                                isTimeup = true;
                                submitAnswers();
                            }

                            return;
                        } else {
                            minutesRemaining--;
                            secondsRemaining = 59;
                        }
                    } else {
                        secondsRemaining--;
                    }

                    currentTimerEl.innerHTML = `${format(minutesRemaining)} : ${format(secondsRemaining)}`;

                }, 1000);
            }

            function showTab(n) {
                const x = document.getElementsByClassName("tab");
                x[n].style.display = "flex";

                const nextBtn = x[n].querySelector('.btn-next');
                const prevBtn = x[n].querySelector('.btn-prev');

                if (n === 0) {
                    prevBtn.style.display = "none";
                } else {
                    prevBtn.style.display = "inline-block";
                }

                if (n === (x.length - 1)) {
                    nextBtn.innerHTML = "Submit";
                } else {
                    nextBtn.innerHTML = "Selanjutnya";
                }

                if (!countdownStarted) {
                    countdownStarted = true;
                    countdown(minuteDuration, 0);
                }
            }

            function nextPrev(n) {
                const x = document.getElementsByClassName("tab");

                if (submitted) {
                    return;
                }

                if (currentTab + n >= x.length) {
                    Swal.fire({
                        title: 'Konfirmasi',
                        text: 'Apakah Anda yakin ingin mengumpulkan jawaban?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#14a318',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'YA',
                        cancelButtonText: 'BATAL',
                    }).then((res) => {
                        if (res.isConfirmed) {
                            submitAnswers();
                        } else {
                            return;
                        }
                    });
                } else {
                    x[currentTab].style.display = "none";
                    currentTab += n;
                    showTab(currentTab);
                }
            }

            function submitAnswers() {
                if (submitted) return;
                submitted = true;

                $(".tab").each(function() {
                    const questionId = $(this).data('question');
                    const selectedRadio = $(this).find('input[type=radio]:checked');

                    const answer = selectedRadio.length ? selectedRadio.val() : null;

                    const existing = answers.findIndex(a => a.question_id === questionId);
                    if (existing >= 0) {
                        answers[existing].option_id = answer;
                    } else {
                        answers.push({
                            question_id: questionId,
                            option_id: answer
                        });
                    }
                });

                const x = document.getElementsByClassName("timer");
                const currentTimerEl = x[0];
                const currentTimerVal = currentTimerEl.textContent;
                const currentTimerValArr = currentTimerVal.split(' ');
                const minute = parseInt(currentTimerValArr[0]);
                const second = parseInt(currentTimerValArr[2]);
                const timeUp = (minuteDuration * 60) - (minute * 60 + second);

                $.ajax({
                    url: "{{ route('student.pretest.store') }}",
                    data: JSON.stringify({
                        answers,
                        time_up: timeUp,
                        is_timeup: isTimeup
                    }),
                    type: 'POST',
                    contentType: 'application/json',
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]')
                            .attr('content'),
                        'Content-Type': 'application/json'
                    },
                    datatype: 'JSON',
                    success: function(res) {
                        if (res.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                html: res.message,
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            }).then((result) => {
                                window.location.href =
                                    res.data.url;
                            });
                        } else {
                            submitted = false;
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: res.message,
                            });
                        }
                    },
                    error: function(err) {
                        submitted = false;
                        Swal.fire({
                            icon: 'error',
                            title: 'Terjadi kesalahan',
                            text: 'Silakan coba lagi!',
                        });
                    }
                });
            }

            $(document).on('change', 'input[type=radio]', function() {
                const questionId = $(this).closest('.tab').data('question');
                const answer = $(this).val() || null;

                const existing = answers.findIndex(a => a.question_id === questionId);
                if (existing >= 0) {
                    answers[existing].option_id = answer;
                } else {
                    answers.push({
                        question_id: questionId,
                        option_id: answer
                    });
                }
            });

            $(".btn-next").on("click", function(e) {
                e.preventDefault();
                nextPrev(1);
            });

            $(".btn-prev").on("click", function(e) {
                e.preventDefault();
                nextPrev(-1);
            });
        });
    </script>
@endsection
