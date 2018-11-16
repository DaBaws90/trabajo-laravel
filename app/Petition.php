<?php

namespace escuelaempresa;

use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{
    protected $table = "petitions";

    protected $fillable = ["id_company", "id_grade", "type", "n_students"];

    
    public function grade(){
        return $this->belongsTo(Grade::class, "id_grade");
    }

    public function company(){
        return $this->belongsTo(Company::class, "id_company");
    }
}
