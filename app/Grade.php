<?php

namespace escuelaempresa;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = "grades";
    protected $fillable = ["name", "level"];

    public function companies(){
        return $this->hasManyThrough(Company::class, Petition::class, 'id_grade', 'id', 'id', 'id_company');
    }

    //Obtener cuantos estudiantes están cursando
    public function students(){
        return $this->hasManyThrough(Student::class, Study::class, 'id_grade', 'id', 'id', 'id_student'); 
    }
    //Estudiantes que estudian a través de estudia, que mediante id_grade 
        //referencia Grade(id), que representa Estudiante(id) mediante id_student

    public function studies(){
        return $this->hasMany(Study::class, 'id_grade');
    }

    public function petitions(){
        return $this->hasMany(Petition::class, 'id_grade');
    }
}
