<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

    public function profile()
    {
        $data = auth()->user();

        return view('profile', compact('data'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|string|min:2|max:50',
            'username' => 'required|alpha_dash|min:2|max:50|unique:users,username,' . $user->id,
            'email' => 'required|string|email|unique:users,email,' . $user->id,
            'phone' => 'required|string|min:8|max:15|unique:users,phone,' . $user->id,
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 400);
        }

        $oldAvatar = $user->avatar;
        if ($request->hasFile('avatar')) {
            if (Storage::exists('public/images/' . $oldAvatar)) {
                Storage::delete('public/images/' . $oldAvatar);
            }
            $avatar = rand() . '.' . $request->avatar->getClientOriginalExtension();
            Storage::putFileAs('public/images', $request->file('avatar'), $avatar);
        } else {
            $avatar = $oldAvatar;
        }

        $password = $request->password ? Hash::make($request->password) : $user->password;

        $user->update(array_merge(
            $input,
            [
                'avatar' => $avatar,
                'password' => $password,
            ]
        ));

        flash('Berhasil mengedit profil')->success();

        return response()->json([
            'status' => true,
            'url' => route('profile.index'),
        ]);
    }
}
