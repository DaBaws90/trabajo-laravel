<?php

namespace escuelaempresa\Http\Controllers;

use Illuminate\Http\Request;
#use escuelaempresa\;

class StudentController extends Controller
{
    public function index(){
        return view('students');
    }
}
