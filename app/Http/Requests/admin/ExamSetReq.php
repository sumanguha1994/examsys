<?php
namespace App\Http\Requests\admin;
use Illuminate\Foundation\Http\FormRequest;

class ExamSetReq extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'exam_id' => 'required',
            'exam_set_no' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'exam_id.required' => 'Exam Name Required.',
            'exam_set_no.required' => 'Exam Set Name/No Required'
        ];
    }
}
