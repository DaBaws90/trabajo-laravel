<?php

namespace escuelaempresa\Http\Controllers;

use Illuminate\Http\Request;
use escuelaempresa\Student;
use escuelaempresa\Grade;
use escuelaempresa\Petition;
use escuelaempresa\Company;

class PetitionController extends Controller
{
    public function index(){
        $petitions = Petition::latest()->paginate(5);
        $grades = Grade::all();
        $companies = Company::all();
      // dd($petitions);
        return view('petitions.index',compact('petitions','grades','companies'));
    }

    public function listDates(Request $request){
        $from = $request->from;
        $to = $request->to;
        return view('petitions.dates');
    }

    public function detailView(Petition $petition){
        return view('petitions.detail', compact("petition"));
    }

    public function editView(Petition $petition){
        $grades = Grade::all();
        $companies = Company::all();
        return view('petitions.editView', compact('petition','grades','companies'));
    }

    public function editPetition(Petition $petition){
        $this->validate(request(),[
            'id_company'=>'required',
            'id_grade'=>'required',
            'type'=>'required',
            'n_students'=>'required|min:1'
            
        ], [
           
        ]);       
        

        

        $res = Petition::find($petition->id);
        //$petition=Petition::latest()->first();
        $res->id_company = request()->id_company;
        $res->id_grade = request()->id_grade;
        $res->type = request()->type;
        $res->n_students = request()->n_students;

        
        $res->save();
        if ($res){
            return back()->with('message', ['success' , 'Peticion creada correctamente']);
        }
        else{
            return back()->with('message', ['danger' , 'No se pudo crear la peticion']);
        }


    }
    

    public function store(){
        $this->validate(request(),[
            'id_company'=>'required',
            'id_grade'=>'required',
            'type'=>'required',
            'n_students'=>'required|min:1'
            
        ], [
           
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
