<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Competency;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Competency $competency, Question $question)
    {
        if ($question->competency->id !== $competency->id) abort(404);

        $data = Answer::where('question_id', $question->id)->get();

        return view('answer.index', compact('data', 'competency', 'question'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Competency $competency, Question $question)
    {
        return view('answer.create', compact('competency', 'question'));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Competency $competency, Question $question)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'description' => 'required|string|min:10',
            'score' => 'required|integer|gte:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 400);
        }
        
        Answer::create(array_merge(
            $validator->validated(),
            [
                'question_id' => $question->id,
            ]
        ));

        flash('Berhasil menambahkan butir jawaban')->success();

        return response()->json([
            'status' => true,
            'url' => route('teacher.butir-jawaban.index', [$competency->slug, $question->id]),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Competency $competency, Question $question, $id)
    {
        $data = Answer::find($id);

        return view('answer.edit', compact('data', 'competency', 'question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competency $competency, Question $question, $id)
    {
        $answer = Answer::find($id);
        if (!$answer) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found',
            ], 404);
        }

        $input = $request->all();
        $validator = Validator::make($input, [
            'description' => 'required|string|min:10',
            'score' => 'required|integer|gte:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 400);
        }

        $answer->update($validator->validated());

        flash('Berhasil mengedit butir jawaban')->success();

        return response()->json([
            'status' => true,
            'url' => route('teacher.butir-jawaban.index', [$competency->slug, $question->id]),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competency $competency, Question $question, $id)
    {
        try {
            $answer = Answer::find($id);
            if (!$answer) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data not found',
                ], 404);
            }

            $answer->delete();

            return response()->json([
                'status' => true,
                'message' => 'Berhasil menghapus butir jawaban',
                'url' => route('teacher.butir-jawaban.index', [$competency->slug, $question->id]),
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus butir jawaban',
            ]);
        }
    }
}
