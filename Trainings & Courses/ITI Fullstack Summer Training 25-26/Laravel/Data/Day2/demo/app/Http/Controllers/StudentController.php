<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //

//    function getStudents()
//    {
//     // all students from db
//     // $students=DB::table('students')->get() ;
//     // dd($students); // dump and die  ==> show data in array + exit


//     // MODEL ==> modelName ==> sigular , table ==> pulral   ==> same Name
//     $students=Student::all();
//     return view('students',['students'=>$students]);
//    }

//  function getStudentData($id)
//    {
//     // $student=Student::find($id);
//     $student=Student::findOrFail($id);
//     // dd($student);
//     return view('studentData',compact('student'));
//     // return view('studentData',['student'=>$student]);
//    }
   function index()
   {

    $students=Student::all();
    return view('students',['students'=>$students]);
   }


   function show($id)
   {
    // $student=Student::find($id);
    $student=Student::findOrFail($id);
    // dd($student);
    return view('studentData',compact('student'));
    // return view('studentData',['student'=>$student]);
   }

   function destroy($id)
   {
      $student=Student::findOrFail($id);
      $student->delete();
      return to_route('students.index');
   }

}
