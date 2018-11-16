<?php

namespace escuelaempresa;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "companies";
    protected $fillable = ["name", "city", "cp"];

    public function grades(){
        return $this->hasManyTrough(Grade::class, Petition::class, 'id_grade', 'id', 'id', 'id_company');
    }

    public function petitions(){
        return $this->hasMany(Petition::class, 'id_company');
    }
}
