<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ClassStudents;
use App\Students;
use App\Http\Resources\ClassStudent as ClassResources;
use App\Http\Resources\Students as StudentsResources;
class ClassController extends Controller
{
    public function index(){
        $class = ClassStudents::all();
        return ClassResources::collection($class);
    }

    public function store(){

        $class = ClassStudents::create(request()->all());
        return new ClassResources($class);
    }

    public function show(ClassStudents $id)
    {
        $class = new ClassResources($id);
        return $class;
    }
    public function showStudent(Request $request){
        $classCode = $request->classCode;
        $sv = Students::where('classCode',$classCode)->get();
        $sinhvien = StudentsResources::collection($sv);
        return $sinhvien;
    }
    public function update(ClassStudents $id)
    {
        $id->update(request()->all());
        $class = Students::all();
        return StudentsResources::collection($class);
    }

    public function destroy(ClassStudents $id)
    {
        $id->delete();
    }
}
