<?php

namespace escuelaempresa\Http\Controllers;

use Illuminate\Http\Request;
use escuelaempresa\Company;
use escuelaempresa\Petition;
use escuelaempresa\Grade;

class CompanyController extends Controller
{
    public function index(){
        $companies = Company::latest()->paginate(5);
        return view('companies.index',compact("companies"));
    }

    public function show(Company $company){
        //$grades = Student::where('id',$student->id)->with('studies.grade')->get();
        $petitionsFCT = Petition::where('id_company', $company->id)->where('type', 'FCT')->get();
        $petitionsEmpleo = Petition::where('id_company', $company->id)->where('type', 'Empleo')->get();
        $petitionsDUAL = Petition::where('id_company', $company->id)->where('type', 'DUAL')->get();
        return view('companies.detail', compact("company", "petitionsFCT", "petitionsEmpleo", "petitionsDUAL"));
    }

    public function create(){
        $grades = Grade::all();
        return view('companies.addView', compact("grades"));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|max:30',
            'city'=>'required|max:30',
            'cp'=>'required'
        ]);
        $res = Company::create($request->all());
        // $company = Company::latest()->first();
        if ($res){
            return redirect()->route('companies.index')->with('message', ['success' , 'Empresa creada correctamente']);
        }
        else{
            return redirect()->route('companies.index')->with('message', ['danger' , 'No se pudo crear la empresa']);
        }
    }

    public function edit($id){
        $company = Company::find($id);
        $grades = Grade::all();
        return view('companies.editView', compact("company", "grades"));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'name'=>'required|max:30',
            'city'=>'required|max:30',
            'cp'=>'required'
        ]);
        $res = Company::find($id);
        $res->update($request->all());
        //$r = Study::where('id_student', $id)->get();
        //$r[0]->id_grade = $request->id_grade;
        //$r[0]->update();
        /*$res->name = $request->name;
        $res->lastname = $request->lastname;
        $res->age = $request->age;*/
        //$res->update($request->all());
        if($res){
            return redirect()->route('companies.edit', $id)->with('message', ['success' , 'Empresa editada correctamente']);
        }
        else{
            return redirect()->route('companies.edit', $id)->with('message', ['danger' , 'No se pudo editar la empresa']); 
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
        $destroy = Company::destroy($id);
        if ($destroy){
            return redirect()->route('companies.index')->with('message', ['success' , 'Empresa eliminada correctamente']);
        }
        else{
            return redirect()->route('companies.index')->with('message', ['danger' , 'No se pudo eliminar la empresa']);
        }
    }

    public function destroyPetition($id){
        $petition = Petition::find($id);
        $company = Company::find($petition->id_company);
        $destroy = Petition::destroy($id);
        if ($destroy){
            return redirect()->route('companies.show', $company->id)->with('message', ['success' , 'Petición eliminada correctamente']);
        }
        else{
            return redirect()->route('companies.show', $company->id)->with('message', ['danger' , 'No se pudo eliminar la petición']);
        }
    }
}
