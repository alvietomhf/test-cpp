<?php

namespace App\Http\Controllers;

use App\Models\SecondAnswer;
use App\Models\ThirdAnswer;
use App\Models\ThirdKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ThirdKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SecondAnswer $secondAnswer, ThirdAnswer $thirdAnswer)
    {
        if ($thirdAnswer->secondAnswer->firstAnswer->description->question->id !== $secondAnswer->firstAnswer->description->question->id) abort(404);

        $data = ThirdKey::where('third_answer_id', $thirdAnswer->id)->get();

        return view('third-key.index', compact('data', 'secondAnswer', 'thirdAnswer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SecondAnswer $secondAnswer, ThirdAnswer $thirdAnswer)
    {
        return view('third-key.create', compact('secondAnswer', 'thirdAnswer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SecondAnswer $secondAnswer, ThirdAnswer $thirdAnswer)
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

        ThirdKey::create(array_merge(
            $validator->validated(),
            [
                'third_answer_id' => $thirdAnswer->id,
            ]
        ));

        flash('Berhasil menambahkan kunci jawaban')->success();

        return response()->json([
            'status' => true,
            'url' => route('teacher.kj-ketiga.index', [$secondAnswer->id, $thirdAnswer->id]),
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
    public function edit(SecondAnswer $secondAnswer, ThirdAnswer $thirdAnswer, $id)
    {
        $data = ThirdKey::find($id);

        return view('third-key.edit', compact('data', 'secondAnswer', 'thirdAnswer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SecondAnswer $secondAnswer, ThirdAnswer $thirdAnswer, $id)
    {
        $data = ThirdKey::find($id);
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
            'url' => route('teacher.kj-ketiga.index', [$secondAnswer->id, $thirdAnswer->id]),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SecondAnswer $secondAnswer, ThirdAnswer $thirdAnswer, $id)
    {
        try {
            $data = ThirdKey::find($id);
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
                'url' => route('teacher.kj-ketiga.index', [$secondAnswer->id, $thirdAnswer->id]),
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus kunci jawaban',
            ]);
        }
    }
}
