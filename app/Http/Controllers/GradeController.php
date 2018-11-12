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
            'name'=>'required|max:75',
            'level'=>'required|max:10'
            
        ]);
        Grade::create(request()->all());
        return back()->with('message', ['success', __('Ciclo creado correctamente')]);
    }

    public function details(Grade $grade){
        
        return view('grades.detail', compact("grade"));
    }

    public function editView(Grade $grade){
        return view('grades.editView', compact("grade"));
    }
}
