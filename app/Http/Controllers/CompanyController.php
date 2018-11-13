<?php

namespace escuelaempresa\Http\Controllers;

use Illuminate\Http\Request;
use escuelaempresa\Company;

class CompanyController extends Controller
{
    public function index(){
        $companies = Company::latest()->paginate(5);
        return view("companies.index", compact("companies"));
    }

    public function details(Company $company){
        return view('companies.detail', compact("company"));
    }

    public function store(){
        $this->validate(request(),[
            'name'=>'required|max:20',
            'city'=>'required|max:50',
            'cp'=>'required|digits:5',//regexp:^[0-9], bail se usa para detener las validaciones al primer error
        ], [
            "cp.digits" => __("Postal code field must be 5 digits")
        ]);
        $res = Company::create(request()->all());
        if ($res){
            return back()->with('message', ['success' , 'Empresa creada correctamente']);
        }
        else{
            return back()->with('message', ['danger' , 'No se pudo crear la empresa']);
        }
    }

    public function editView(Company $company){
        return view('companies.editView', compact("company"));
    }

    public function editCompany(Company $company){
        $this->validate(request(),[
            'name'=>'required|max:20',
            'city'=>'required|max:50',
            'cp'=>'required|digits:5',
        ], [
            "cp.digits" => __("Postal code field must be 5 digits")
        ]);
        $res = Company::find($company->id);
        $res->name = request()->name;
        $res->city = request()->city;
        $res->cp = request()->cp;
        $res->save();
        if ($res){
            return back()->with('message', ['success' , 'Empresa editada correctamente']);
        }
        else{
            return back()->with('message', ['danger' , 'No se pudo editar la empresa']);
        }
        //push()relationships
    }

    public function delete(Company $company){
        //Sin recuperar el registro
        //Company::destroy($company->id);

        //Recuperando el registro si recibiésemos un id
        //$s = Company::find($company->id);
        //$s->delete()

        //Eliminar directamente
        //$company->delete();
        $destroy = Company::destroy($company->id);
        if ($destroy){
            return back()->with('message', ['success' , 'Empresa eliminada correctamente']);
        }
        else{
            return back()->with('message', ['danger' , 'No se pudo eliminar la empresa']);
        }
    }
}
