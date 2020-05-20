<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use App\models\ExamType;
use App\models\UserExam;
use App\models\Candidate;

class CommonCtrl extends Controller
{
    public function index()
    {
        $data['exams'] = ExamType::all();
        $data['candidates'] = DB::table('user_exams as ue')
                                    ->select(['et.exam_name', 'c.*', 'ue.status', 'ue.exam_id'])
                                    ->join('candidates as c', 'ue.candidate_id', '=', 'c.id')
                                    ->join('exam_types as et', 'ue.exam_id', '=', 'et.id')
                                    //->orderBy('') //created_at DESC
                                    ->get()
                                    ->toArray();
        return \View::make('admin.candidates', $data);
    }

    public function create($id, $examid, $status)
    {
        $update = UserExam::where(['candidate_id' => $id, 'exam_id' => $examid])->update([
            'status' => $status
        ]);
        return response()->json($update);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        if($id !== 'all'){
            $data = DB::table('user_exams as ue')
                        ->select(['et.exam_name', 'c.*', 'ue.status', 'ue.exam_id'])
                        ->join('candidates as c', 'ue.candidate_id', '=', 'c.id')
                        ->join('exam_types as et', 'ue.exam_id', '=', 'et.id')
                        ->where('ue.exam_id', $id)
                        ->get()
                        ->toArray();
        }else{
            $data = DB::table('user_exams as ue')
                        ->select(['et.exam_name', 'c.*', 'ue.status', 'ue.exam_id'])
                        ->join('candidates as c', 'ue.candidate_id', '=', 'c.id')
                        ->join('exam_types as et', 'ue.exam_id', '=', 'et.id')
                        ->get()
                        ->toArray();
        }
        return response()->json($data);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
