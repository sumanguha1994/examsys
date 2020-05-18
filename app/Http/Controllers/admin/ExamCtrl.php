<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use DB;
use App\Http\Requests\admin\ExamReq;
use App\models\ExamType;

class ExamCtrl extends Controller
{
    public function index()
    {
        $data['exams'] = ExamType::all();
        return \View::make('admin.exam.exams', $data);
    }

    public function create()
    {
        //
    }

    public function store(ExamReq $request)
    {
        $fullpath = '';
        if($request->hasFile('exam_banner')){
            $destinationPath = public_path('banner/');
            $file = $request->file('exam_banner');
            $file->move($destinationPath,$file->getClientOriginalName());
            $path = 'banner/'.$file->getClientOriginalName();
        }else{
            if(isset($_POST['banneroldpic']) && !empty($_POST['banneroldpic'])){
                $path = $request->banneroldpic;
            }
        };
        ExamType::updateOrCreate(['id' => $request->uid], [
            'exam_name' => $request->exam_name,
            'exam_banner' => $fullpath
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
