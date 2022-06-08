<?php

use App\Http\Controllers\ClasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TestController;
use App\Models\Key;
use App\Models\Question;
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

Auth::routes([
    'register' => false,
    'verify' => false,
    'reset' => false,
]);


Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['as' => 'admin.', 'middleware' => ['role:admin']], function() {
        Route::resource('kelas', ClasController::class);
        Route::group(['prefix' => 'kelas/{kelasId}'], function() {
            Route::resource('siswa', StudentController::class);
        });
        Route::resource('guru', TeacherController::class);
    });

    Route::group(['as' => 'student.', 'middleware' => ['role:student']], function() {
        Route::get('tes/{competency:slug}', [TestController::class, 'show'])->name('test.show');
        Route::get('tes/{competency:slug}/started', [TestController::class, 'start'])->name('test.start');
        Route::get('tes/{competency:slug}/hasil', [TestController::class, 'result'])->name('test.result');
        Route::get('tes/{competency:slug}/hasil/{id}', [TestController::class, 'showResult'])->name('test.result.show');
        Route::post('tes/{competency:slug}', [TestController::class, 'storeResult'])->name('test.store');

        Route::post('execute', [TestController::class, 'execute'])->name('execute');
    });

    Route::group(['as' => 'teacher.', 'middleware' => ['role:teacher']], function() {
        Route::get('hasil-tes', [TestController::class, 'teacherResult'])->name('result');
        Route::get('hasil-tes/{competency:slug}/{id}', [TestController::class, 'showTeacherResult'])->name('result.show');

        Route::get('siswa', [DataController::class, 'student'])->name('student.index');
        Route::get('siswa/{id}', [DataController::class, 'studentShow'])->name('student.show');
    });



    // Pertanyaan
    Route::get('pertanyaan', function () {
        return view('pertanyaan');
    });
    Route::post('pertanyaan', function (Request $request) {
        $images = array_filter($request->images, function ($val) {
            return !!$val;
        });
        Question::create([
            'competency_id' => $request->competency_id,
            'description' => $request->description,
            'image' => json_encode($images),
        ]);
        return redirect('/pertanyaan');
    })->name('pertanyaan');

    // Kunci
    Route::get('kunci', function () {
        return view('kunci');
    });
    Route::post('kunci', function (Request $request) {
        Key::create([
            'answer_id' => $request->answer_id,
            'detail' => $request->detail,
        ]);
        return redirect('/kunci');
    })->name('kunci');
});
