<?php

namespace escuelaempresa\Http\Controllers;

use Illuminate\Http\Request;
use escuelaempresa\Student;
use escuelaempresa\Grade;
use escuelaempresa\Petition;

class PetitionController extends Controller
{
    public function index(){
        $petitions = Petition::latest()->paginate(5);
      // dd($petitions);
        return view('petitions.index',compact("petitions"));
    }
}
