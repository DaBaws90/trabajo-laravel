<?php

namespace escuelaempresa;

use Illuminate\Database\Eloquent\Model;
use escuelaempresa\Grade;
use escuelaempresa\Study;

class Student extends Model
{
    protected $table = "students";
    protected $fillable = ["name", "lastname", "age"];

    //Obtener cuantos grados cursa
    public function grades(){
        return $this->hasManyThrough(Grade::class, Study::class, 'id_student', 'id', 'id', 'id_grade'); 
    }
    //Grados que cursa a través de estudia, que mediante id_student 
        //referencia Student(id), que representa Grado(id) mediante id_grade
    
    public function studies(){
        return $this->hasMany(Study::class, 'id_student');
    }
}
