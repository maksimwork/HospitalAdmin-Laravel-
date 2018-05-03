<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

use Carbon;
use Mail;
use Hash;
use App\User;
use Config;

class PatientController extends Controller
{
    //
    public function index()
    {
        

        $patient = DB::table('patient')->get();
        $employee = DB::table('employee')->get();

        return view('Patients/patient',['patient' => $patient, "employee" =>$employee]);
    }
    public function add()
    {
        
        // $titlefield = $request->titlefield;
        return view('Patients/patientadd');
    }

    public function updateportalaccess($id)
    {
        $patient = DB::table('patient')->where('id', '=', $id)->first();
        if($patient->portal==1)
        {   
            $patient = DB::table('patient')
                ->where('id', $id)
                ->update(['portal' => 0]);
        }else
        {
            $patient = DB::table('patient')
                ->where('id', $id)
                ->update(['portal' => 1]);
        }
        return redirect()->back()->withErrors("");

    }

    public function profile($id)
    {
        $patient = DB::table('patient')->where('id', '=', $id)->first();
        
        $fdate = strtotime($patient->date);
        $date = (date("mY", $fdate));
        $shareexe = DB::table('userexercise')
        ->where('user', $patient->patientname)
        ->get();
        // dd($patient->patientname);  
        return view('Patients/patientprofile')->with('patient',$patient)->with("date", $date)->with("shareexercise", $shareexe);
    }

    public function addaction(Request $request)
    {
        $date = \Carbon\Carbon::now();
        $fdate = strtotime($date);
        $PID = (date("mY", $fdate));
        $validator = Validator::make($request->all(), [
            'namefield2' => 'required|max:255',
            'emailfield' => 'required|email|max:255',

        ]);
            
        if ( $validator->fails()) {
            // alert("Invalid");
            echo "<script>
                    alert('Invalid Email Address or Phone Number');
                    window.history.back();
                    </script>";
           
        }else{

            if(DB::table('users')->where('email','=',$request->emailfield)->count() != 0)
            {
                // alert("Email");
                // return redirect('patient')->withErrors('');
                echo "<script>
                    alert('Same Email Address Exist');
                    window.history.back();
                    </script>";
                return;

            }
            $namefield = $request->namefield1 ." ". $request->namefield2; 
            
            if(DB::table('patient')->where('patientname', '=', $namefield)
                                    ->where('patientemail', '=', $request->emailfield)
                                    ->where('patientmobile', '=', $request->mobilefield)
                                    ->count() == 0)
            {
                // dd($date);
                DB::insert('insert into patient (patientname, patientfirstname, patientlastname, patientemail, patientmobile, date, filelink, PID, patientfilenumber, patienttherapist) values (?,?,?,?,?,?,?,?,?, ?)', [$namefield,$request->namefield1, $request->namefield2, $request->emailfield,$request->mobilefield, $date, "../plugins/images/news/profile.png", $PID, $request->filenum, $request->therapist]);
                
                $patient = DB::table('patient')->get();
                

                Config::set('constant.patientname', $namefield);
                $user = new User();
                $user->password = Hash::make('qwertyuiop1234567');
                $user->email = $request->emailfield;
                $user->name = $namefield;
                $user->firstname = $request->namefield1;
                $user->lastname = $request->namefield2;
                $user->privillege = 2;
                $user->filelink = "../plugins/images/news/profile.png";
                // $user->created_at = $date;
                $user->setRememberToken($token = Str::random(60));

                $user->save();

                $reset_token = strtolower(str_random(64));
                if(DB::table('password_resets')->where('email', $request->emailfield)->count() == 0){
                    DB::table('password_resets')->insert([
                        'email' => $request->emailfield,
                        'token' => bcrypt($reset_token),
                        'created_at' => \Carbon\Carbon::now(),
                        'flag' => 1
                    ]);
                }
                else{
                    DB::table('password_resets')
                    ->where('email', $request->emailfield)
                    ->update(['email' =>$request->emailfield, 'token' => bcrypt($reset_token), 'created_at'=> \Carbon\Carbon::now(), 'flag'=>1]);
                }
                
                Config::set('constant.token', $reset_token);

                // $user = DB::table("users")->first();
                $emailfield = $request->emailfield;
                // dd($emailfield);
                Mail::send('Templates/patientaccountcreated', ['email' => $emailfield], function ($m) use ($emailfield) {
                    $m->from('hospital@gmail.com', 'Patient Activation');
                    
                    $m->to($emailfield, 'Adam Vital')->subject('Patient Account Created!');
                });
                if(DB::table('authtype')->where('email', $request->emailfield)->count() == 0)
                {
                    DB::table('authtype')->insert([
                        'email' => $request->emailfield,
                        'flag' => 1
                    ]);
                }
                else
                {
                    DB::table('authtype')
                    ->where('email', $request->emailfield)
                    ->update(['email' =>$request->emailfield, 'flag'=>1]);
                }
                
                return redirect('patient')->with('patient',$patient);
            }else
            {
                // alert("Err");
                echo "<script>
                    alert('Same Name, Email or Mobile Exist');
                    window.history.back();
                    </script>";
                
            }
        }
    }
    public function saveinfo(Request $request){
        
        $patient = DB::table('patient')->where('patientemail', '=', $request->previousemail)->first();
        $fdate = strtotime($patient->date);
        $date = (date("mY", $fdate));
        $fullname = $request->firstname ." ". $request->lastname;
        // dd($fullname);
        $file = $request->file('uplode_image_file');
        $info=$file->getClientOriginalExtension();
        $destinationPath = 'images/patient';
        $storename = "";
        $filepath = str_replace(" ","",$request->id);
        if($info == "jpeg")
        {
            $storename ="patient". $filepath . ".jpg"; 
            
        }elseif($info =="png")
        {
            $storename ="patient" . $filepath . ".png";
            // dd($storename);
        }else{
            echo "<script>
                    alert('File Extension Error');
                    window.history.back();
                    </script>";
        }
        $file->move($destinationPath,$storename);
        $storename = '../images/patient/' . $storename;
        DB::table('patient')
                    ->where('patientemail', $request->previousemail)
                    ->update([  'filelink' => $storename ,
                                'patientname'=>$fullname,
                                'patientfirstname'=>$request->firstname,
                                'patientlastname'=>$request->lastname, 
                                'patientfilenumber'=>$request->filenumber,
                                'patientsalutation'=>$request->salutation,
                                'patientDOB'=>$request->DOB,
                                'patientmartialstatus' =>$request->martialstatus,
                                'patientgen' => $request->gender,
                                'patientoccupation' => $request->occupation,
                                'patientmobile'=> $request->mobile,
                                'patientemail' => $request->email,
                                'patientaddress'=> $request->address,
                                'patientcity' =>$request->city,
                                'patientcountry' => $request->country,
                                'patientnationality' => $request->nationality,
                                'patienttherapist'=>$request->therapist]);
        DB::table('users')->where('email', $request->previousemail)->update(['name' => $fullname]);
        $patient1 = DB::table('patient')->where('patientemail', '=', $request->previousemail)->first();
        $shareexe = DB::table('userexercise')
        ->where('user', $patient1->patientname)
        ->get();
        // dd($patient1->patientname);
        return view('Patients/patientprofile')->with('patient',$patient1)->with("date", $date)->with("shareexercise", $shareexe);
    }
    public function edit($id)
    {
        $patient = DB::table('patient')->where('id', '=', $id)->first();
        return view('Patients/patientedit')->with('patient',$patient);
    }
    public function editprofile($id)
    {
        $patient = DB::table('patient')->where('id', '=', $id)->first();
        $employee = DB::table('employee')->get();
        $fdate = strtotime($patient->date);
        $date = (date("mY", $fdate));
        return view('Patients/patienteditprofile')->with('patient', $patient)->with('date', $date)->with('employee', $employee)->with('id', $id);
    }
    public function update(Request $request)
    {
        // dd($request->previousname);
        $validator = Validator::make($request->all(), [
            'namefield1' => 'required|max:255',
            'namefield2' => 'required|max:255',
            'emailfield' => 'required|email|max:255',
            'mobilefield' => 'required|max:255',
        ]);
        $namefield = $request->namefield1 ." ". $request->namefield2;
        if ( $validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }else{
            // if(DB::table('patient')->where('patientname', '=', $namefield)
            //                         ->where('patientemail', '=', $request->emailfield)
            //                         ->where('patientmobile', '=', $request->mobilefield)
            //                         ->count() == 0)
            // {previousname
                DB::table('patient')
                    ->where('id', $request->index)
                    ->update(['patientname' => $namefield, 'patientfirstname'=>$request->namefield1, 'patientlastname'=>$request->namefield2, 'patientemail' => $request->emailfield,'patientmobile' => $request->mobilefield]);
                DB::table('users')
                    ->where('email', $request->previousemail)
                    ->update(['name' => $namefield,  'email' => $request->emailfield]);
                $patient = DB::table('patient')->get();
                return redirect('patient')->with('patient',$patient);
            // }else{
            //     return redirect()->back()->withErrors($validator->errors());
            // }
        }
    }

