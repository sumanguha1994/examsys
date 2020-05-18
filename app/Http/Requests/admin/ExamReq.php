<?php
namespace App\Http\Requests\admin;
use Illuminate\Foundation\Http\FormRequest;

class ExamReq extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'exam_name' => 'required|min:2'
        ];
    }
    public function messages()
    {
        return [
            'exam_name.required' => 'Exam Name Required.',
            'exam_name.min' => `Minimum 2digit Required`,
        ];
    }
}
