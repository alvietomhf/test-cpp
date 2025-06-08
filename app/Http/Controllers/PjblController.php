<?php

namespace App\Http\Controllers;

use App\Models\Clas;
use App\Models\Competency;
use App\Models\PgMember;
use App\Models\PgwEvaluation;
use App\Models\PgWork;
use App\Models\PgwProblem;
use App\Models\PgwReflection;
use App\Models\PgwScore;
use App\Models\PjblGroup;
use App\Models\PjblPhase;
use App\Models\PjblQuestion;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PjblController extends Controller
{
    public function questionIndex()
    {
        $questions = PjblQuestion::with('competency')->get();

        return view('pjbl.question.index', compact('questions'));
    }

    public function questionCreate()
    {
        return view('pjbl.question.create');
    }

    public function questionStore(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'custom_competency' => 'required|string',
            'description' => 'required|string',
            'case' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi Gagal',
                'data' => $validator->errors(),
            ]);
        }

        try {
            DB::beginTransaction();

            PjblQuestion::create($validator->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Soal berhasil ditambahkan!',
                'data' => [
                    'url' => route('teacher.pjbl.question.index'),
                ],
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            Log::info('Error when storing project based learning question: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Soal gagal ditambahkan!',
            ]);
        }
    }

    public function questionEdit($id)
    {
        $question = PjblQuestion::findOrFail($id);

        return view('pjbl.question.edit', compact('question'));
    }

    public function questionUpdate(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'custom_competency' => 'required|string',
            'description' => 'required|string',
            'case' => 'required|string',
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

            $question = PjblQuestion::findOrFail($id);

            $question->update($validator->validated());

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Soal berhasil diperbarui!',
                'data' => [
                    'url' => route('teacher.pjbl.question.index'),
                ],
            ]);

        } catch (Exception $e) {
            DB::rollBack();

            Log::error('Error when update project based learning question: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Gagal memperbarui soal!',
            ]);
        }
    }

    public function questionDestroy($id)
    {
        try {
            $question = PjblQuestion::find($id);
    
            if (!$question) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan',
                ]);
            }

            $question->delete();
    
            return response()->json([
                'status' => true,
                'message' => 'Berhasil menghapus soal',
                'url' => route('teacher.pjbl.question.index'),
            ]);
        } catch (Exception $e) {
            Log::error('Error when delete project based learning question: ' . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus soal',
            ]);
        }
    }

    public function groupIndex()
    {
        $groups = PjblGroup::with([
                                'clas',
                                'question',
                                'question.competency'
                            ])
                            ->withCount('members')
                            ->get();

        return view('pjbl.group.index', compact('groups'));
    }

    public function groupCreate()
    {
        $clas = Clas::all();
        $questions = PjblQuestion::with('competency')->get();

        return view('pjbl.group.create', compact('clas', 'questions'));
    }
    
    public function groupStore(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'clas' => 'required|integer',
            'question' => 'required|integer',
            'name' => 'required|string',
            'lead' => 'required|integer',
            'max_member' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 400);
        }

        try {
            DB::beginTransaction();

            $group = PjblGroup::create(array_merge(
                $validator->validated(),
                [
                    'clas_id' => $request->clas,
                    'pjbl_question_id' => $request->question,
                ]
            ));
    
            PgMember::create([
                'pjbl_group_id' => $group->id,
                'user_id' => $request->lead,
                'is_leader' => 1,
            ]);

            PgWork::create([
                'pjbl_group_id' => $group->id,
                'pjbl_phase_id' => 1,
                'status' => 'unlock',
            ]);
    
            DB::commit();

            flash('Berhasil membuat kelompok PJBL')->success();
    
            return response()->json([
                'status' => true,
                'url' => route('teacher.pjbl.group.index'),
            ]);
        } catch (Exception $e) {
            DB::rollBack();

            Log::info('Error when storing group project based learning: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Kelompok gagal ditambahkan!',
            ]);
        }
    }

    public function groupEdit($id)
    {
        $group = PjblGroup::findOrFail($id);
        $clas = Clas::all();
        $questions = PjblQuestion::with('competency')->get();

        return view('pjbl.group.edit', compact('group', 'clas', 'questions'));
    }

    public function groupUpdate(Request $request, $id)
    {
        $group = PjblGroup::findOrFail($id);

        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'data' => $validator->errors(),
            ], 400);
        }

        $group->update(['name' => $request->name]);

        flash('Berhasil mengubah kelompok PJBL')->success();

        return response()->json([
            'status' => true,
            'url' => route('teacher.pjbl.group.index'),
        ]);
    }

    public function groupDestroy($id)
    {
        try {
            $group = PjblGroup::find($id);

            if (!$group) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan',
                ]);
            }

            $group->delete();

            return response()->json([
                'status' => true,
                'message' => 'Berhasil menghapus group',
                'url' => route('teacher.pjbl.group.index'),
            ]);
        } catch (Exception $e) {
            Log::error('Error when delete project based learning group: ' . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus group',
            ]);
        }
    }

    public function groupMember($groupId)
    {
        $group = PjblGroup::findOrFail($groupId);
        $member = PgMember::where('pjbl_group_id', $group->id)
                            ->orderBy('is_leader', 'desc')
                            ->orderBy('id', 'asc')
                            ->get();

        return view('pjbl.group.member.index', compact('group', 'member'));
    }

    public function groupMemberCreate($groupId)
    {
        $group = PjblGroup::findOrFail($groupId);
        $memberIds = PgMember::where('pjbl_group_id', $group->id)->pluck('user_id');
        $students = User::role('student')
                        ->where('clas_id', $group->clas_id)
                        ->whereNotIn('id', $memberIds)
                        ->get();

        return view('pjbl.group.member.create', compact('group', 'students'));
    }

    public function groupMemberStore(Request $request, $groupId)
    {
        $group = PjblGroup::findOrFail($groupId);

        $exists = PgMember::where('pjbl_group_id', $group->id)
                        ->where('user_id', $request->member)
                        ->exists();

        if ($exists) {
            flash('Siswa yang dipilih sudah terdaftar sebagai anggota kelompok')->warning();

            return redirect()->route('teacher.pjbl.group.member.index', [$group->id]);
        }

        PgMember::create([
            'pjbl_group_id' => $group->id,
            'user_id' => $request->member,
        ]);

        flash('Berhasil menambahkan anggota kelompok')->success();

        return redirect()->route('teacher.pjbl.group.member.index', [$group->id]);
    }

    public function groupMemberLead(Request $request, $groupId)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        PgMember::where('pjbl_group_id', $groupId)->update(['is_leader' => 0]);

        PgMember::where('pjbl_group_id', $groupId)
                ->where('user_id', $request->user_id)
                ->update(['is_leader' => 1]);

        flash('Ketua kelompok berhasil diperbarui')->success();

        return back();
    }

    public function groupMemberDestroy($groupId, $memberId)
    {
        try {
            $member = PgMember::where('id', $memberId)
                            ->where('pjbl_group_id', $groupId)
                            ->first();

            if (!$member) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data tidak ditemukan',
                ]);
            }

            $member->delete();

            return response()->json([
                'status' => true,
                'message' => 'Berhasil menghapus anggota kelompok',
                'url' => route('teacher.pjbl.group.member.index', [$groupId]),
            ]);
        } catch (Exception $e) {
            Log::error('Error when delete group member: ' . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus anggota kelompok',
            ]);
        }
    }

    public function groupDetail($id)
    {
        $group = PjblGroup::findOrFail($id);
        $countMember = PgMember::where('pjbl_group_id', $id)->count();

        if ($group->max_member !== $countMember) {
            flash('Anggota kelompok belum lengkap, silahkan isi terlebih dahulu!')->warning();

            return redirect()->back();
        }

        $phase = PjblPhase::all();

        foreach ($phase as $key => $value) {
            $passed = false;
            $unlock = false;

            $pgWork = PgWork::where('pjbl_group_id', $id)
                            ->where('pjbl_phase_id', $value->id)
                            ->first();

            if (isset($pgWork)) {
                $unlock = true;

                switch ($value->slug) {
                    case 'orientasi-masalah':
                        $pgwProblem = PgwProblem::where('pg_work_id', $pgWork->id)->first();
                        $passed = $pgwProblem ? true : false;

                        break;
                    case 'menyusun-recana':
                        $passed = $pgWork->file ? true : false;

                        break;
                    case 'menyusun-jadwal':
                        $passed = $pgWork->file ? true : false;

                        break;
                    case 'pengumpulan-evaluasi':
                        $countPgwScore = PgwScore::where('pg_work_id', $pgWork->id)->count();
                        $countPgwEvaluation = PgwEvaluation::where('pg_work_id', $pgWork->id)->count();

                        $doneFeedback = $group->max_member === $countPgwScore && $group->max_member === $countPgwEvaluation ? true: false;
                        $passed = $pgWork->file && $doneFeedback  ? true : false;

                        $value['doneFeedback'] = $doneFeedback;

                        break;
                    case 'refleksi-pembelajaran':
                        $countPgwReflection = PgwReflection::where('pg_work_id', $pgWork->id)->count();
                        $passed = $group->max_member === $countPgwReflection ? true : false;

                        break;
                    default:
                        break;
                }
            }

            $value['passed'] = $passed;
            $value['unlock'] = $unlock;
        }

        return view('pjbl.group.show', compact('group', 'phase'));
    }

    public function groupResult($id, PjblPhase $pjbl_phase)
    {
        $group = PjblGroup::with([
                            'question',
                            'question.competency',
                        ])
                        ->findOrFail($id);

        $pgWork = PgWork::where('pjbl_group_id', $id)
                        ->where('pjbl_phase_id', $pjbl_phase->id)
                        ->first();

        if (!$pgWork) {
            abort(404);
        }

        $data = [
            'group' => $group,
            'pgWork' => $pgWork,
            'phase' => $pjbl_phase,
        ];

        switch ($pjbl_phase->slug) {
            case 'orientasi-masalah':
                $pgwProblem = PgwProblem::where('pg_work_id', $pgWork->id)->first();
                $data['passed'] = $pgwProblem ? true : false;
                $data['pgwProblem'] = $pgwProblem;

                break;
            case 'menyusun-recana':
                $data['passed'] = $pgWork->file ? true : false;

                break;
            case 'menyusun-jadwal':
                $data['passed'] = $pgWork->file ? true : false;

                break;
            case 'pengumpulan-evaluasi':
                $countPgwScore = PgwScore::where('pg_work_id', $pgWork->id)->count();
                $countPgwEvaluation = PgwEvaluation::where('pg_work_id', $pgWork->id)->count();

                $pgWorkId = $pgWork->id;
                $pgMembers = PgMember::where('pjbl_group_id', $pgWork->pjbl_group_id)
                                    ->with([
                                        'user',
                                        'group',
                                        'scores' => function($query) use ($pgWorkId) {
                                            $query->where('pg_work_id', $pgWorkId);
                                        },
                                        'evaluations' => function($query) use ($pgWorkId) {
                                            $query->where('pg_work_id', $pgWorkId);
                                        }
                                    ])
                                    ->get();

                $data['doneFeedback'] = $group->max_member === $countPgwScore && $group->max_member === $countPgwEvaluation ? true : false;
                $data['passed'] = $pgWork->file ? true : false;
                $data['pgMembers'] = $pgMembers;

                break;
            case 'refleksi-pembelajaran':
                $pgwReflection = PgwReflection::with('member')->where('pg_work_id', $pgWork->id)->get();
                $data['passed'] = $group->max_member === count($pgwReflection) ? true : false;
                $data['pgwReflection'] = $pgwReflection;

                break;
            default:
                abort(404);
                break;
        }

        return view("pjbl.group.result.$pjbl_phase->slug", compact('data'));
    }

    public function studentGroupIndex()
    {
        $userId = auth()->user()->id;
        $groups = PjblGroup::whereHas('members', function($query) use ($userId) {
                        $query->where('user_id', $userId);
                    })
                    ->with([
                        'question',
                        'question.competency',
                        'members' => function($query) {
                            $query->with('user');
                        }
                    ])
                    ->get();

        return view('pjbl.student-group.index', compact('groups'));
    }

    public function studentGroupDetail($id)
    {
        $userId = auth()->user()->id;
        $group = PjblGroup::findOrFail($id);

        $isMember = PgMember::where('pjbl_group_id', $id)
                            ->where('user_id', $userId)
                            ->exists();

        if (!$isMember) {
            flash('Kamu bukan anggota dari kelompok ini')->warning();

            return redirect()->back();
        }

        $countMember = PgMember::where('pjbl_group_id', $id)->count();

        if ($group->max_member !== $countMember) {
            flash('Anggota kelompok belum lengkap')->warning();

            return redirect()->back();
        }

        $phase = PjblPhase::all();

        foreach ($phase as $key => $value) {
            $passed = false;
            $unlock = false;

            $pgWork = PgWork::where('pjbl_group_id', $id)
                            ->where('pjbl_phase_id', $value->id)
                            ->first();

            if (isset($pgWork)) {
                $unlock = true;

                switch ($value->slug) {
                    case 'orientasi-masalah':
                        $pgwProblem = PgwProblem::where('pg_work_id', $pgWork->id)->first();
                        $passed = $pgwProblem ? true : false;

                        break;
                    case 'menyusun-recana':
                        $passed = $pgWork->file ? true : false;

                        break;
                    case 'menyusun-jadwal':
                        $passed = $pgWork->file ? true : false;

                        break;
                    case 'pengumpulan-evaluasi':
                        $passed = $pgWork->file ? true : false;

                        break;
                    case 'refleksi-pembelajaran':
                        $pgMemberId = PgMember::where('user_id', $userId)
                                            ->where('pjbl_group_id', $pgWork->pjbl_group_id)
                                            ->value('id');
                        $pgwReflection = PgwReflection::where('pg_work_id', $pgWork->id)
                                                ->where('pg_member_id', $pgMemberId)
                                                ->first();
                        $passed = isset($pgwReflection) && $pgwReflection->file ? true : false;

                        break;
                    default:
                        break;
                }
            }

            $value['passed'] = $passed;
            $value['unlock'] = $unlock;
        }

        return view('pjbl.student-group.show', compact('group', 'phase'));
    }

    public function studentGroupMember($id)
    {
        $userId = auth()->user()->id;
        $group = PjblGroup::findOrFail($id);

        $isMember = PgMember::where('pjbl_group_id', $id)
                    ->where('user_id', $userId)
                    ->exists();

        if (!$isMember) {
            flash('Kamu bukan anggota dari kelompok ini')->warning();

            return redirect()->back();
        }

        $members = PgMember::where('pjbl_group_id', $id)->get();

        return view('pjbl.student-group.member', compact('group', 'members'));
    }

    public function studentGroupResult($id, PjblPhase $pjbl_phase)
    {
        $userId = auth()->user()->id;
        $group = PjblGroup::with([
                            'question',
                            'question.competency',
                        ])
                        ->findOrFail($id);
        $isMember = PgMember::where('pjbl_group_id', $id)
                            ->where('user_id', $userId)
                            ->exists();

        if (!$isMember) {
            flash('Kamu bukan anggota dari kelompok ini')->warning();

            return redirect()->back();
        }

        $pgWork = PgWork::where('pjbl_group_id', $id)
                        ->where('pjbl_phase_id', $pjbl_phase->id)
                        ->first();

        if (!$pgWork) {
            abort(404);
        }

        $data = [
            'group' => $group,
            'pgWork' => $pgWork,
            'phase' => $pjbl_phase,
        ];

        switch ($pjbl_phase->slug) {
            case 'orientasi-masalah':
                $pgwProblem = PgwProblem::where('pg_work_id', $pgWork->id)->first();
                $data['passed'] = $pgwProblem ? true : false;
                $data['pgwProblem'] = $pgwProblem;

                break;
            case 'menyusun-recana':
                $data['passed'] = $pgWork->file ? true : false;

                break;
            case 'menyusun-jadwal':
                $data['passed'] = $pgWork->file ? true : false;

                break;
            case 'pengumpulan-evaluasi':
                $pgWorkId = $pgWork->id;                
                $pgMembers = PgMember::where('pjbl_group_id', $pgWork->pjbl_group_id)
                                    ->with([
                                        'user',
                                        'group',
                                        'scores' => function($query) use ($pgWorkId) {
                                            $query->where('pg_work_id', $pgWorkId);
                                        },
                                        'evaluations' => function($query) use ($pgWorkId) {
                                            $query->where('pg_work_id', $pgWorkId);
                                        }
                                    ])
                                    ->get();
                $data['passed'] = $pgWork->file ? true : false;
                $data['pgMembers'] = $pgMembers;

                break;
            case 'refleksi-pembelajaran':
                $pgMemberId = PgMember::where('user_id', $userId)
                                    ->where('pjbl_group_id', $pgWork->pjbl_group_id)
                                    ->value('id');
                $pgwReflection = PgwReflection::where('pg_work_id', $pgWork->id)
                                        ->where('pg_member_id', $pgMemberId)
                                        ->first();
                $data['passed'] = isset($pgwReflection) && $pgwReflection->file ? true : false;
                $data['pgwReflection'] = $pgwReflection;

                break;
            default:
                abort(404);
                break;
        }

        return view("pjbl.student-group.result.$pjbl_phase->slug", compact('data'));
    }

    public function storeProblem(Request $request)
    {
        $request->validate([
            'pg_work_id' => 'required|integer',
            'desc_1' => 'required|string|max:1000',
            'desc_2' => 'required|string|max:1000',
            'desc_3' => 'required|string|max:1000',
        ]);

        $pgWork = PgWork::findOrFail($request->pg_work_id);

        $existPgwProblem = PgwProblem::where('pg_work_id', $pgWork->id)->exists();

        if ($existPgwProblem) {
            flash('Data sudah ada, silahkan cek kembali')->warning();

            return redirect()->back();
        }

        PgwProblem::create([
            'pg_work_id' => $pgWork->id,
            'desc_1' => $request->desc_1,
            'desc_2' => $request->desc_2,
            'desc_3' => $request->desc_3,
        ]);

        PgWork::create([
            'pjbl_group_id' => $pgWork->pjbl_group_id,
            'pjbl_phase_id' => 2,
            'status' => 'unlock',
        ]);

        flash('Data berhasil disimpan')->success();

        return redirect()->back();
    }

    public function storeFile(Request $request)
    {
        $request->validate([
            'pg_work_id' => 'required|integer',
            'pdf_file' => 'required|mimes:pdf|max:2048',
        ]);

        $userId = auth()->user()->id;
        $pgWork = PgWork::findOrFail($request->pg_work_id);
        $pgMemberId = PgMember::where('user_id', $userId)
                            ->where('pjbl_group_id', $pgWork->pjbl_group_id)
                            ->value('id');

        if ($pgWork->pjbl_phase_id == 5) {
            $pgwReflection = PgwReflection::where('pg_work_id', $pgWork->id)
                                        ->where('pg_member_id', $pgMemberId)
                                        ->first();

            if (isset($pgwReflection) && $pgwReflection->file) {
                flash('Data sudah ada, silahkan cek kembali')->warning();

                return redirect()->back();
            }
        } else {
            if ($pgWork->file) {
                flash('Data sudah ada, silahkan cek kembali')->warning();

                return redirect()->back();
            }
        }

        switch ($pgWork->pjbl_phase_id) {
            case 2:
                $nextPhaseId = 3;
                break;
            case 3:
                $nextPhaseId = 4;
                break;
            case 4:
                $nextPhaseId = 5;
                break;
            default:
                $nextPhaseId = 0;
                break;
        }

        if ($request->hasFile('pdf_file')) {
            $pdf = rand() . '.' . $request->pdf_file->getClientOriginalExtension();
            Storage::putFileAs('public/pdf', $request->file('pdf_file'), $pdf);
        }

        if ($pgWork->pjbl_phase_id == 5) {
            PgwReflection::create([
                'pg_work_id' => $pgWork->id,
                'pg_member_id' => $pgMemberId,
                'file' => $pdf,
            ]);
        } else {
            $pgWork->update(['file' => $pdf]);

            PgWork::create([
                'pjbl_group_id' => $pgWork->pjbl_group_id,
                'pjbl_phase_id' => $nextPhaseId,
                'status' => 'unlock',
            ]);
        }

        flash('Data berhasil disimpan')->success();

        return redirect()->back();
    }

    public function storeFeedback(Request $request)
    {
        $data = $request->validate([
            'pg_work_id' => 'required|integer',
            'feedbacks' => 'required|array',
            'feedbacks.*.member_id' => 'required|integer|exists:pg_members,id',
            'feedbacks.*.score' => 'required|numeric|min:0|max:100',
            'feedbacks.*.evaluation' => 'required|string',
        ]);

        try {
            DB::beginTransaction();

            foreach ($data['feedbacks'] as $feedback) {
                PgwScore::updateOrCreate(
                    [
                        'pg_member_id' => $feedback['member_id'], 
                        'pg_work_id' => $data['pg_work_id']
                    ],
                    ['value' => $feedback['score']]
                );

                PgwEvaluation::updateOrCreate(
                    [
                        'pg_member_id' => $feedback['member_id'],
                        'pg_work_id' => $data['pg_work_id']
                    ],
                    ['description' => $feedback['evaluation']]
                );
            }

            DB::commit();

            flash('Feedback berhasil disimpan!')->success();

            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Feedback error: ' . $e->getMessage());
            
            flash('Terjadi kesalahan saat menyimpan feedback.')->warning();

            return redirect()->back();
        }
    }
}
