@extends('layouts.app')

@section('menu')
    @include('layouts.partials.menu')
@endsection

@section('css')
    <style>
        /* Existing styles */
        .timer-controlled:disabled {
            background-color: #f8f9fa !important;
            cursor: not-allowed;
        }

        .progress {
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-bar {
            transition: none !important;
            /* Remove transition to prevent jumping */
            min-width: 0.1% !important;
            /* Ensure minimum visibility */
            display: block !important;
            /* Force display */
        }

        /* Ensure progress bar is always visible */
        #timer-progress {
            visibility: visible !important;
            opacity: 1 !important;
        }

        #timer-display {
            border-radius: 15px;
            border: 2px solid #512da8;
            /* Warna border ungu */
            background: linear-gradient(135deg, #f5f2fb 0%, #ede7f6 100%);
            /* Gradasi ungu muda */
            box-shadow: 0 4px 6px rgba(81, 45, 168, 0.3);
            /* Shadow ungu */
            transition: all 0.3s ease;
        }

        #timer-countdown {
            font-family: 'Courier New', monospace;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
            font-weight: bold;
            color: #512da8;
            /* Ungu untuk teks waktu */
            transition: color 0.3s ease;
        }

        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        /* Button pulse animation */
        .btn-pulse {
            animation: pulse 1s infinite;
        }

        /* Pulse ungu */
        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(81, 45, 168, 0.6);
            }

            70% {
                transform: scale(1.02);
                box-shadow: 0 0 0 10px rgba(81, 45, 168, 0);
            }

            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(81, 45, 168, 0);
            }
        }

        /* Enhanced progress bar animations */
        .progress-bar-animated {
            animation: progress-bar-stripes 1s linear infinite, progressPulse 2s ease-in-out infinite;
        }

        @keyframes progressPulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.8;
            }
        }

        /* Timer display responsive enhancements */
        @media (max-width: 768px) {
            #timer-display {
                margin: 0 10px;
            }

            #timer-countdown {
                font-size: 16px;
            }

            .progress {
                height: 15px !important;
            }
        }

        /* Timer Panel Styling - Replacement for alert classes */
        .timer-panel {
            padding: 1rem;
            margin-bottom: 1rem;
            border-radius: 15px;
            border: 2px solid #512da8;
            /* border ungu */
            background: linear-gradient(135deg, #f5f2fb 0%, #ede7f6 100%);
            /* ungu muda */
            box-shadow: 0 4px 6px rgba(81, 45, 168, 0.3);
            transition: all 0.3s ease;
        }

        .timer-panel-info {
            color: #3d2372;
            /* lebih gelap dari #512da8 */
            background-color: #e6ddfb;
            border-color: #d1c4e9;
        }

        .timer-panel-warning {
            color: #856404;
            background-color: #fff3cd;
            border-color: #ffeaa7;
        }

        .timer-panel-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        /* Enhanced shadow for timer when active */
        .timer-panel.active {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }


        /* Smooth transitions for all timer elements */
        #timer-display * {
            transition: all 0.3s ease;
        }

        /* Enhanced shadow for timer when active */
        #timer-display.active {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        /* Form control focus states */
        .form-control:focus {
            transition: all 0.3s ease;
        }

        /* Disabled state improvements */
        .timer-controlled:disabled {
            background-color: #f8f9fa !important;
            cursor: not-allowed;
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        /* Input enabled state - subtle animation without green border */
        .form-control-enabled {
            animation: subtleEnable 0.5s ease-in-out;
        }

        @keyframes subtleEnable {
            0% {
                background-color: #f8f9fa;
                opacity: 0.7;
            }

            50% {
                background-color: #ffffff;
                opacity: 0.9;
            }

            100% {
                background-color: #ffffff;
                opacity: 1;
            }
        }
    </style>
@endsection

@section('content')
    <section id="group-detail" class="p-2">
        <div class="row justify-content-center">
            <div class="col-12">
                @include('flash::message')
                <div class="row breadcrumbs-top mb-1">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('student.pjbl.group.show', $data['group']->id) }}"
                                    style="color: grey"><i class="ft ft-arrow-left"></i> Kembali</a>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h2 class="font-weight-bold">{{ $data['phase']->name }}</h2>
                        <p class="mb-2 text-justify">{{ $data['phase']->description }}</p>
                        <hr>

                        <div class="mb-2 text-justify">
                            <h5 class="font-weight-bold mb-1">Studi Kasus</h5>
                            {!! $data['group']->question->case ?? '' !!}
                        </div>

                        <hr>

                        <div class="row justify-content-center">
                            <div class="col-lg-10 col-md-12">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        @unless ($data['passed'])
                                            <!-- Timer Display - Ganti class 'alert' dengan 'timer-panel' -->
                                            <div id="timer-display" class="timer-panel timer-panel-info text-center mb-2"
                                                style="display: none;">
                                                <h5 class="mb-2">
                                                    <i class="la la-clock-o"></i>
                                                    <span id="timer-text">Silakan baca studi kasus dengan seksama</span>
                                                </h5>
                                                <div class="progress mb-2" style="height: 20px;">
                                                    <div id="timer-progress"
                                                        class="progress-bar progress-bar-striped progress-bar-animated"
                                                        role="progressbar" style="width: 0%"></div>
                                                </div>
                                                <span id="timer-countdown" class="font-weight-bold"
                                                    style="font-size: 18px;"></span>
                                            </div>
                                        @endunless

                                        <form method="POST" action="{{ route('student.pjbl.group.problem.store') }}">
                                            @csrf
                                            <input type="hidden" name="pg_work_id" value="{{ $data['pgWork']->id }}">

                                            <div class="form-group">
                                                <label class="font-weight-bold">Rumusan Masalah</label>
                                                <textarea class="form-control timer-controlled" id="desc_1" name="desc_1" rows="3"
                                                    placeholder="Masukan rumusan masalah disini..." data-timer-phase="2"
                                                    {{ $data['passed'] ? 'readonly' : 'required disabled' }}>{{ $data['passed'] ? $data['pgwProblem']->desc_1 : '' }}</textarea>
                                                @error('desc_1')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group mt-2">
                                                <label class="font-weight-bold">Indikator Pemecahan Masalah</label>
                                                <textarea class="form-control timer-controlled" id="desc_2" name="desc_2" rows="3"
                                                    placeholder="Masukan deskripsi masalah disini..." data-timer-phase="3"
                                                    {{ $data['passed'] ? 'readonly' : 'required disabled' }}>{{ $data['passed'] ? $data['pgwProblem']->desc_2 : '' }}</textarea>
                                                @error('desc_2')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group mt-2 mb-2">
                                                <label class="font-weight-bold">Analisis Masalah</label>
                                                <textarea class="form-control timer-controlled" id="desc_3" name="desc_3" rows="3"
                                                    placeholder="Masukan analisis masalah disini..." data-timer-phase="4"
                                                    {{ $data['passed'] ? 'readonly' : 'required disabled' }}>{{ $data['passed'] ? $data['pgwProblem']->desc_3 : '' }}</textarea>
                                                @error('desc_3')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            @unless ($data['passed'])
                                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                                    <button type="submit" id="submit-btn" disabled
                                                        class="btn btn-info glow mb-1 mb-sm-0 mr-0 mr-sm-1">Simpan</button>
                                                </div>
                                            @endunless
                                        </form>

                                        @if ($data['passed'])
                                            <div class="text-center mt-5">
                                                <div class="d-inline-block rounded-circle border border-success p-4">
                                                    <i class="la la-check text-success" style="font-size: 48px;"></i>
                                                </div>
                                                <p class="mt-2 font-weight-semibold">Kelompokmu sudah menyelesaikan
                                                    {{ $data['phase']->name }}.</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // Only run timer if not passed
            @unless ($data['passed'])
                initializeTimer();
            @endunless
        });

        function initializeTimer() {
            let timerDisplay = $('#timer-display');
            let timerText = $('#timer-text');
            let timerCountdown = $('#timer-countdown');
            let timerProgress = $('#timer-progress');
            let submitBtn = $('#submit-btn');

            // Timer configuration
            const TIMER_CONFIG = {
                phase1: {
                    duration: 60,
                    text: 'Silakan baca studi kasus dengan seksama',
                    color: 'bg-info'
                },
                phase2: {
                    duration: 120,
                    text: 'Bisa mulai untuk mengisi Rumusan Masalah',
                    color: 'bg-warning'
                },
                phase3: {
                    duration: 120,
                    text: 'Bisa mulai untuk mengisi Indikator Pemecahan Masalah',
                    color: 'bg-warning'
                },
                phase4: {
                    duration: 180,
                    text: 'Bisa mulai untuk mengisi Analisis Masalah',
                    color: 'bg-warning'
                }
            };

            // Timer state
            let currentPhase = 1;
            let totalDuration = TIMER_CONFIG.phase1.duration;
            let startTime = null;
            let animationFrame = null;
            let isRunning = false;

            // Initialize display
            setupInitialDisplay();
            startPhase1();

            function setupInitialDisplay() {
                // Show timer display and keep it visible
                timerDisplay.show().addClass('active');

                // Ensure timer display stays visible
                timerDisplay.css({
                    'display': 'block !important',
                    'visibility': 'visible !important'
                });

                // Create a new progress bar element to avoid conflicts
                const progressContainer = timerProgress.parent();
                timerProgress.remove();

                const newProgressBar = $('<div>')
                    .attr('id', 'timer-progress')
                    .addClass('progress-bar progress-bar-striped')
                    .attr('role', 'progressbar')
                    .css({
                        'width': '0%',
                        'height': '100%',
                        'background-color': '#512da8',
                        'transition': 'none',
                        'display': 'block !important',
                        'visibility': 'visible !important',
                        'opacity': '1 !important'
                    });

                progressContainer.append(newProgressBar);

                // Update reference to new element
                timerProgress = newProgressBar;
            }

            function startPhase1() {
                currentPhase = 1;
                totalDuration = TIMER_CONFIG.phase1.duration;
                startTime = performance.now();
                isRunning = true;

                // Ensure timer display remains visible
                timerDisplay.show().css('display', 'block');
                timerText.text(TIMER_CONFIG.phase1.text);
                updateTimerPanelColor('info');

                runTimer();
            }

            function startPhase2() {
                currentPhase = 2;
                totalDuration = TIMER_CONFIG.phase2.duration;
                startTime = performance.now();
                isRunning = true;

                // Ensure timer display remains visible
                timerDisplay.show().css('display', 'block');
                timerText.text(TIMER_CONFIG.phase2.text);
                updateTimerPanelColor('warning');
                enableInputsByPhase(2);

                runTimer();
            }

            function startPhase3() {
                currentPhase = 3;
                totalDuration = TIMER_CONFIG.phase3.duration;
                startTime = performance.now();
                isRunning = true;

                // Ensure timer display remains visible
                timerDisplay.show().css('display', 'block');
                timerText.text(TIMER_CONFIG.phase3.text);
                updateTimerPanelColor('warning');
                enableInputsByPhase(3);

                runTimer();
            }

            function startPhase4() {
                currentPhase = 4;
                totalDuration = TIMER_CONFIG.phase4.duration;
                startTime = performance.now();
                isRunning = true;

                // Ensure timer display remains visible
                timerDisplay.show().css('display', 'block');
                timerText.text(TIMER_CONFIG.phase4.text);
                updateTimerPanelColor('warning');
                enableInputsByPhase(4);

                runTimer();
            }

            function runTimer() {
                if (!isRunning) return;

                // Force timer display to stay visible
                if (timerDisplay.css('display') === 'none') {
                    timerDisplay.show().css('display', 'block');
                }

                const currentTime = performance.now();
                const elapsedSeconds = (currentTime - startTime) / 1000;
                const remainingSeconds = Math.max(0, totalDuration - elapsedSeconds);

                // Update countdown display
                updateCountdownDisplay(remainingSeconds);

                // Update progress bar
                updateProgressBar(elapsedSeconds);

                // Check if phase should end
                if (remainingSeconds <= 0) {
                    handlePhaseComplete();
                    return;
                }

                // Continue timer
                animationFrame = requestAnimationFrame(runTimer);
            }

            function updateCountdownDisplay(remainingSeconds) {
                const displaySeconds = Math.ceil(remainingSeconds);
                const minutes = Math.floor(displaySeconds / 60);
                const seconds = displaySeconds % 60;
                const timeString = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

                timerCountdown.text(timeString);

                // Update text color based on remaining time
                timerCountdown.removeClass('text-success text-info text-warning text-danger');
                if (displaySeconds <= 10) {
                    timerCountdown.addClass('text-danger');
                } else if (displaySeconds <= 30) {
                    timerCountdown.addClass('text-warning');
                } else {
                    timerCountdown.addClass('text-info');
                }
            }

            function updateProgressBar(elapsedSeconds) {
                const progressPercentage = Math.min((elapsedSeconds / totalDuration) * 100, 100);

                // Ensure progress bar stays visible
                const progressElement = document.getElementById('timer-progress');
                if (progressElement) {
                    progressElement.style.width = progressPercentage + '%';
                    progressElement.style.display = 'block';
                    progressElement.style.visibility = 'visible';
                    progressElement.style.opacity = '1';

                    // Force important styles to prevent hiding
                    progressElement.style.setProperty('display', 'block', 'important');
                    progressElement.style.setProperty('visibility', 'visible', 'important');
                    progressElement.style.setProperty('opacity', '1', 'important');
                }

                // Update animation based on remaining time
                const remainingSeconds = totalDuration - elapsedSeconds;
                if (remainingSeconds <= 30) {
                    timerProgress.addClass('progress-bar-animated');
                } else {
                    timerProgress.removeClass('progress-bar-animated');
                }
            }

            function updateTimerPanelColor(colorType) {
                $('#timer-display').removeClass(
                    'timer-panel-info timer-panel-warning timer-panel-success timer-panel-danger');

                switch (colorType) {
                    case 'info':
                        $('#timer-display').addClass('timer-panel-info');
                        break;
                    case 'warning':
                        $('#timer-display').addClass('timer-panel-warning');
                        break;
                    case 'success':
                        $('#timer-display').addClass('timer-panel-success');
                        break;
                    case 'danger':
                        $('#timer-display').addClass('timer-panel-danger');
                        break;
                }
            }

            function handlePhaseComplete() {
                isRunning = false;

                if (animationFrame) {
                    cancelAnimationFrame(animationFrame);
                    animationFrame = null;
                }

                if (currentPhase === 1) {
                    // Complete phase 1, move to phase 2
                    showPhaseCompletionMessage('Waktu membaca selesai! Sekarang Kamu dapat mengisi Rumusan Masalah.');

                    setTimeout(() => {
                        startPhase2();
                    }, 1500);

                } else if (currentPhase === 2) {
                    // Complete phase 2, move to phase 3
                    showPhaseCompletionMessage(
                        'Waktu mengisi Rumusan Masalah selesai! Sekarang Kamu dapat mengisi Indikator Pemecahan Masalah.'
                    );

                    setTimeout(() => {
                        startPhase3();
                    }, 1500);

                } else if (currentPhase === 3) {
                    // Complete phase 3, move to phase 4
                    showPhaseCompletionMessage(
                        'Waktu mengisi Indikator Pemecahan Masalah selesai! Sekarang Kamu dapat mengisi Analisis Masalah.'
                    );

                    setTimeout(() => {
                        startPhase4();
                    }, 1500);

                } else if (currentPhase === 4) {
                    // Complete phase 4, enable submit button
                    // Set progress to 100%
                    const progressElement = document.getElementById('timer-progress');
                    if (progressElement) {
                        progressElement.style.width = '100%';
                        progressElement.style.setProperty('display', 'block', 'important');
                        progressElement.style.setProperty('visibility', 'visible', 'important');
                        progressElement.style.setProperty('opacity', '1', 'important');
                    }

                    updateTimerPanelColor('success');
                    enableSubmitButton();

                    // Change timer text to completion message but keep timer visible
                    timerText.text('Semua input sudah dapat diisi dan dapat di-submit');
                    timerCountdown.remove();

                    // Show completion message but keep timer display visible
                    setTimeout(() => {
                        showPhaseCompletionMessage(
                            'Semua fase telah selesai! Kamu dapat menyelesaikan tahapan ini sekarang.');

                        // Optionally hide timer after showing completion message
                        timerDisplay.fadeOut(500);
                    }, 1000);
                }
            }

            function enableInputsByPhase(phase) {
                $('.timer-controlled').each(function() {
                    const inputPhase = parseInt($(this).data('timer-phase'));
                    if (inputPhase <= phase) {
                        $(this).prop('disabled', false).removeClass('disabled');

                        // Add enable animation
                        $(this).addClass('form-control-enabled');
                        setTimeout(() => {
                            $(this).removeClass('form-control-enabled');
                        }, 500);
                    }
                });
            }

            function enableSubmitButton() {
                submitBtn.prop('disabled', false);
                submitBtn.addClass('btn-pulse');
                setTimeout(() => {
                    submitBtn.removeClass('btn-pulse');
                }, 2000);
            }

            function showPhaseCompletionMessage(message) {
                $('.completion-alert').remove();

                const completionAlert = $(`
                    <div class="completion-alert alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert" style="display: none;">
                        <div class="d-flex align-items-center">
                            <i class="la la-check-circle mr-2" style="font-size: 1.5rem;"></i>
                            <div>
                                <strong>Berhasil!</strong> ${message}
                            </div>
                        </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                `);

                $('#group-detail').prepend(completionAlert);
                completionAlert.slideDown(300);

                setTimeout(() => {
                    completionAlert.slideUp(300, function() {
                        $(this).remove();
                    });
                }, 5000);
            }

            // Cleanup function
            function cleanup() {
                isRunning = false;
                if (animationFrame) {
                    cancelAnimationFrame(animationFrame);
                    animationFrame = null;
                }
            }

            // Event listeners
            $(window).on('beforeunload', cleanup);
            $(window).on('unload', cleanup);
        }
    </script>
@endsection
