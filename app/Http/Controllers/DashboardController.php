<?php

namespace App\Http\Controllers;

use App\Models\Competency;
use App\Models\Progress;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $competency = Competency::all();
        $progress = Progress::where('user_id', auth()->user()->id)
                                ->with('competency')
                                ->get();

        return view('dashboard', compact('competency', 'progress'));
    }
}
