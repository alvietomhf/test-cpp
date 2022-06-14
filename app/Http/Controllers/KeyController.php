<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Competency;
use App\Models\Key;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Question $question, Answer $answer)
    {
        if ($answer->question->id !== $question->id) abort(404);

        $data = Key::where('answer_id', $answer->id)->get();

        return view('key.index', compact('data', 'question', 'answer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Question $question, Answer $answer)
    {
        return view('key.create', compact('question', 'answer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Question $question, Answer $answer)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'detail' => 'required|string|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 400);
        }

        Key::create(array_merge(
            $validator->validated(),
            [
                'answer_id' => $answer->id,
            ]
        ));

        flash('Berhasil menambahkan kunci jawaban')->success();

        return response()->json([
            'status' => true,
            'url' => route('teacher.kunci-jawaban.index', [$question->id, $answer->id]),
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
    public function edit(Question $question, Answer $answer, $id)
    {
        $data = Key::find($id);

        return view('key.edit', compact('data', 'question', 'answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question, Answer $answer, $id)
    {
        $key = Key::find($id);
        if (!$key) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found',
            ], 404);
        }

        $input = $request->all();
        $validator = Validator::make($input, [
            'detail' => 'required|string|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 400);
        }

        $key->update($validator->validated());

        flash('Berhasil mengedit kunci jawaban')->success();

        return response()->json([
            'status' => true,
            'url' => route('teacher.kunci-jawaban.index', [$question->id, $answer->id]),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, Answer $answer, $id)
    {
        try {
            $key = Key::find($id);
            if (!$key) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data not found',
                ], 404);
            }

            $key->delete();

            return response()->json([
                'status' => true,
                'message' => 'Berhasil menghapus kunci jawaban',
                'url' => route('teacher.kunci-jawaban.index', [$question->id, $answer->id]),
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus kunci jawaban',
            ]);
        }
    }
}
