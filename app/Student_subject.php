<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentsubject extends Model
{
    protected $table = "student_subjects";
    public $fillable = ['student_id','subject_id'];
}
