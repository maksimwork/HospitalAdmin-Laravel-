<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Mail;
use Hash;
use App\User;
use Config;

class PhysiotherapistController extends Controller
{
    public function index()
    {
        $physio = DB::table('employee')->get();
        
        return view('Therapists/physiotherapist',['physio' => $physio]);
    }
    public function add()
    {
        // $titlefield = $request->titlefield;
        return view('Therapists/physioadd');
    }
    public function profile($id)
    {
        $physio = DB::table('employee')->where('id', '=', $id)->first();
    
        // $titlefield = $request->titlefield;
        return view('Therapists/physioprofile')->with('physio',$physio);
    }

    public function editprofile($id)
    {
        $physio = DB::table('employee')->where('id', '=', $id)->first();
    
        // $titlefield = $request->titlefield;
        return view('Therapists/physioeditprofile')->with('physio',$physio);
    }

    public function addaction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'namefield1' => 'required|max:255',
            'namefield2' => 'required|max:255',
            'emailfield' => 'required|email|max:255',
            'mobilefield' => 'required|max:255',
        ]);

        if ( $validator->fails()) {
            // return redirect('physioadd')->withErrors($validator->errors());
            echo "<script>
                    alert('Invalid Email Address or Phone Number');
                    window.history.back();
                    </script>";
        }else{

            if(DB::table('users')->where('email','=',$request->emailfield)->count() != 0)
            {
                // return redirect('physioadd')->withErrors('');
                echo "<script>
                    alert('Same Email Address Exist');
                    window.history.back();
                    </script>";
                return;
            }
            $namefield = $request->namefield1 ." " . $request->namefield2;
            if(DB::table('employee')->where('employeename', '=', $namefield)
                                    ->where('employeeemail', '=', $request->emailfield)
                                    ->where('employeemobile', '=', $request->mobilefield)
                                    ->count() == 0)
            {
                
                DB::insert('insert into employee (employeename,employeefirstname,employeelastname, employeeemail,employeemobile,filelink) values (?,?,?,?,?,?)', [$namefield, $request->namefield1,$request->namefield2, $request->emailfield,$request->mobilefield, "../plugins/images/news/profile.png"]);
                

                Config::set('constant.physioname', $namefield);
                
                $user = new User();
                $user->password = Hash::make('qwertyuiop1234567');
                $user->email = $request->emailfield;
                $user->name = $namefield;
                $user->privillege = 3;
                $user->firstname = $request->namefield1;
                $user->lastname = $request->namefield2;
                $user->setRememberToken($token = Str::random(60));
                $user->filelink = "../plugins/images/news/profile.png";
                $user->save();

                $reset_token = strtolower(str_random(64));
                if(DB::table('password_resets')->where('email', $request->emailfield)->count() == 0){
                    DB::table('password_resets')->insert([
                        'email' => $request->emailfield,
                        'token' => bcrypt($reset_token),
                        'created_at' => \Carbon\Carbon::now(),
                        'flag' => 2
                    ]);
                }
                else{
                    DB::table('password_resets')
                    ->where('email', $request->emailfield)
                    ->update(['email' =>$request->emailfield, 'token' => bcrypt($reset_token), 'created_at'=> \Carbon\Carbon::now(), 'flag' => 2]);
                }
                
                Config::set('constant.token', $reset_token);

                $emailfield = $request->emailfield;

                Mail::send('Templates/therapyaccountcreated', ['email' => $emailfield], function ($m) use ($emailfield) {
                    $m->from('hospital@gmail.com', 'Therapy Activation');
                    
                    $m->to($emailfield, 'Adam Vital')->subject('Therapy Account Created!');
                });
                if(DB::table('authtype')->where('email', $request->emailfield)->count() == 0)
                {
                    DB::table('authtype')->insert([
                        'email' => $request->emailfield,
                        'flag' => 2
                    ]);
                }
                else
                {
                    DB::table('authtype')
                    ->where('email', $request->emailfield)
                    ->update(['email' =>$request->emailfield, 'flag'=>2]);
                }

                $physio = DB::table('employee')->get();
                return redirect('physiotherapist')->with('physio',$physio);
            }else
            {
                // return redirect('physioadd')->withErrors($validator->errors());
                echo "<script>
                alert('Invalid Email Address or Phone Number');
                window.history.back();
                </script>";
            }
        }
    }
    public function saveinfo(Request $request){

        $physio = DB::table('employee')->where('employeeemail', '=', $request->previousemail)->first();
        // $fdate = strtotime($physio->date);
        // $date = (date("mdY", $fdate));
        $fullname = $request->firstname ." ". $request->lastname;
        // dd($fullname);
       
        $file = $request->file('uplode_image_file');
        // dd($file);
        $info=$file->getClientOriginalExtension();
        $destinationPath = 'images/physiotherapist';
        $storename = "";
        $filepath = str_replace(" ","",$request->id);
        if($info == "jpeg")
        {
            $storename ="physio". $filepath . ".jpg"; 

            
        }elseif($info =="png")
        {
            $storename ="physio" . $filepath . ".png";

        }else{
            return redirect('physioeditprofile');
        }
        $file->move($destinationPath,$storename);
        $storename = '../images/physiotherapist/' . $storename;

        DB::table('employee')
                    ->where('employeeemail', $request->previousemail)
                    ->update([  'filelink' => $storename ,
                                'employeename'=>$fullname,
                                'employeefirstname'=>$request->firstname,
                                'employeelastname'=>$request->lastname, 
                                'employeesalutation'=>$request->salutation,
                                'employeeDOB'=>$request->DOB,
                                'employeemartialstatus' =>$request->martialstatus,
                                'employeegen' => $request->gen,
                                'employeeoccupation' => $request->occupation,
                                'employeemobile'=> $request->mobile,
                                'employeeemail' => $request->email,
                                'employeeaddress'=> $request->address,
                                'employeecity' =>$request->city,
                                'employeecountry' => $request->country,
                                'employeenationality' => $request->nationality,
                                'employeedepartment'=>$request->department,
                                'employeeDHA' => $request->DHA,
                                'employeespecialization' =>$request->specialization,
                                'employeeexperience' => $request->experience,
                                'employeeeducation' => $request->education]);
    DB::table('users')->where('email', $request->previousemail)->update(['name' => $fullname]);
        $physio1 = DB::table('employee')->where('employeeemail', '=', $request->previousemail)->first();
        return view('Therapists/physioprofile')->with('physio',$physio1);
    }
    public function edit($id)
    {
        $physio = DB::table('employee')->where('id', '=', $id)->first();
        return view('Therapists/physioedit')->with('physio',$physio);
    }

    public function updateportalaccess($id)
    {
        $physio = DB::table('employee')->where('id', '=', $id)->first();
        if($physio->portal==1)
        {   
            $physio = DB::table('employee')
                ->where('id', $id)
                ->update(['portal' => 0]);
        }else
        {
            $physio = DB::table('employee')
                ->where('id', $id)
                ->update(['portal' => 1]);
        }
        return redirect()->back()->withErrors("");

    }

    public function physioforgotpassword(Request $request)
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
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'namefield1' => 'required|max:255',
            'namefield2' => 'required|max:255',
            'emailfield' => 'required|email|max:255',
            'mobilefield' => 'required|max:255',
        ]);
        $namefield = $request->namefield1 ." ".$request->namefield2;
        if ( $validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }else{
            // if(DB::table('employee')->where('employeename', '=', $namefield)
            //                         ->where('employeeemail', '=', $request->emailfield)
            //                         ->where('employeefirstname', '=', $request->emailfield1)
            //                         ->where('employeelastname', '=', $request->emailfield2)
            //                         ->where('employeemobile', '=', $request->mobilefield)
            //                         ->count() == 0)
            // {
                DB::table('employee')
                    ->where('id', $request->index)
                    ->update(['employeename' => $namefield, 'employeefirstname' => $request->namefield1, 'employeelastname' => $request->namefield2,  'employeeemail' => $request->emailfield,'employeemobile' => $request->mobilefield]);
                DB::table('users')
                    ->where('email', $request->previousemail)
                    ->update(['name' => $namefield,   'email' => $request->emailfield,]);
                
                $physio = DB::table('employee')->get();
                return redirect('physiotherapist')->with('physio',$physio);
            // }else{
            //     return redirect()->back()->withErrors($validator->errors());
            // }
        }
    }

    public function delete($id)
    {
        $temp = DB::table('employee')
        ->where('id', $id)
        ->get();

        $physio = DB::table('employee')
            ->where('id', $id)
            ->delete();
        
        DB::table('users')
            ->where('name', $temp[0]->employeename)->where('email', $temp[0]->employeeemail)->where('privillege', 3)
            ->delete();
        $physio = DB::table('employee')->get();
        return redirect('physiotherapist')->with('physio',$physio);
    }
}
