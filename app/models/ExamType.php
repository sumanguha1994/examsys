<?php
namespace App\models;
use Illuminate\Database\Eloquent\Model;

class ExamType extends Model
{
    protected $fillable = [
        'exam_name', 'exam_banner'
    ];
}
