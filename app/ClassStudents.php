<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassStudents extends Model
{
    protected $table = "class";

    protected $fillable = ['classCode','className','homeroomTeacher'];

    public $timestamp = false;

    public function students()
    {
        return $this->hasMany('App\Students','classCode');
    }
}
