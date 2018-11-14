<?php

namespace escuelaempresa;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    protected $table = "studies";

    protected $fillable = ["id_student", "id_grade"];

    public function student(){
        return $this->belongsTo(Student::class, "id_Student");
    }

    public function grade(){
        return $this->belongsTo(Grade::class, "id_grade");
    }
}
