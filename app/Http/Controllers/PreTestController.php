<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\McqResult;
use App\Models\McqResultDetail;
use App\Models\McQuestion;
use App\Models\Option;
use App\Models\Progress;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class PreTestController extends Controller
{
    public function show()
    {
        $result = McqResult::where('user_id', auth()->user()->id)->first();

        return view('pre-test.show', compact('result'));
    }

    public function start()
    {
        $data = McQuestion::with([
                        'options' => function($q) {
                            $q->select('id', 'mc_question_id', 'title');
                        }])
                        ->get();

        return view('pre-test.start', compact('data'));
    }

    public function teacherResult()
    {
        $clas = Clas::all();

        return view('pre-test.teacher-result', compact('clas'));
    }

    public function teacherResultClas(Clas $clas)
    {
        $result = McqResult::with([
                        'user',
                    ])
                    ->whereHas('user.clas', function ($q) use ($clas) {
                        $q->where('id', $clas->id);
                    })
                    ->orderBy('created_at', 'desc')
                    ->get();

        $maxScoreMcq = McQuestion::count();

        return view('pre-test.teacher-resultcls', compact('result', 'clas', 'maxScoreMcq'));
    }

    public function showTeacherResult(Clas $clas, $id)
    {
        $data = McqResult::where('id', $id)
                        ->with([
                        'resultDetails' => function($q) {
                            $q->select('id', 'mcq_result_id', 'mc_question_id', 'option_id', 'correct', 'score');
                        },
                        'resultDetails.question:id,case,question,note,difficulty',
                        'resultDetails.question.options:id,mc_question_id,title,correct',
                        'resultDetails.option:id,title',
                        ])
                        ->first();

        return view('pre-test.result-show', compact('data'));
    }

    public function storeResult(Request $request)
    {
        $isResult = McqResult::where('user_id', auth()->user()->id)->first();

        if(isset($isResult)) {
            return response()->json([
                'success' => false,
                'message' => 'Ups, kamu sudah mengerjakan tes ini!',
            ]);
        }

        $validator = Validator::make($request->json()->all(), [
            'answers' => 'required',
            'time_up' => 'required',
            'is_timeup' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi error',
                'data' => $validator->errors(),
            ]);
        }

        try {
            DB::beginTransaction();

            $answers = $request->answers;
            $timeUp = $request->time_up;
            $isTimeUp = $request->is_timeup;

            $data = [
                'user_id' => auth()->user()->id,
                'timeup' => $timeUp,
                'is_timeup' => $isTimeUp ? 1 : 0,
            ];

            $result = McqResult::create($data);
            $score = 0;

            foreach ($answers as $answer) {
                $questionId = $answer['question_id'] ?? null;
                $optionId = $answer['option_id'] ?? null;

                if (empty($optionId)) {
                    McqResultDetail::create([
                        'mcq_result_id' => $result->id,
                        'mc_question_id' => $questionId,
                        'option_id' => null,
                        'correct' => false,
                        'score' => 0,
                    ]);
                    continue;
                }

                $question = McQuestion::find($questionId);
                $option = Option::find($optionId);

                McqResultDetail::create([
                    'mcq_result_id' => $result->id,
                    'mc_question_id' => $questionId,
                    'option_id' => $option->id,
                    'correct' => $option->correct,
                    'score' => $option->correct === 1 ? $question->score : 0,
                ]);

                $score += $option->correct === 1 ? $question->score : 0;
            }

            $result->update(['score' => $score]);

            Progress::where([
                        'user_id' => auth()->user()->id,
                        'competency_id' => 4,
                    ])
                    ->update(['status' => 'unlock']);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Kamu telah selesai mengerjakan tes ini!',
                'data' => [
                    'url' => route('dashboard'),
                ],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            Log::info('Error when storing result pre test: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan pada sistem!',
            ]);
        }
        
    }

    public function showResult($id)
    {
        $data = McqResult::where([
                            'id' => $id,
                            'user_id' => auth()->user()->id,
                        ])
                        ->with([
                        'resultDetails' => function($q) {
                            $q->select('id', 'mcq_result_id', 'mc_question_id', 'option_id', 'correct', 'score');
                        },
                        'resultDetails.question:id,case,question,note,difficulty',
                        'resultDetails.question.options:id,mc_question_id,title,correct',
                        'resultDetails.option:id,title',
                        ])
                        ->first();

        return view('pre-test.result-show', compact('data'));
    }
}