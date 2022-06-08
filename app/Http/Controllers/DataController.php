<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function student()
    {
        $data = User::role('student')
                    ->with('clas')
                    ->get();

        return view('data.student', compact('data'));
    }

    public function studentShow($id)
    {
        $data = User::role('student')->where('id', $id)->firstOrFail();
        
        $result = Result::where([
                        'user_id' => $id,
                    ])
                    ->with('competency')
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('data.student-show', compact('data', 'result'));
    }
}
