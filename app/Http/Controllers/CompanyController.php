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

    public function store(){
        //
    }
}
