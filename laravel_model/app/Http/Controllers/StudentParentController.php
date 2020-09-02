<?php

namespace App\Http\Controllers;

use App\Model\Guidian;
use App\Model\Student;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class StudentParentController extends Controller
{
    public function index ()
    {
        $sp = Guidian::all();
        return view('parent.index', ['sp' => $sp]);
    }

    public function addParentHelper ()
    {
        $students = Student::all();
        return view('parent.parent_add_helper', ['students'=>$students]);
    }

    public function addParent (Request $request, Guidian $sp)
    {
        $sp->fathers_name = $request->fathers_name;
        $sp->mothers_name = $request->mothers_name;
        $sp->parents_contact = $request->parents_contact;
        $sp->student_id = $request->student_name;
        $sp->save();
        return Redirect()->route('parent.index')->with(['message'=>'Data successfully inserted!']);
    }
}
