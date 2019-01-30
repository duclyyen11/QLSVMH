<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = "subjects";
    public $fillable = ['name'];

    public function students(){

        return $this->belongsToMany('App\Student','student_subject','subject_id','student_id');
    }
}
