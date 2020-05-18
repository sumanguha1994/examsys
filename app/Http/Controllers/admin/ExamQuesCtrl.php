<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use App\models\ExamType;
use App\models\ExamSet;
use App\models\ExamQues;
use App\Http\Requests\admin\ExamQueReq;

class ExamQuesCtrl extends Controller
{
    public function index()
    {
        $data['exams'] = ExamType::all();
        $data['questions'] = DB::table('exam_ques as q')
                                ->select('q.*', 's.set_name', 'e.exam_name')
                                ->join('exam_sets as s', 'q.exam_set_id', '=', 's.id')
                                ->join('exam_types as e', 's.exam_id', '=', 'e.id')
                                ->get()
                                ->toArray();
        return \View::make('admin.exam.question', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $que = ExamQues::updateOrCreate(['id' => $request->uid], [
            'exam_set_id' => $request->exam_set_no,
            'question' => $request->question,
            'ans_a' => $request->opt1,
            'ans_b' => $request->opt2,
            'ans_c' => $request->opt3,
            'ans_d' => $request->opt4,
            'ans_e' => (isset($request->opt5) && !empty($request->opt5)) ? $request->opt5 : 'N/A',
            'currect_ans' => $request->answer,
            'marks' => $request->mark,
        ]);
        return redirect()->to('admin/exam-question');
    }

    public function show($id)
    {
        //
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
