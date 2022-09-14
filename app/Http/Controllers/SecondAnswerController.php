<?php

namespace App\Http\Controllers;

use App\Models\Competency;
use App\Models\Description;
use App\Models\FirstAnswer;
use App\Models\SecondAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SecondAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Description $description, FirstAnswer $firstAnswer)
    {
        if ($firstAnswer->description->id !== $description->id) abort(404);

        $data = SecondAnswer::where('first_answer_id', $firstAnswer->id)->get();

        return view('second-answer.index', compact('data', 'description', 'firstAnswer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Description $description, FirstAnswer $firstAnswer)
    {
        return view('second-answer.create', compact('description', 'firstAnswer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Description $description, FirstAnswer $firstAnswer)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'detail' => 'required|string|min:5',
            'score' => 'required|integer|gte:0',
            'nested' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 400);
        }

        $nested = $request->nested === 'true' ? 1 : 0;

        SecondAnswer::create(array_merge(
            $validator->validated(),
            [
                'first_answer_id' => $firstAnswer->id,
                'nested' => $nested,
            ]
        ));

        flash('Berhasil menambahkan jawaban')->success();

        return response()->json([
            'status' => true,
            'url' => route('teacher.jawaban-kedua.index', [$description->id, $firstAnswer->id]),
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
    public function edit(Description $description, FirstAnswer $firstAnswer, $id)
    {
        $data = SecondAnswer::find($id);

        return view('second-answer.edit', compact('data', 'description', 'firstAnswer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Description $description, FirstAnswer $firstAnswer, $id)
    {
        $data = SecondAnswer::find($id);
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
            'nested' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 400);
        }

        $nested = $request->nested === 'true' ? 1 : 0;

        $data->update(array_merge(
            $validator->validated(),
            [
                'nested' => $nested,
            ]
        ));

        flash('Berhasil mengedit jawaban')->success();

        return response()->json([
            'status' => true,
            'url' => route('teacher.jawaban-kedua.index', [$description->id, $firstAnswer->id]),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Description $description, FirstAnswer $firstAnswer, $id)
    {
        try {
            $data = SecondAnswer::find($id);
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
                'url' => route('teacher.jawaban-kedua.index', [$description->id, $firstAnswer->id]),
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus jawaban',
            ]);
        }
    }
}
