<?php

namespace App\Http\Controllers;

use App\Models\McQuestion;

class PreTestController extends Controller
{
    public function show()
    {
        return view('pre-test.show');
    }

    public function start()
    {
        $data = McQuestion::with([
                        'options' => function($q) {
                            $q->select('id', 'mc_question_id', 'title');
                        }])
                        ->get()
                        ->shuffle();

        // dd($data->toArray());

        return view('pre-test.start', compact('data'));
    }
}