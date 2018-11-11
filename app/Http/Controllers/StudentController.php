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
        Student::create(request()->all());
        return back()->with('message', ['success', __('Estudiante creado correctamente')]);
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
        $student->name = request()->name;
        $student->lastname = request()->lastname;
        $student->age = request()->age;
        $student->save();
        return redirect(route('details', $student->id))->with('message', ['success', __('Estudiante editado correctamente')]);
    }

    public function delete(Student $student){
        //Sin recuperar el registro
        //Student::destroy($student->id);

        //Recuperando el registro si recibiésemos un id
        //$s = Student::find($student->id);
        //$s->delete()

        //Eliminar directamente
        //$student->delete();

        return back()->with('message', ['success', __("Estudiante eliminado correctamente")]);
    }
}
