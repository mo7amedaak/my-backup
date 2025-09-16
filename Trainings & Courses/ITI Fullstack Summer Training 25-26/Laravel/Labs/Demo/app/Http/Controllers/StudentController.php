<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Track;
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

    // $students=Student::all();
    $students=Student::orderBy('id',"desc")->paginate(5);
    return view('students',['students'=>$students]);
   }


   function show($id)
   {
    // $student=Student::find($id);
    $student=Student::findOrFail($id);
    // dd($student);// track_id
    return view('studentData',compact('student'));
    // return view('studentData',['student'=>$student]);
   }

   function destroy($id)
   {
      $student=Student::findOrFail($id);
      $student->delete();
      return to_route('students.index');
   }

   function create()
   {
    $tracks=Track::all();

    return view('create',compact('tracks'));
   }

   function store(Request $request)
   {
    // dd($_REQUEST);
    // dd(request()->all());
    // $requestedData=request()->except('_token');



    $requestedData=request()->validate([
        // validation
        'name' => 'required|unique:students,name|min:3',
        'image' => 'unique:students,image',
        'email' => 'required|unique:students,email',
        'address' => 'required',
        'phone' => 'required|unique:students,phone|min:11',
        'gender' => 'required',
    ],[
        // message
        'name.required'=>'student name is required',
        'name.min'=>'student name must be more than three characters',
        'email.required'=>'student email is required',
        'email.unique'=>'student email is unique',
        'phone.min'=>'student phone must be 11 numbers',
    ]);
    $requestedData=request()->all();
    // dd($requestedData);
    Student::create($requestedData);
    return to_route('students.index');


   }

   function update($id)
   {
    $student=Student::findOrFail($id);
    return view('update',compact('student'));

   }

   function edit($id)
   {
    //    dd(request()->all());
        $student=Student::findOrFail($id);
     $requestedData=request()->all();
     $student->update($requestedData);
    //  return to_route('students.show',compact('student'));
    return to_route('students.index');

   }

}
