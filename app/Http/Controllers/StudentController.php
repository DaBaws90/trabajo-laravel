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

    public function details(Student $student){
        //dd($student);
        return view('students.detail', compact("student"));
    }

    public function store(){
        $this->validate(request(),[
            'name'=>'required|max:20',
            'lastname'=>'required|max:50',
            'age'=>'required'
        ]);
        $res = Student::create(request()->all());
        if ($res){
            return back()->with('message', ['success' , 'Estudiante creado correctamente']);
        }
        else{
            return back()->with('message', ['danger' , 'No se pudo crear el estudiante']);
        }
    }

    public function editView(Student $student){
        return view('students.editView', compact("student"));
    }

    public function editStudent(Student $student){
        $this->validate(request(),[
            'name'=>'required|max:20',
            'lastname'=>'required|max:50',
            'age'=>'required'
        ]);
        $res = Student::find($student->id);
        $res->name = request()->name;
        $res->lastname = request()->lastname;
        $res->age = request()->age;
        $res->save();
        if ($res){
            return back()->with('message', ['success' , 'Estudiante editado correctamente']);
        }
        else{
            return back()->with('message', ['danger' , 'No se pudo editar el estudiante']);
        }
        //push()relationships
    }

    public function delete(Student $student){
        //Sin recuperar el registro
        //Student::destroy($student->id);

        //Recuperando el registro si recibiésemos un id
        //$s = Student::find($student->id);
        //$s->delete()

        //Eliminar directamente
        //$student->delete();
        $destroy = Student::destroy($student->id);
        if ($destroy){
            return back()->with('message', ['success' , 'Estudiante eliminado correctamente']);
        }
        else{
            return back()->with('message', ['danger' , 'No se pudo eliminar el estudiante']);
        }
    }
}
