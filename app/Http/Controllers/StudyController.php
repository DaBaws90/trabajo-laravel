<?php

namespace escuelaempresa\Http\Controllers;

use Illuminate\Http\Request;
use escuelaempresa\Student;

class StudyController extends Controller
{
    public function destroy($id){
        $destroy = Study::destroy($id);
        if ($destroy){
            return redirect()->route('studies.index')->with('message', ['success' , 'Estudio (Study) eliminado correctamente']);
        }
        else{
            return redirect()->route('studies.index')->with('message', ['danger' , 'No se pudo eliminar el estudio (Study)']);
        }
    }
}
