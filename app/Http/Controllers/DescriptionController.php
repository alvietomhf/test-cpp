<?php

namespace App\Http\Controllers;

use App\Models\Competency;
use App\Models\Description;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Competency $competency, Question $question)
    {
        if ($question->competency->id !== $competency->id) abort(404);

        $data = Description::where('question_id', $question->id)->get();

        return view('description.index', compact('data', 'competency', 'question'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Competency $competency, Question $question)
    {
        return view('description.create', compact('competency', 'question'));
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
            'detail' => 'required|string|min:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 400);
        }
        
        Description::create(array_merge(
            $validator->validated(),
            [
                'question_id' => $question->id,
            ]
        ));

        flash('Berhasil menambahkan keterangan')->success();

        return response()->json([
            'status' => true,
            'url' => route('teacher.keterangan.index', [$competency->slug, $question->id]),
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
        $data = Description::find($id);

        return view('description.edit', compact('data', 'competency', 'question'));
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
        $description = Description::find($id);
        if (!$description) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found',
            ], 404);
        }

        $input = $request->all();
        $validator = Validator::make($input, [
            'detail' => 'required|string|min:10',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 400);
        }

        $description->update($validator->validated());

        flash('Berhasil mengedit keterangan')->success();

        return response()->json([
            'status' => true,
            'url' => route('teacher.keterangan.index', [$competency->slug, $question->id]),
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
            $description = Description::find($id);
            if (!$description) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data not found',
                ], 404);
            }

            $description->delete();

            return response()->json([
                'status' => true,
                'message' => 'Berhasil menghapus keterangan',
                'url' => route('teacher.keterangan.index', [$competency->slug, $question->id]),
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus keterangan',
            ]);
        }
    }
}
