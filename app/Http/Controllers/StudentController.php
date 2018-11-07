<?php

namespace escuelaempresa\Http\Controllers;

use Illuminate\Http\Request;
use escuelaempresa\Student;

class StudentController extends Controller
{
    public function index(){
        $students = Student::latest()->paginate(5);
        //dd($students);
        return view('students.index',compact("students"));
    }
}
