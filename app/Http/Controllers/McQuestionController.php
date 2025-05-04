<?php

namespace App\Http\Controllers;

use App\Models\McQuestion;
use App\Models\Option;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class McQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = McQuestion::with('options')->get();

        return view('mc-question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mc-question.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'case' => 'nullable|string',
            'question' => 'required|string',
            'note' => 'required|string',
            'difficulty' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'options.*.title' => 'required|string',
            'options.*.correct' => 'nullable|in:0,1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi Gagal',
                'data' => $validator->errors(),
            ]);
        }

        $correctIndex = $request->input('correct_option');
        if ($correctIndex === null || !isset($request->options[$correctIndex])) {
            return response()->json([
                'success' => false,
                'message' => 'Salah satu opsi harus ditandai sebagai jawaban benar.',
            ]);
        }

        try {
            DB::beginTransaction();

            $images = [];
            if ($request->hasFile('image')) {
                $image = rand() . '.' . $request->image->getClientOriginalExtension();
                Storage::putFileAs('public/images', $request->file('image'), $image);
                $images = [$image];
            }

            $question = McQuestion::create(array_merge(
                $validator->validated(),
                [
                    'competency_id' => 1,
                    'image' => count($images) > 0 ? json_encode($images) : null,
                    'score' => 1,
                ]
            ));
    
            foreach ($request->options as $i => $option) {
                $option['correct'] = ($i == $correctIndex) ? 1 : 0;
                $question->options()->create($option);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Soal berhasil ditambahkan!',
                'data' => [
                    'url' => route('teacher.kognitif.index'),
                ],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            Log::info('Error when storing multi choice question: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Soal gagal ditambahkan!',
            ]);
        }
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
    public function edit($id)
    {
        $question = McQuestion::with('options')->findOrFail($id);

        return view('mc-question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'case' => 'nullable|string',
            'question' => 'required|string',
            'note' => 'required|string',
            'difficulty' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'options.*.id' => 'required|exists:options,id',
            'options.*.title' => 'required|string',
            'correct_option' => 'required|in:0,1,2,3'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi Gagal',
                'data' => $validator->errors(),
            ]);
        }

        try {
            DB::beginTransaction();

            $question = McQuestion::findOrFail($id);
            $data = $validator->validated();

            if ($request->hasFile('image')) {
                $image = rand() . '.' . $request->image->getClientOriginalExtension();
                Storage::putFileAs('public/images', $request->file('image'), $image);
                $data['image'] = json_encode([$image]);
            }

            $question->update($data);

            foreach ($request->options as $index => $opt) {
                $option = Option::where('mc_question_id', $question->id)
                                ->where('id', $opt['id'])
                                ->first();

                if ($option) {
                    $option->update([
                        'title' => $opt['title'],
                        'correct' => ($index == $request->correct_option)
                    ]);
                }
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Soal berhasil diperbarui!',
                'data' => [
                    'url' => route('teacher.kognitif.index'),
                ],
            ]);

        } catch (Exception $e) {
            DB::rollBack();

            Log::error('Error when update multi choice question: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui soal!',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $question = McQuestion::find($id);
    
            if (!$question) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan',
                ]);
            }
    
            if ($question->image) {
                $images = json_decode($question->image, true);
                if (is_array($images)) {
                    foreach ($images as $image) {
                        $path = 'public/images/' . $image;
                        if (Storage::exists($path)) {
                            Storage::delete($path);
                        }
                    }
                }
            }
    
            $question->delete();
    
            return response()->json([
                'status' => true,
                'message' => 'Berhasil menghapus soal',
                'url' => route('teacher.kognitif.index'),
            ]);
        } catch (Exception $e) {
            Log::error('Error when delete multi choice question: ' . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus soal',
            ]);
        }
    }
}
