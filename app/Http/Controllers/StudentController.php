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

    public function store(){
        $this->validate(request(),[
            'name'=>'required|max:20',
            'lastname'=>'required|max:50',
            'age'=>'required'
        ]);
        Student::create(request()->all());
        return back()->with('message', ['success', __('Estudiante creado correctamente')]);
    }
}
