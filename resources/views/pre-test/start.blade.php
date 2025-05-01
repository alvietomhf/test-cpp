@extends('layouts.app')

@section('css')
    <style>
        input:focus:not([type="radio"]) {
            outline: solid 1px #512da8;
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
            <span>PreTest</span>
        </div>
        <div class="row">
            <div class="col-12 px-2 pt-2 d-flex flex-column">
                <div class="text-center p-1"
                    style="border: 1px solid #e6e6e6; padding: 7px; border-radius: 20px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); background-color: #ffffff;">
                    <p class="font-weight-bold mb-0">Sisa Waktu</p>
                    <span class="timer font-weight-bold" style="font-size: 17px; color: #5a30bf">1 : 00</span>
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
                            <div class="font-weight-bold">{!! $value->case !!}</div>
                            <div class="font-weight-bold mt-1">{!! $value->question !!}</div>
                            <form>
                                @foreach ($value->options as $option)
                                    <div class="mt-2">
                                        <fieldset class="radio">
                                            <label>
                                                <input type="radio" name="radio-{{ $value->id }}"
                                                    value="{{ $option->id }}">
                                                {{ $option->title }}
                                            </label>
                                        </fieldset>
                                    </div>
                                @endforeach
                            </form>
                        </div>

                        <div class="d-flex flex-row mt-2 align-items-center justify-content-end">
                            <button type="button" class="btn px-3 btn-prev"
                                style="background-color: #cccccc; color: black; border-radius: 20px;">Sebelumnya</button>

                            <button type="submit" id="nextBtn-{{ $key + 1 }}" class="btn px-3 btn-next"
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
        const minuteDuration = 1;
        let submitted = false;

        $(document).ready(function() {
            let currentTab = 0;
            let answers = [];
            let timerInterval;
            let minutesRemaining = minuteDuration;
            let secondsRemaining = 0;
            let countdownStarted = false;

            showTab(currentTab);

            function countdown(minutes, seconds) {
                const x = document.getElementsByClassName("tab");
                const el = document.getElementsByClassName("timer");
                const currentTimerEl = el[0];

                const format = (num) => String(num).padStart(2, '0');

                // Reset timer jika sudah habis
                clearInterval(timerInterval);
                minutesRemaining = minutes;
                secondsRemaining = seconds;

                timerInterval = setInterval(function() {
                    currentTimerEl.innerHTML = `${format(minutesRemaining)} : ${format(secondsRemaining)}`;

                    if (secondsRemaining === 0) {
                        if (minutesRemaining === 0) {
                            currentTimerEl.innerHTML = "00 : 00";
                            clearInterval(timerInterval);

                            // Auto submit setelah waktu habis, di tab mana pun
                            if (!submitted) {
                                submitAnswers(true); // Kirim jawaban jika waktu habis
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

            // Wizard
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


                // Jalankan countdown hanya sekali
                if (!countdownStarted) {
                    countdownStarted = true;
                    countdown(minuteDuration, 0);
                }
            }

            // Next or Submit
            function nextPrev(n) {
                const x = document.getElementsByClassName("tab");

                if (submitted) {
                    return; // Tidak melakukan apa-apa jika sudah disubmit
                }

                // Menyembunyikan tab hanya setelah konfirmasi Swal selesai
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
                            submitAnswers(); // Kirim jawaban jika YA
                        } else {
                            // Jangan lanjutkan ke tab berikutnya jika batal
                            return;
                        }
                    });
                } else {
                    x[currentTab].style.display = "none"; // Sembunyikan tab sebelumnya
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

                    // Cek jika ada radio button yang dipilih
                    const answer = selectedRadio.length ? selectedRadio.val() : null;

                    // Tambahkan jawaban ke array answers
                    const existing = answers.findIndex(a => a.question_id === questionId);
                    if (existing >= 0) {
                        answers[existing].answer = answer;
                    } else {
                        answers.push({
                            question_id: questionId,
                            answer: answer // Nilai null jika belum dipilih
                        });
                    }
                });

                console.log(answers);
                alert('OK');
            }

            $(document).on('change', 'input[type=radio]', function() {
                const questionId = $(this).closest('.tab').data('question');
                const answer = $(this).val() || null; // Jika tidak ada nilai, gunakan null

                const existing = answers.findIndex(a => a.question_id === questionId);
                if (existing >= 0) {
                    answers[existing].answer = answer;
                } else {
                    answers.push({
                        question_id: questionId,
                        answer: answer // Nilai answer bisa null jika tidak dipilih
                    });
                }
            });

            // Next Button
            $(".btn-next").on("click", function(e) {
                e.preventDefault();
                nextPrev(1);
            });

            // Prev Button
            $(".btn-prev").on("click", function(e) {
                e.preventDefault();
                nextPrev(-1);
            });
        });
    </script>
@endsection
