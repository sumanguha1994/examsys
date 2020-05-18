<?php
namespace App\models;
use Illuminate\Database\Eloquent\Model;

class UserResult extends Model
{
    protected $fillable = [
        'user_id', 'exam_set_id', 'totalmarks', 'marks'
    ];
}
