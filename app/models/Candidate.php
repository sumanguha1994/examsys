<?php
namespace App\models;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $fillable = [
        'name', 'phoneno', 'emailid', 'address', 'password', 'status'
    ];
}
