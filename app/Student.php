<?php

namespace escuelaempresa;

use Illuminate\Database\Eloquent\Model;
use escuelaempresa\Grade;

class Student extends Model
{
    protected $table = "students";
    protected $fillable = ["name", "lastname", "age"];

    //Obtener cuantos grados cursa
    public function grades(){
        return $this->hasManyThrough(Grade::class, Study::class); 
    }
    public function studies(){
        return $this->hasMany(Study::class);
    }
}
