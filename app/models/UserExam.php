<?php
namespace App\models;
use Illuminate\Database\Eloquent\Model;

class UserExam extends Model
{
    protected $fillable = [
        'candidate_id', 'exam_id'
    ];
}
