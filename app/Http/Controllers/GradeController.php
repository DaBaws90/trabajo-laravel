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
            'level'=>'required|digit:1'
            
        ], [
            "level.digits" => __("Level field must be 1 digit")
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
        
        return view('grades.detail', compact("grade"));
    }

    public function editView(Grade $grade){
        return view('grades.editView', compact("grade"));
    }

    public function editGrade(Grade $grade){
        $this->validate(request(),[
            'name'=>'required|max:75',
            'level'=>'required|digits:1'
        ], [
            "level.digits" => __("Level field must be 1 digit")
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
}
