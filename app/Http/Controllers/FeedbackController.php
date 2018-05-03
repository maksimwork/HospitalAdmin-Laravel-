<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
// use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Mail;
use App\User;
use Auth;
class FeedbackController extends Controller
{
    //
    public function index()
    {
        $patient = DB::table('patient')->get()->count();
        $category = DB::table('category')->get()->count();
        $exercise = DB::table('exercise')->get()->count();
        $training = DB::table('training')->get()->count();
        $flag = 0;
        return view('Feedback/feedback')->with('patient',$patient)->with('training',$training)->with('exercise',$exercise)->with('category',$category)->with('temp', $flag);
    }
    public function submit(Request $request){
        // dd(Auth::user()->email);
        $emailfield = "dmitri.myachin@mail.ru";
        $textVal = $request->content;

       

        Mail::send('Templates/clientfeedback', ['email' => $emailfield, 'text' => $textVal], function ($m) use ($emailfield,$textVal) {
            $m->to($emailfield, "Feedback")->subject("Feedback")->setBody($textVal); ;
            $m->from(Auth::user()->email, Auth::user()->name);
        });
        // $sent =   Mail::send('Templates/patientexerciseverify', ['email' => $emailfield], function ($m) use ($emailfield) {
        //         $m->from('hospital@gmail.com', 'Patient Exercise');
                
        //         $m->to($emailfield, 'Adam Vital')->subject('Patient Exercise');
        //     });
        // if(! $sent) dd("wrong");
        // dd("send");
        $flag = 1;
    //     dd($flag);
    //    return redirect('feedback')->with('temp', $flag);
    $patient = DB::table('patient')->get()->count();
    $category = DB::table('category')->get()->count();
    $exercise = DB::table('exercise')->get()->count();
    $training = DB::table('training')->get()->count();
    $flag = 1;
    return view('Feedback/feedback')->with('patient',$patient)->with('training',$training)->with('exercise',$exercise)->with('category',$category)->with('temp', $flag);
    }
}
