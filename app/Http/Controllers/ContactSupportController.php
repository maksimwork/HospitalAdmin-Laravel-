<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class ContactSupportController extends Controller
{
    //
    public function index()
    {
        $patient = DB::table('patient')->get()->count();
        $category = DB::table('category')->get()->count();
        $exercise = DB::table('exercise')->get()->count();
        $training = DB::table('training')->get()->count();
        $contact = DB::table('contact')->get();
        
        return view('HelpSupport/ContactSupport/contactsupport')->with('patient',$patient)->with('training',$training)->with('exercise',$exercise)->with('category',$category)->with('description', $contact[0]->description)->with('contactnumber', $contact[0]->number)->with('extratext', $contact[0]->text);
    }
    public function editindex()
    {
        $patient = DB::table('patient')->get()->count();
        $category = DB::table('category')->get()->count();
        $exercise = DB::table('exercise')->get()->count();
        $training = DB::table('training')->get()->count();
        $contact = DB::table('contact')->get();
        
        return view('HelpSupport/ContactSupport/contactsupportedit')->with('patient',$patient)->with('training',$training)->with('exercise',$exercise)->with('category',$category)->with('description', $contact[0]->description)->with('contactnumber', $contact[0]->number)->with('extratext', $contact[0]->text);;
    }
    public function saveindex(Request $request)
    {
        $patient = DB::table('patient')->get()->count();
        $category = DB::table('category')->get()->count();
        $exercise = DB::table('exercise')->get()->count();
        $training = DB::table('training')->get()->count();
        // dd($request);
        DB::table('contact')
                    ->update([  
                    'description'=>$request->descriptionarea,
                    'number'=>$request->numberarea,
                    'text'=>$request->text]);
        $contact = DB::table('contact')->get();
        
        return view('HelpSupport/ContactSupport/contactsupport')->with('patient',$patient)->with('training',$training)->with('exercise',$exercise)->with('category',$category)->with('description', $contact[0]->description)->with('contactnumber', $contact[0]->number)->with('extratext', $contact[0]->text);
    }
    
}
