<?php

namespace App\Http\Controllers;

use App\Model\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student.index', ['students'=>$students]);
    }

    public function studentAddHelper ()
    {
        return view('student.add_helper');
    }

    public function addStudent (Request $request, Student $student)
    {
        $student->student_name = $request->student_name;
        $student->student_email = $request->student_email;
        $student->student_class = $request->student_class;
        $student->student_address = $request->student_address;
        $student->save();

        return Redirect()->route('student.index')->with(['message'=>'Data successfully inserted!']);
    }

    public function deleteStudent ($id)
    {
        $students = Student::all();
        $std = $students->find($id);
        $std->delete();
        return Redirect()->route('student.index')->with(['message'=>'Data successfully deleted!']);
    }

    public function editHelper ($id)
    {
        $students = Student::all();
        $student = $students->find($id);
        return view('student.edit_helper', ['student' => $student]);
    }

    public function updateStudent(Request $request, $id)
    {
        $students = Student::all();
        $student = $students->find($id);

        $student->student_name = $request->student_name;
        $student->student_email = $request->student_email;
        $student->student_class = $request->student_class;
        $student->student_address = $request->student_address;
        $student->update();

        return Redirect()->route('student.index')->with(['message'=>'Data successfully updated!']);
    }
}
