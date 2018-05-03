<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class TemplateController extends Controller
{
    //
    public function index()
    {
        
        return view('Templates/patientexerciseverify');
    }
}
