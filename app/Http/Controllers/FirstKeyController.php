<?php

namespace App\Http\Controllers;

use App\Models\Description;
use App\Models\FirstAnswer;
use App\Models\FirstKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FirstKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Description $description, FirstAnswer $firstAnswer)
    {
        if ($firstAnswer->description->question->id !== $description->question->id) abort(404);

        $data = FirstKey::where('first_answer_id', $firstAnswer->id)->get();

        return view('first-key.index', compact('data', 'description', 'firstAnswer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Description $description, FirstAnswer $firstAnswer)
    {
        return view('first-key.create', compact('description', 'firstAnswer'));
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
            'detail' => 'required|string|min:1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 400);
        }

        FirstKey::create(array_merge(
            $validator->validated(),
            [
                'first_answer_id' => $firstAnswer->id,
            ]
        ));

        flash('Berhasil menambahkan kunci jawaban')->success();

        return response()->json([
            'status' => true,
            'url' => route('teacher.kj-pertama.index', [$description->id, $firstAnswer->id]),
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
        $data = FirstKey::find($id);

        return view('first-key.edit', compact('data', 'description', 'firstAnswer'));
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
        $data = FirstKey::find($id);
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
            'url' => route('teacher.kj-pertama.index', [$description->id, $firstAnswer->id]),
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
            $data = FirstKey::find($id);
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
                'url' => route('teacher.kj-pertama.index', [$description->id, $firstAnswer->id]),
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus kunci jawaban',
            ]);
        }
    }
}
