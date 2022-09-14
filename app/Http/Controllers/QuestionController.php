<?php

namespace App\Http\Controllers;

use App\Models\Competency;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Competency $competency)
    {
        $data = Question::where('competency_id', $competency->id)
                        ->with([
                            'descriptions',
                            'descriptions.firstAnswers',
                            'descriptions.firstAnswers.secondAnswers',
                            'descriptions.firstAnswers.secondAnswers.thirdAnswers',
                        ])
                        ->get();

        return view('question.index', compact('data', 'competency'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Competency $competency)
    {
        return view('question.create', compact('competency'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Competency $competency)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'description' => 'required|string|min:10',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'output' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 400);
        }

        if ($request->hasFile('image')) {
            $image = rand() . '.' . $request->image->getClientOriginalExtension();
            Storage::putFileAs('public/images', $request->file('image'), $image);
        }

        $images = [$image];

        Question::create(array_merge(
            $validator->validated(),
            [
                'competency_id' => $competency->id,
                'image' => json_encode($images),
            ]
        ));

        flash('Berhasil menambahkan pertanyaan')->success();

        return response()->json([
            'status' => true,
            'url' => route('teacher.pertanyaan.index', [$competency->slug]),
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
    public function edit(Competency $competency, $id)
    {
        $data = Question::find($id);

        return view('question.edit', compact('data', 'competency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Competency $competency, $id)
    {
        $question = Question::find($id);
        if (!$question) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found',
            ], 404);
        }

        $input = $request->all();
        $validator = Validator::make($input, [
            'description' => 'required|string|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'output' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 400);
        }

        $oldImage = json_decode($question->image)[0];
        if ($request->hasFile('image')) {
            if (Storage::exists('public/images/' . $oldImage)) {
                Storage::delete('public/images/' . $oldImage);
            }
            $image = rand() . '.' . $request->image->getClientOriginalExtension();
            Storage::putFileAs('public/images', $request->file('image'), $image);
        } else {
            $image = $oldImage;
        }

        $images = [$image];

        $question->update(array_merge(
            $validator->validated(),
            [
                'image' => json_encode($images),
            ]
        ));

        flash('Berhasil mengedit pertanyaan')->success();

        return response()->json([
            'status' => true,
            'url' => route('teacher.pertanyaan.index', [$competency->slug]),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Competency $competency, $id)
    {
        try {
            $question = Question::find($id);
            if (!$question) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data not found',
                ], 404);
            }

            if ($question->image) {
                $images = json_decode($question->image);

                foreach ($images as $key => $value) {
                    if (Storage::exists('public/images/' . $value)) {
                        Storage::delete('public/images/' . $value);
                    }
                }
            }

            $question->delete();

            return response()->json([
                'status' => true,
                'message' => 'Berhasil menghapus pertanyaan',
                'url' => route('teacher.pertanyaan.index', [$competency->slug]),
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus pertanyaan',
            ]);
        }
    }
}
