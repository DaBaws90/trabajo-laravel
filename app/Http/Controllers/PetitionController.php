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
        $grades = Grade::all();
      // dd($petitions);
        return view('petitions.index',compact('petitions','grades'));
    }

    public function listDates(Request $request){
        $from = $request->from;
        $to = $request->to;
        return view('petitions.dates');
    }
    

    public function store(){
        $this->validate(request(),[
            'id_company'=>'required',
            'id_grade'=>'required',
            'type'=>'required',
            'n_students'=>'required|min:1'
            
        ], [
           // "level.digits" => __("Introduce si es de 1, 2 o 3 curso")
        ]);       
        

        

        $res = Petition::create(request()->all());
        $petition=Petition::latest()->first();

        

        if ($res){
            return back()->with('message', ['success' , 'Peticion creada correctamente']);
        }
        else{
            return back()->with('message', ['danger' , 'No se pudo crear la peticion']);
        }
    }

    public function delete(Petition $petition){
        
        $destroy = Petition::destroy($petition->id);
        if ($destroy){
            return back()->with('message', ['success' , 'Peticion eliminada correctamente']);
        }
        else{
            return back()->with('message', ['danger' , 'No se pudo eliminar la peticion']);
        }
    }
}
