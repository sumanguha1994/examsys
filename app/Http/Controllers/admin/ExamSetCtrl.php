<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\models\ExamType;
use App\Http\Requests\admin\ExamSetReq;
use App\models\ExamSet;
use App\models\ExamQues;
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
        $value = ExamSet::where('exam_id', $id)->select('*')->get()->toArray();
        return response()->json($value);
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
        $delete = false;
        if(ExamSet::where('id', $id)->delete()){
            ExamQues::where('exam_set_id', $id)->delete();
            $delete = true;
        }else{
            $delete = false;
        }
        return response()->json($delete);
    }
}
