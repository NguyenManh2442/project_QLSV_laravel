<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Subjects as SubjectsResources;
use App\Subjects;

class SubjectController extends Controller
{
    public function index(){
        $class = Subjects::all();
        return SubjectsResources::collection($class);
    }
    public function store(Request $request){
        $students = Subjects::create($request->all());
        return new SubjectsResources($students);
    }
    public function show(Subjects $id)
    {
        return new SubjectsResources($id);
    }
    public function update(Request $request, Subjects $id)
    {
        $id->update($request->all());;
        $class = Subjects::all();
        return SubjectsResources::collection($class);
    }
    public function destroy(Subjects $id)
    {
        $id->delete();
    }
}
