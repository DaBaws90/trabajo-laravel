<?php

namespace escuelaempresa;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = "students";
    protected $fillable = ["name", "lastname", "age"];
}