    public function patientforgotpassword(Request $request)
    {
        $reset_token = strtolower(str_random(64));
        if(DB::table('password_resets')->where('email', $request->email)->count() == 0){
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => bcrypt($reset_token),
                'created_at' => \Carbon\Carbon::now(),
            ]);
        }
        else{
            DB::table('password_resets')
            ->where('email', $request->email)
            ->update(['email' =>$request->email, 'token' => bcrypt($reset_token), 'created_at'=> \Carbon\Carbon::now()]);
        }
        
        Config::set('constant.token', $reset_token);

        $emailfield = $request->email;

        Mail::send('Templates/passwordreset', ['email' => $emailfield], function ($m) use ($emailfield) {
            $m->from('hospital@gmail.com', 'Reset Password');
            
            $m->to($emailfield, 'Adam Vital')->subject('Patient Reset Password!');
        });

        return redirect()->back()->withErrors("");
    }

    public function delete($id)
    {
        $temp = DB::table('patient')
        ->where('id', $id)
        ->get();
        // dd($temp[0]);
        $patient = DB::table('patient')
            ->where('id', $id)
            ->delete();
        // dd($temp[0]->patientname);
        DB::table('users')
                ->where('name', $temp[0]->patientname)->where('email', $temp[0]->patientemail)->where('privillege', 2)
                ->delete();
        DB::table('userexercise')
        ->where('user', $temp[0]->patientname)
        ->delete();
        $patient = DB::table('patient')->get();
        return redirect('patient')->with('patient',$patient);
    }
}
