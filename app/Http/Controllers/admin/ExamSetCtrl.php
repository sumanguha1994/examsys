<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\models\ExamType;
use App\Http\Requests\admin\ExamSetReq;
use App\models\ExamSet;
use DB;

class ExamSetCtrl extends Controller
{
    public function index()
    {
        $data['exams'] = ExamType::all();
        $data['sets'] = DB::table('exam_sets as s')
                            ->select('e.exam_name', 's.*')
                            ->join('exam_types as e', 's.exam_id', '=', 'e.id')
                            ->get()
                            ->toArray();
        return \View::make('admin.exam.sets', $data);
    }

    public function create()
    {
        //
    }

    public function store(ExamSetReq $request)
    {
        $sets = ExamSet::updateOrCreate(['id' => $request->uid], [
            'exam_id' => $request->exam_id,
            'set_name' => $request->exam_set_no
        ]);
        return redirect()->back();
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
