<?php

namespace escuelaempresa\Http\Controllers;

use Illuminate\Http\Request;
use escuelaempresa\Grade;


class GradeController extends Controller
{
    public function index(){
        $grades = Grade::latest()->paginate(5);
       //dd($grades);
        return view('grades.index',compact("grades"));
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
