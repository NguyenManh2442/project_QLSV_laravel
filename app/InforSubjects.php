<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InforSubjects extends Model
{
    protected $table = "infor_subjects";
    protected $fillable = ['id','subjectCode', 'studentCode'];
}
