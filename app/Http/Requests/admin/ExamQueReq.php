<?php
namespace App\Http\Requests\admin;
use Illuminate\Foundation\Http\FormRequest;

class ExamQueReq extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'exam_id' => 'required',
            'exam_set_no' => 'required', 
            'question' => 'required',
            'answer' => 'required',
            'opt1' => 'required',
            'opt2' => 'required',
            //'marks' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'exam_id.required' => 'Exam Name Required.',
            'question.required' => 'Question Required',
            'answer.required' => 'Wright Answer Required',
            'opt1.required' => 'Minimum Two option required',
            'opt2.required' => 'Minimum Two option required',
            //'marks.required' => 'Question Marks Required'
        ];
    }
}
