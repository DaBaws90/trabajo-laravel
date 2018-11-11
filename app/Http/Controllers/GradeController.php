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
}
