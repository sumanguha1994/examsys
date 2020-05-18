<?php
namespace App\models;
use Illuminate\Database\Eloquent\Model;

class ExamSet extends Model
{
    protected $fillable = [
        'exam_id', 'set_name'
    ];
}
