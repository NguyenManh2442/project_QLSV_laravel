<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\InforSubjects as InforSubjectsResources;
use App\InforSubjects;

class InforSubjectController extends Controller
{
    public function store(Request $request){
        InforSubjects::create($request->all());

        $studentCode = $request->studentCode;
        $mh = InforSubjects::where('studentCode',$studentCode)
            ->join('subjects','subjects.subjectCode','=','infor_subjects.subjectCode')
            ->select('infor_subjects.id', 'subjects.subjectCode', 'subjects.subjectName', 'subjects.startDay')
            ->get();
        $monhoc = InforSubjectsResources::collection($mh);
        return $monhoc;
    }

    public function destroy(InforSubjects $id)
    {
        $id->delete();
    }
}
