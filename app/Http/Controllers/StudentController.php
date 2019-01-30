<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Studentsubject;
use App\Model\Subject;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

        return view('sv.index',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$this->checkSv($request->name)){

            $student = new Student();
            $student->name = $request->name;
            $student->save();

        }
        return redirect()->route('student.index');
    }

    /***
     * Kiểm tra có tên người dùng trong bảng sinh viên chưa
     * @param $name
     * @return bool
     */
    public function checkSv($name){

        $student = Sv::where('name','=',$name)->get();

        if(!empty($student[0]->name)){
            return true;
        }

        return false;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit',['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->name = $request->name;
        $student->save();

        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student_subjects = Studentsubject::where('student_id)','=',$id)->get();
        foreach ($student_subjects as $student_subject){
            $student_subject->delete();
        }

        $student = Student::find($id);
        $student->delete();

        return redirect()->route('student.index');
    }
}
