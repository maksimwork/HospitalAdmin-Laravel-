<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
       
        $patient = DB::table('patient')->get()->count();
        $category = DB::table('category')->get()->count();
        $exercise = DB::table('exercise')->get()->count();
        $training = DB::table('training')->get()->count();
        if(Auth::user()->privillege == 2)
        {
            $patientresult = DB::table('patient')
                ->where('patientname',Auth::user()->name)
                ->first();
            // dd(Auth::user()->name);
            $user = DB::table('userexercise')
                ->where('user', Auth::user()->name)
                ->get()->count();
            $physio = DB::table('patient')
                ->where('patientname', Auth::user()->name)
                ->where('patientemail', Auth::user()->email)
                ->first();
           
            if($patientresult->portal == 1)
            {
               
                return view('home')->with('patient',$patient)->with('training',$training)->with('exercise',$user)->with('category',$category)->with('tempname', $physio->patienttherapist);
            }
            else{
                return Redirect::to('/logout');
            }
        }
        elseif(Auth::user()->privillege == 3)
        {
            $physioresult = DB::table('employee')
            ->where('employeename',Auth::user()->name)
            ->first();
            // dd(Auth::user()->name);
            if($physioresult->portal == 1)
            {
                // dd("physio1login");
                return view('home')->with('patient',$patient)->with('training',$training)->with('exercise',$exercise)->with('category',$category);
            }
            else{
                return Redirect::to('/logout');
            }
        }
        else if(Auth::user()->privillege == 1)
        {
        // $patient = DB::table('patient')->get()->count();
        // $category = DB::table('category')->get()->count();
        // $exercise = DB::table('exercise')->get()->count();
        // $training = DB::table('training')->get()->count();
        return view('home')->with('patient',$patient)->with('training',$training)->with('exercise',$exercise)->with('category',$category);
        }
    }

    public function editprofile()
    {
        return view('editprofile');
        // dd(Auth::user()->name);
        // return;
    }
    public function saveprofileinfo(Request $request)
    {
        $physio = DB::table('patient')
                ->where('patientname', Auth::user()->name)
                ->where('patientemail', Auth::user()->email)
                ->first();
        $temp = $physio->patienttherapist;
        $fullname = $request->namefield1 . " " . $request->namefield2;
        if(Auth::user()->privillege == 1){
            $users = DB::table('users')->where('email', $request->previousemail)->update(['name'=> $fullname, 'firstname'=>$request->namefield1, 'lastname'=>$request->namefield2, 'email'=>$request->emailfield]);
            // $users = DB::table('users')->get();
            // dd($users);
        }
        else if(Auth::user()->privillege == 2){
            $users = DB::table('users')->where('email', $request->previousemail)->update(['name'=> $fullname, 'firstname'=>$request->namefield1, 'lastname'=>$request->namefield2, 'email'=>$request->emailfield]);
            $users = DB::table('patient')->where('patientemail', $request->previousemail)->update(['patientname'=> $fullname, 'patientfirstname'=>$request->namefield1, 'patientlastname'=>$request->namefield2, 'patientemail'=>$request->emailfield]);
            // $users = DB::table('users')->get();
            // dd($users);
        }
        else if(Auth::user()->privillege == 3){
            $users = DB::table('users')->where('email', $request->previousemail)->update(['name'=> $fullname, 'firstname'=>$request->namefield1, 'lastname'=>$request->namefield2, 'email'=>$request->emailfield]);
            $users = DB::table('employee')->where('employeeemail', $request->previousemail)->update(['employeename'=> $fullname, 'employeefirstname'=>$request->namefield1, 'employeelastname'=>$request->namefield2, 'employeeemail'=>$request->emailfield]);
           
        }
        $patient = DB::table('patient')->get()->count();
        $category = DB::table('category')->get()->count();
        $exercise = DB::table('exercise')->get()->count();
        $training = DB::table('training')->get()->count();

        
        
        return view('home')->with('patient',$patient)->with('training',$training)->with('exercise',$exercise)->with('category',$category)->with("tempname", $temp);
        // dd(Auth::user()->name);
        // return;
    }

    
}
