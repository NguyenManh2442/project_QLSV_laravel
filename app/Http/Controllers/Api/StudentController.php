<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\InforSubjects as InforSubjectsResources;
use App\Http\Resources\Students as StudentsResources;
use App\Students;
use App\InforSubjects;
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{
    public function index()
    {
        $class = Students::all();
        return StudentsResources::collection($class);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'studentCode' => 'required',
            'classCode' => 'required'

        ]);
        $user = new Students([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'studentCode' => $request->studentCode,
            'classCode' => $request->classCode

        ]);
        $user->save();
//        return response()->json([
//            'message' => 'Successfully created user!'
//        ], 201);
        return new StudentsResources($user);
    }

    public function show(Students $id)
    {
        $students = new StudentsResources($id);
        return $students;
    }

    public function showSubject(Students $id)
    {
        $students = new StudentsResources($id);
        $studentCode = $students->studentCode;
        $mh = InforSubjects::where('studentCode', $studentCode)
            ->join('subjects', 'subjects.subjectCode', '=', 'infor_subjects.subjectCode')
            ->select('infor_subjects.id', 'subjects.subjectCode', 'subjects.subjectName', 'subjects.startDay')
            ->get();
        $monhoc = InforSubjectsResources::collection($mh);
        return $monhoc;
    }

    public function update(Request $request, Students $id)
    {
        $request['password'] = bcrypt($request->password);
        $id->update($request->all());
        $class = Students::all();
        return StudentsResources::collection($class);
    }

    public function destroy(Students $id)
    {
        $id->delete();
    }


    public function login(Request $request)
    {
        if (Auth::guard('student')->attempt(
            [
                'email' => request('email'),
                'password' => request('password')
            ]
        )) {
            $user = Auth::guard('student')->user();
            $success['token'] = $user->createToken('MyApp')->accessToken;

            return response()->json(
                [
                    'success' => $success
                ]
            );
        } else {
            return response()->json(
                [
                    'error' => 'Unauthorised'
                ]
                , 401);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
