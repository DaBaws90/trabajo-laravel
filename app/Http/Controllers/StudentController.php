<?php

namespace escuelaempresa\Http\Controllers;

use Illuminate\Http\Request;
use escuelaempresa\Student;
use escuelaempresa\Study;
use escuelaempresa\Grade;

class StudentController extends Controller
{
    public function index(){
        $students = Student::latest()->paginate(5);
        //dd($students);
        return view('students.index',compact("students"));
    }

    public function show(Student $student){
        //dd($student);
        return view('students.detail', compact("student"));
    }

    public function create(){
        $grades = Grade::all();
        return view('students.addView', compact("grades"));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|max:20',
            'lastname'=>'required|max:50',
            'age'=>'required'
        ]);
        $res = Student::create($request->all());
        $student = Student::latest()->first();
        Study::create([
            'id_student'=>$student->id,
            'id_grade'=>$request->id_grade,
        ]);
        if ($res){
            return redirect()->route('students.index')->with('message', ['success' , 'Estudiante creado correctamente']);
        }
        else{
            return redirect()->route('students.index')->with('message', ['danger' , 'No se pudo crear el estudiante']);
        }
    }

    public function edit($id){
        $student = Student::find($id);
        $grades = Grade::all();
        return view('students.editView', compact("student"));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'name'=>'required|max:20',
            'lastname'=>'required|max:50',
            'age'=>'required'
        ]);
        $res = Student::find($id);
        Student::find($id)->update($request->all());
        /*$res->name = $request->name;
        $res->lastname = $request->lastname;
        $res->age = $request->age;*/
        //$res->update($request->all());
        
        if($res){
            return redirect()->route('students.edit', $id)->with('message', ['success' , 'Estudiante editado correctamente']);
        }
        else{
            return redirect()->route('students.edit', $id)->with('message', ['danger' , 'No se pudo editar el estudiante']); 
        }
        //push()relationships
    }

    public function destroy($id){
        //Sin recuperar el registro
        //Student::destroy($student->id);

        //Recuperando el registro si recibiésemos un id
        //$s = Student::find($student->id);
        //$s->delete()

        //Eliminar directamente
        //$student->delete();
        $destroy = Student::destroy($id);
        if ($destroy){
            return redirect()->route('students.index')->with('message', ['success' , 'Estudiante eliminado correctamente']);
        }
        else{
            return redirect()->route('students.index')->with('message', ['danger' , 'No se pudo eliminar el estudiante']);
        }
    }
}
