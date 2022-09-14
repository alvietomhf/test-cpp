<?php

namespace App\Http\Controllers;

use App\Models\FirstAnswer;
use App\Models\SecondAnswer;
use App\Models\ThirdAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ThirdAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FirstAnswer $firstAnswer, SecondAnswer $secondAnswer)
    {
        if ($secondAnswer->firstAnswer->description->id !== $firstAnswer->description->id) abort(404);

        $data = ThirdAnswer::where('second_answer_id', $secondAnswer->id)->get();

        return view('third-answer.index', compact('data', 'firstAnswer', 'secondAnswer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FirstAnswer $firstAnswer, SecondAnswer $secondAnswer)
    {
        return view('third-answer.create', compact('firstAnswer', 'secondAnswer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FirstAnswer $firstAnswer, SecondAnswer $secondAnswer)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'detail' => 'required|string|min:5',
            'score' => 'required|integer|gte:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 400);
        }

        ThirdAnswer::create(array_merge(
            $validator->validated(),
            [
                'second_answer_id' => $secondAnswer->id,
            ]
        ));

        flash('Berhasil menambahkan jawaban')->success();

        return response()->json([
            'status' => true,
            'url' => route('teacher.jawaban-ketiga.index', [$firstAnswer->id, $secondAnswer->id]),
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
    public function edit(FirstAnswer $firstAnswer, SecondAnswer $secondAnswer, $id)
    {
        $data = ThirdAnswer::find($id);

        return view('third-answer.edit', compact('data', 'firstAnswer', 'secondAnswer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FirstAnswer $firstAnswer, SecondAnswer $secondAnswer, $id)
    {
        $data = ThirdAnswer::find($id);
        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found',
            ], 404);
        }

        $input = $request->all();
        $validator = Validator::make($input, [
            'detail' => 'required|string|min:5',
            'score' => 'required|integer|gte:0',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 400);
        }

        $data->update($validator->validated());

        flash('Berhasil mengedit jawaban')->success();

        return response()->json([
            'status' => true,
            'url' => route('teacher.jawaban-ketiga.index', [$firstAnswer->id, $secondAnswer->id]),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(FirstAnswer $firstAnswer, SecondAnswer $secondAnswer, $id)
    {
        try {
            $data = ThirdAnswer::find($id);
            if (!$data) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data not found',
                ], 404);
            }

            $data->delete();

            return response()->json([
                'status' => true,
                'message' => 'Berhasil menghapus jawaban',
                'url' => route('teacher.jawaban-ketiga.index', [$firstAnswer->id, $secondAnswer->id]),
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus jawaban',
            ]);
        }
    }
}
