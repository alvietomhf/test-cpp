<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ClasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\FirstAnswerController;
use App\Http\Controllers\FirstKeyController;
use App\Http\Controllers\KeyController;
use App\Http\Controllers\McQuestionController;
use App\Http\Controllers\PjblController;
use App\Http\Controllers\PreTestController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionOutputController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SecondAnswerController;
use App\Http\Controllers\SecondKeyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ThirdAnswerController;
use App\Http\Controllers\ThirdKeyController;
use App\Models\Key;
use App\Models\Question;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Route::post('reset-password', [ResetController::class, 'resetPassword'])->name('password.reset');

Auth::routes([
    'register' => false,
    'verify' => false,
    'reset' => false,
]);


Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['as' => 'student.', 'middleware' => ['role:student']], function() {
        Route::get('tes/{competency:slug}', [TestController::class, 'show'])->name('test.show');
        Route::get('tes/{competency:slug}/started', [TestController::class, 'start'])->name('test.start');
        Route::get('tes/{competency:slug}/hasil', [TestController::class, 'result'])->name('test.result');
        Route::get('tes/{competency:slug}/hasil/{id}', [TestController::class, 'showResult'])->name('test.result.show');
        Route::get('tes/{competency:slug}/rubrik/{id}', [TestController::class, 'showRubric'])->name('test.rubric.show');
        Route::get('tes/{competency:slug}/hasil/{id}/pdf', [TestController::class, 'downloadResultPdf'])->name('test.result.download');
        Route::post('tes/{competency:slug}', [TestController::class, 'storeResult'])->name('test.store');

        Route::get('tes-kognitif', [PreTestController::class, 'show'])->name('pretest.show');
        Route::get('tes-kognitif/started', [PreTestController::class, 'start'])->name('pretest.start');
        Route::get('tes-kognitif/hasil/{id}', [PreTestController::class, 'showResult'])->name('pretest.result.show');
        Route::post('tes-kognitif', [PreTestController::class, 'storeResult'])->name('pretest.store');

        Route::get('hasil-tes-siswa', [TestController::class, 'studentResult'])->name('result');

        Route::post('execute', [TestController::class, 'execute'])->name('execute');

        Route::group(['as' => 'pjbl.', 'prefix' => 'pjbl'], function() {
            Route::group(['as' => 'group.', 'prefix' => 'kelompok-siswa'], function() {
                Route::get('/', [PjblController::class, 'studentGroupIndex'])->name('index');
                Route::get('/{id}', [PjblController::class, 'studentGroupDetail'])->name('show');
                Route::get('/{id}/anggota', [PjblController::class, 'studentGroupMember'])->name('member');
                Route::get('/{id}/hasil/{pjbl_phase:slug}', [PjblController::class, 'studentGroupResult'])->name('result');

                Route::post('problem', [PjblController::class, 'storeProblem'])->name('problem.store');
                Route::post('file', [PjblController::class, 'storeFile'])->name('file.store');
            });
        });
    });

    Route::group(['as' => 'teacher.', 'middleware' => ['role:teacher']], function() {
        Route::resource('kelas', ClasController::class);
        Route::group(['prefix' => 'kelas/{kelasId}'], function() {
            Route::resource('siswa', StudentController::class);
        });

        Route::get('hasil-psikomotorik', [TestController::class, 'teacherResult'])->name('result');
        Route::get('hasil-psikomotorik/{clas}', [TestController::class, 'teacherResultClas'])->name('result.clas');
        Route::get('hasil-psikomotorik/{competency:slug}/{id}', [TestController::class, 'showTeacherResult'])->name('result.show');
        Route::get('hasil-psikomotorik/{competency:slug}/rubrik/{id}', [TestController::class, 'showTeacherRubric'])->name('rubric.show');
        Route::get('tes/{competency:slug}/{userId}/hasil/{id}/pdf-guru', [TestController::class, 'teacherDownloadResultPdf'])->name('test.result.download');

        Route::get('hasil-kognitif', [PreTestController::class, 'teacherResult'])->name('result.kognitif');
        Route::get('hasil-kognitif/{clas}', [PreTestController::class, 'teacherResultClas'])->name('result.kognitif.clas');
        Route::get('hasil-kognitif/{clas}/{id}', [PreTestController::class, 'showTeacherResult'])->name('result.kognitif.show');

        Route::get('siswa', [DataController::class, 'student'])->name('student.index');
        Route::get('siswa/{id}', [DataController::class, 'studentShow'])->name('student.show');
        Route::get('siswa-kelas/{classId}', [DataController::class, 'getStudentsByClasId'])->name('student.byclass');

        Route::resource('kognitif', McQuestionController::class);
        Route::group(['prefix' => '{competency:slug}'], function() {
            Route::resource('pertanyaan', QuestionController::class);
            Route::resource('pertanyaan/{question}/butir-jawaban', AnswerController::class);
            Route::resource('pertanyaan/{question}/keterangan', DescriptionController::class);
            Route::resource('keterangan/{description}/jawaban-pertama', FirstAnswerController::class);
        });
        Route::resource('{description}/jawaban-pertama/{firstAnswer}/jawaban-kedua', SecondAnswerController::class);
        Route::resource('{firstAnswer}/jawaban-kedua/{secondAnswer}/jawaban-ketiga', ThirdAnswerController::class);
        Route::resource('{question}/butir-jawaban/{answer}/kunci-jawaban', KeyController::class);
        Route::resource('{description}/jawaban-pertama/{firstAnswer}/kj-pertama', FirstKeyController::class);
        Route::resource('{firstAnswer}/jawaban-kedua/{secondAnswer}/kj-kedua', SecondKeyController::class);
        Route::resource('{secondAnswer}/jawaban-ketiga/{thirdAnswer}/kj-ketiga', ThirdKeyController::class);

        Route::group(['as' => 'pjbl.', 'prefix' => 'pjbl'], function() {
            Route::group(['as' => 'question.', 'prefix' => 'soal'], function() {
                Route::get('/', [PjblController::class, 'questionIndex'])->name('index');
                Route::get('/tambah', [PjblController::class, 'questionCreate'])->name('create');
                Route::post('/', [PjblController::class, 'questionStore'])->name('store');
                Route::get('/{id}/edit', [PjblController::class, 'questionEdit'])->name('edit');
                Route::put('/{id}', [PjblController::class, 'questionUpdate'])->name('update');
                Route::delete('/{id}', [PjblController::class, 'questionDestroy'])->name('destroy');
            });

            Route::group(['as' => 'group.', 'prefix' => 'kelompok'], function() {
                Route::get('/', [PjblController::class, 'groupIndex'])->name('index');
                Route::get('/{id}', [PjblController::class, 'groupDetail'])->name('show');
                Route::get('/{id}/hasil/{pjbl_phase:slug}', [PjblController::class, 'groupResult'])->name('result');
                Route::get('/tambah/data', [PjblController::class, 'groupCreate'])->name('create');
                Route::post('/', [PjblController::class, 'groupStore'])->name('store');
                Route::post('/feedback', [PjblController::class, 'storeFeedback'])->name('feedback.store');
                Route::get('/{id}/edit/data', [PjblController::class, 'groupEdit'])->name('edit');
                Route::put('/{id}', [PjblController::class, 'groupUpdate'])->name('update');
                Route::delete('/{id}', [PjblController::class, 'groupDestroy'])->name('destroy');

                Route::get('/{groupId}/anggota', [PjblController::class, 'groupMember'])->name('member.index');
                Route::get('/{groupId}/anggota/tambah', [PjblController::class, 'groupMemberCreate'])->name('member.create');
                Route::post('/{groupId}/anggota', [PjblController::class, 'groupMemberStore'])->name('member.store');
                Route::post('/{groupId}/anggota/set-ketua', [PjblController::class, 'groupMemberLead'])->name('member.lead');
                Route::delete('/{groupId}/anggota/{memberId}', [PjblController::class, 'groupMemberDestroy'])->name('member.destroy');
            });
        });
    });

    Route::get('profil', [DataController::class, 'profile'])->name('profile.index');
    Route::put('profil', [DataController::class, 'updateProfile'])->name('profile.update');
});