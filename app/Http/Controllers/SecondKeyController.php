<?php

namespace App\Http\Controllers;

use App\Models\FirstAnswer;
use App\Models\SecondAnswer;
use App\Models\SecondKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SecondKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FirstAnswer $firstAnswer, SecondAnswer $secondAnswer)
    {
        if ($secondAnswer->firstAnswer->description->question->id !== $firstAnswer->description->question->id) abort(404);

        $data = SecondKey::where('second_answer_id', $secondAnswer->id)->get();

        return view('second-key.index', compact('data', 'firstAnswer', 'secondAnswer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FirstAnswer $firstAnswer, SecondAnswer $secondAnswer)
    {
        return view('second-key.create', compact('firstAnswer', 'secondAnswer'));
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
            'detail' => 'required|string|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 400);
        }

        SecondKey::create(array_merge(
            $validator->validated(),
            [
                'second_answer_id' => $secondAnswer->id,
            ]
        ));

        flash('Berhasil menambahkan kunci jawaban')->success();

        return response()->json([
            'status' => true,
            'url' => route('teacher.kj-kedua.index', [$firstAnswer->id, $secondAnswer->id]),
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
        $data = SecondKey::find($id);

        return view('second-key.edit', compact('data', 'firstAnswer', 'secondAnswer'));
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
        $data = SecondKey::find($id);
        if (!$data) {
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

        $data->update($validator->validated());

        flash('Berhasil mengedit kunci jawaban')->success();

        return response()->json([
            'status' => true,
            'url' => route('teacher.kj-kedua.index', [$firstAnswer->id, $secondAnswer->id]),
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
            $data = SecondKey::find($id);
            if (!$data) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data not found',
                ], 404);
            }

            $data->delete();

            return response()->json([
                'status' => true,
                'message' => 'Berhasil menghapus kunci jawaban',
                'url' => route('teacher.kj-kedua.index', [$firstAnswer->id, $secondAnswer->id]),
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus kunci jawaban',
            ]);
        }
    }
}
