<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Subject;
use App\Studentsubject;
use App\Student;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();
        return view('subject.index',['subjects' =>$subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subject.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$this->checkMh($request->name)){
            $subject = new Subject();
            $subject->name = $request->name;
            $subject->save();
        }
        return redirect()->route('student.index');
    }

    /***
     * Kiểm tra có tên môn học trong bảng môn học chưa
     * @param $name
     * @return bool
     */
    public function checkMh($name){

        $subject = Subject::where('name','=',$name)->get();
        if(!empty($subject[0]->name)){
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
        $subject = Subject::find($id);
        return view('subject.edit',['subject'=>$subject]);
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

        $subject = Subject::find($id);
        $subject->name = $request->name;
        $subject->save();

        return redirect()->route('subject.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student_subjects = Studentsubject::where('subject_id','=',$id)->get();
        foreach ($student_subjects as $student_subject){
            $student_subject->delete();
        }

        $subject = Subject::find($id);
        $subject->delete();

        return redirect()->route('subject.index');
    }
}
