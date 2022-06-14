<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\Progress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($kelasId)
    {
        $data = User::role('student')->where('clas_id', $kelasId)->get();
        $clas = Clas::where('id', $kelasId)->first();

        return view('student.index', compact('data', 'clas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($kelasId)
    {
        return view('student.create', compact('kelasId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $kelasId)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|string|min:2|max:50',
            'username' => 'required|alpha_dash|min:2|max:50|unique:users,username',
            'email' => 'nullable|string|email|unique:users,email',
            'phone' => 'nullable|string|min:8|max:15|unique:users,phone',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 400);
        }

        $data = User::create(array_merge(
            $validator->validated(),
            [
                'clas_id' => $kelasId,
                'password' => Hash::make('password'),
            ]
        ));
        $data->assignRole('student');

        Progress::create([
            'user_id' => $data->id,
            'competency_id' => 1,
            'status' => 'unlock',
        ]);
        Progress::create([
            'user_id' => $data->id,
            'competency_id' => 2,
        ]);
        Progress::create([
            'user_id' => $data->id,
            'competency_id' => 3,
        ]);
        Progress::create([
            'user_id' => $data->id,
            'competency_id' => 4,
        ]);

        flash('Berhasil menambahkan siswa')->success();

        return response()->json([
            'status' => true,
            'url' => route('admin.siswa.index', [$kelasId]),
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
    public function edit($kelasId, $id)
    {
        $data = User::find($id);

        return view('student.edit', compact('data', 'kelasId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kelasId, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found',
            ], 404);
        }   

        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|string|min:2|max:50',
            'username' => 'required|alpha_dash|min:2|max:50|unique:users,username,' . $id,
            'email' => 'nullable|string|email|unique:users,email,' . $id,
            'phone' => 'nullable|string|min:8|max:15|unique:users,phone,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 400);
        }

        $password = $request->password ? Hash::make($request->password) : $user->password;

        $user->update(array_merge(
            $validator->validated(),
            [
                'password' => $password,
            ]
        ));

        flash('Berhasil mengedit siswa')->success();

        return response()->json([
            'status' => true,
            'url' => route('admin.siswa.index', [$kelasId]),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kelasId, $id)
    {
        try {
            $user = User::find($id);
            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data not found',
                ], 404);
            }

            if ($user->avatar) {
                if (Storage::exists('public/images/' . $user->avatar)) {
                    Storage::delete('public/images/' . $user->avatar);
                }
            }

            $user->delete();

            return response()->json([
                'status' => true,
                'message' => 'Berhasil menghapus siswa',
                'url' => route('admin.siswa.index', [$kelasId]),
            ]);
        } catch(\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus siswa',
            ]);
        }
    }
}
