<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Competency;
use App\Models\Progress;
use App\Models\Question;
use App\Models\Result;
use App\Models\ResultDetail;
use App\Models\ResultDetailAnswer;
use ErrorException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class TestController extends Controller
{
    public function show(Competency $competency)
    {
        $progress = Progress::where([
                                'user_id' => auth()->user()->id,
                                'competency_id' => $competency->id,
                            ])
                            ->with('competency')
                            ->first();

        $currentProgress = Progress::where([
                                'user_id' => auth()->user()->id,
                                'status' => 'unlock',
                            ])
                            ->with('competency')
                            ->first();

        // Soon
        if ($competency->id !== 1) {
            flash('Tes ' . $competency->title . ' belum dibuka!')->warning();
            return redirect()->route('dashboard');
        }

        if ($progress->status === 'lock') {
            flash('Tes '. $competency->title . ' terkunci! Selesaikan tes berikut terlebih dahulu')->warning();
            return redirect()->route('student.test.show', [$currentProgress->competency->slug]);
        }
                                        
        return view('test.show', compact('progress'));
    }

    public function start(Competency $competency)
    {
        $progress = Progress::where([
                                'user_id' => auth()->user()->id,
                                'competency_id' => $competency->id,
                            ])
                            ->with('competency')
                            ->first();

        $currentProgress = Progress::where([
                                'user_id' => auth()->user()->id,
                                'status' => 'unlock',
                            ])
                            ->with('competency')
                            ->first();

        // Soon
        if ($competency->id !== 1) {
            flash('Tes ' . $competency->title . ' belum dibuka!')->warning();
            return redirect()->route('dashboard');
        }

        if ($progress->status === 'lock') {
            flash('Tes '. $competency->title . ' terkunci! Selesaikan tes berikut terlebih dahulu')->warning();
            return redirect()->route('student.test.show', [$currentProgress->competency->slug]);
        }
        if ($progress->status === 'passed') {
            flash('Tes '. $competency->title . ' sudah selesai!')->warning();
            return redirect()->route('dashboard');
        }

        $data = Question::where('competency_id', $competency->id)->get()->random(3)->values();
        // $data = Question::where('id', 1)->get();

        return view('test.start', compact('data', 'competency'));
    }

    public function storeResult(Request $request, Competency $competency)
    {
        try {
            $data = $request->data;
            $totalQuestion = 3;
            $score = 0;
            $passed = 0;

            DB::beginTransaction();

            $result = Result::create([
                'user_id' => auth()->user()->id,
                'competency_id' => $competency->id,
            ]);

            foreach ($data as $key => $dataValue) {
                $question = Question::where('id', $dataValue['id'])->with(['answers', 'answers.keys'])->first();

                $script = preg_replace('/\s+/', '', trim($dataValue['script']));
                $script = strtolower($script);

                $questionScore = 0;

                // Log::info('script: '. $script);

                $resultDetail = ResultDetail::create([
                    'result_id' => $result->id,
                    'question_id' => $question->id,
                    'answer' => $dataValue['script'],
                    'timeup' => +$dataValue['time']['timeUp'],
                    'is_timeup' => $dataValue['time']['isTimeUp'] === "true" ? 1 : 0,
                ]);

                foreach ($question->answers as $key => $answer) {
                    // Log::info('answerid: '. $answer->id);

                    $resultDetailAnswer = ResultDetailAnswer::create([
                        'result_detail_id' => $resultDetail->id,
                        'answer_id' => $answer->id,
                    ]);

                    foreach ($answer->keys as $key => $keyValue) {
                        $detail = preg_replace('/\s+/', '', trim($keyValue->detail));
                        $detail = strtolower($detail);

                        // Log::info('keyid: '. $keyValue->id);
                        // Log::info('detail: '. $detail);

                        if (str_contains($script, $detail)) {
                            $resultDetailAnswer->update(['correct' => 1]);
                            $questionScore += $answer->score;
                            break;
                        }
                    }
                }

                $resultDetail->update(['score' => $questionScore]);
                $score += $questionScore;
            }

            $score = round($score / $totalQuestion);

            if ($score >= 75) {
                $passed = 1;

                // Soon
                Progress::where([
                            'user_id' => auth()->user()->id,
                            'competency_id' => $competency->id,
                        ])
                        ->update(['status' => 'passed']);
                // if ($competency->id < 4) {
                //     Progress::where([
                //                 'user_id' => auth()->user()->id,
                //                 'competency_id' => $competency->id + 1,
                //             ])
                //             ->update(['status' => 'unlock']);
                // }
            }

            $result->update([
                'score' => $score,
                'passed' => $passed,
            ]);

            DB::commit();
            
            return response()->json([
                'success' => true,
                'message' => 'Answer successfully stored',
                'url' => route('dashboard'),
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], $e->getCode());
        }
    }

    public function result(Competency $competency)
    {
        $progress = Progress::where([
                                'user_id' => auth()->user()->id,
                                'competency_id' => $competency->id,
                            ])
                            ->with('competency')
                            ->first();

        $currentProgress = Progress::where([
                                'user_id' => auth()->user()->id,
                                'status' => 'unlock',
                            ])
                            ->with('competency')
                            ->first();

        // Soon
        if ($competency->id !== 1) {
            flash('Tes ' . $competency->title . ' belum dibuka!')->warning();
            return redirect()->route('dashboard');
        }

        if ($progress->status !== 'passed') {
            flash('Tes '. $competency->title . ' terkunci atau belum selesai!')->warning();
            return redirect()->route('dashboard');
        }

        $result = Result::where([
                        'user_id' => auth()->user()->id,
                        'competency_id' => $competency->id
                    ])
                    ->with('competency')
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('test.result', compact('competency', 'result'));
    }

    public function showResult(Competency $competency, $id)
    {
        $data = Result::where([
                        'id' => $id,
                        'user_id' => auth()->user()->id,
                    ])
                    ->with([
                        'resultDetails',
                        'resultDetails.resultDetailAnswers',
                        'resultDetails.resultDetailAnswers.answer',
                        'resultDetails.question',
                    ])
                    ->withCount('resultDetails')
                    ->first();

        return view('test.result-show', compact('data'));
    }

    public function teacherResult()
    {
        $result = Result::with([
                        'user',
                        'user.clas',
                        'competency',
                    ])
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('test.teacher-result', compact('result'));
    }

    public function showTeacherResult(Competency $competency, $id)
    {
        $data = Result::where([
                        'id' => $id,
                    ])
                    ->with([
                        'resultDetails',
                        'resultDetails.resultDetailAnswers',
                        'resultDetails.resultDetailAnswers.answer',
                        'resultDetails.question',
                    ])
                    ->withCount('resultDetails')
                    ->first();

        return view('test.result-show', compact('data'));
    }

    public function execute(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'script' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'data' => 'Nothing to execute',
            ]);
        }

        try {
            $script = $request->script;

            $response = Http::post(env('JDOODLE_API_URL'), [
                'clientId' => env('JDOODLE_CLIENT_ID'),
                'clientSecret' => env('JDOODLE_CLIENT_SECRET'),
                'script' => $script,
                'language' => 'cpp',
                'versionIndex' => '5'
            ]);
            $result = $response->json(); 

            if ($response->status() != 200) throw new ErrorException('Internal Error', 500);
            if (!$result['memory']) throw new ErrorException($result['output'], 422);

            return response()->json([
                'success' => true,
                'data' => $result,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'data' => $e->getMessage(),
            ], $e->getCode());
        }
    }
}
