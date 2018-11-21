<?php

namespace escuelaempresa\Http\Controllers;

use Illuminate\Http\Request;
use escuelaempresa\Grade;
use escuelaempresa\Petition;


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
            'level'=>['required','regex:^[1-3]^']
            
        ], [
            "level.digits" => __("Introduce si es de 1, 2 o 3 curso")
        ]);       


        $res = Grade::create(request()->all());
        if ($res){
            return back()->with('message', ['success' , 'Ciclo creado correctamente']);
        }
        else{
            return back()->with('message', ['danger' , 'No se pudo crear el Ciclo']);
        }
    }

    public function details(Grade $grade){
        // $petitionsFCT = Petition::where('id_grade', $grade->id)->where('type', "FCT")->get();
        $petitionsFCT = Petition::where(['id_grade'=> $grade->id, 'type'=> "FCT"])->with('company')->get();
        // dd($petitionsFCT);
        $petitionsDUAL = Petition::where(['id_grade'=> $grade->id, 'type'=> "DUAL"])->with('company')->get();
        $petitionsEmpleo = Petition::where(['id_grade'=> $grade->id, 'type'=> "Empleo"])->with('company')->get();
        return view('grades.detail', compact("grade", "petitionsFCT", "petitionsDUAL", "petitionsEmpleo"));
    }

    public function searchType($type, Grade $grade){
        $results = Petition::where('id_grade', $grade->id)->where('type', $type)->get();
        // dd($results);
        return view('grades.list', compact("results"));
    }

    public function editView(Grade $grade){
        return view('grades.editView', compact("grade"));
    }

    public function editGrade(Grade $grade){
        $this->validate(request(),[
            'name'=>'required|max:75',
            'level'=>['required','regex:^[1-3]^']
        ], [
            "level.digits" => __("Introduce si es de 1, 2 o 3 curso")
        ]);
        $res = Grade::find($grade->id);
        $res->name = request()->name;
        $res->level = request()->level;
       
        $res->save();
        if ($res){
            return back()->with('message', ['success' , 'Ciclo editado correctamente']);
        }
        else{
            return back()->with('message', ['danger' , 'No se pudo editar el Ciclo']);
        }
      
    }

    public function delete(Grade $grade){
        
        $destroy = Grade::destroy($grade->id);
        if ($destroy){
            return back()->with('message', ['success' , 'Ciclo eliminado correctamente']);
        }
        else{
            return back()->with('message', ['danger' , 'No se pudo eliminar el Ciclo']);
        }
    }

    public function destroyPetition(Petition $petition, Grade $grade){
        // $grade = Grade::find($petition->id_grade);
        $destroy = Petition::destroy($petition->id);
        if ($destroy){
            return redirect()->route('details', $grade->id)->with('message', ['success' , 'Petición eliminada correctamente']);
        }
        else{
            return redirect()->route('details', $grade->id)->with('message', ['danger' , 'No se pudo eliminar la participación']);
        }
    }
}
