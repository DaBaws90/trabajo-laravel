<?php

namespace escuelaempresa;

use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{
    //belongsTo en casos de ser relacion uno a muchos, hasMany en caso contrario, hasOne en 1 a 1
    protected $table = "petitions";

    protected $fillable = ["id_company", "id_grade", "type", "n_students"];

    
    public function grade(){
        return $this->belongsTo(Grade::class, "id_grade");
    }

    public function company(){
        return $this->belongsTo(Company::class, "id_company");
    }
}
