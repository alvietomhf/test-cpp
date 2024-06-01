<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetController extends Controller
{
    public function resetPassword(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return redirect('login')->withErrors($validator)->withInput();
        }

        if (!User::where('email', $data['email'])->exists()) {
            return redirect('login')->withErrors(['email' => 'Email tidak ditemukan'])->withInput();
        }

        $data['name'] = User::where('email', $data['email'])->first()->name;
        $data['password'] = Str::random(10);

        $updatedPassword = Hash::make($data['password']);

        User::where('email', $data['email'])->update(['password' => $updatedPassword]);


        dispatch(new SendMailJob($data));

        return redirect('login')->with('status', 'Email berhasil dikirim');
    }
}
