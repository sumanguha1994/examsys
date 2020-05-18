<?php
namespace App\models;
use Illuminate\Database\Eloquent\Model;

class ExamQues extends Model
{
    protected $fillable = [
        'exam_set_id', 'question', 'ans_a', 'ans_b', 'ans_c', 'ans_d', 'ans_e', 'currect_ans', 'marks' 
    ];
}
