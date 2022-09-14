<?php

namespace App\Http\Controllers;

use App\Models\Competency;
use App\Models\Description;
use App\Models\FirstAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FirstAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Competency $competency, Description $description)
    {
        if ($description->question->competency->id !== $competency->id) abort(404);

        $data = FirstAnswer::where('description_id', $description->id)->get();

        return view('first-answer.index', compact('data', 'competency', 'description'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Competency $competency, Description $description)
    {
        return view('first-answer.create', compact('competency', 'description'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Competency $competency, Description $description)
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

        FirstAnswer::create(array_merge(
            $validator->validated(),
            [
                'description_id' => $description->id,
                'nested' => $nested,
            ]
        ));

        flash('Berhasil menambahkan jawaban')->success();

        return response()->json([
            'status' => true,
            'url' => route('teacher.jawaban-pertama.index', [$competency->slug, $description->id]),
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
    public function edit(Competency $competency, Description $description, $id)
    {
        $data = FirstAnswer::find($id);

        return view('first-answer.edit', compact('data', 'competency', 'description'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competency $competency, Description $description, $id)
    {
        $data = FirstAnswer::find($id);
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
            'url' => route('teacher.jawaban-pertama.index', [$competency->slug, $description->id]),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competency $competency, Description $description, $id)
    {
        try {
            $data = FirstAnswer::find($id);
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
                'url' => route('teacher.jawaban-pertama.index', [$competency->slug, $description->id]),
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus jawaban',
            ]);
        }
    }
}
