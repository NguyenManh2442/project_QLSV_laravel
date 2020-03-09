<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    protected $table = "subjects";

    protected $fillable = ['subjectCode','subjectName','subjectTeacher','startDay'];

    public $timestamp = false;

    public function infor_subjects()
    {
        return $this->hasMany('App\InforSubjects','subjectCode');
    }
}
