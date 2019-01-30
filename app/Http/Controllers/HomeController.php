<?php

namespace App\Http\Controllers;

use App\Model\Subject;
use Illuminate\Http\Request;
use App\Student;
use App\Studentsubject;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(1);
//        $students = Student::with('subjects')->get();
//        $subjects = Subject::with('students')->get();
//        return view('home.index',['students'=>$students,'subjects'=>$subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = Student::find($request->student);

        if(!$this->checkMh($request)){
            $student->subjects()->attach($request->subject)->get();
        }

        return redirect()->route('index');
    }

    /***
     * Check new mh not in old mh
     * @param $mhs
     * @param $mh
     */
    public function checkMh($request){

        if(Studentsubject::where(['student_id'=>$request->student,'subject_id'=>$request->subject])->get()->isEmpty()){
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $student = Student::find($id);
        $student->subjects()->detach($_GET['subject_id']);

        return redirect()->route('index');
    }
}
