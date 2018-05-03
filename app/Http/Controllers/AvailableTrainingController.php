<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AvailableTrainingController extends Controller
{
    //
    public function index()
    {
        $training = DB::table('training')
            ->join('department', 'training.trainingdepartment', '=', 'department.id')
            ->select('training.id','training.trainingtitle','training.content', 'training.trainingdepartment', 'department.departmenttitle')
            ->get();

        return view('Training/AvailableTraining/availabletraining',['training' => $training]);
    }
    public function add()
    {
        $training = DB::table('training')
            ->join('department', 'training.trainingdepartment', '=', 'department.id')
            ->select('training.id','training.trainingtitle', 'training.content', 'training.trainingdepartment', 'department.departmenttitle')
            ->get();
            // dd($department);
        $department = DB::table('department')->get();
        // dd($department);
        return view('Training/AvailableTraining/trainingadd')->with('training',$training)->with('department', $department);
    }

    public function addaction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'trainingtitle' => 'required|max:255',
            'trainingdepartment' => 'required|max:255',
            'content' => 'required|max:400',
        ]);

        
        if ( $validator->fails()) {
            // dd("validate");
            return redirect('trainingadd')->withErrors($validator->errors());
        }else{
            if(DB::table('training')->where('trainingtitle', '=', $request->trainingtitle)->count() == 0)
            {
                if ($request->hasFile('uplode_image_file')) {
                    $file = $request->file('uplode_image_file');
                
                    $info=$file->getClientOriginalExtension();
                    $destinationPath = 'images/training';
                    
                    $storename = "";
                    $filepath = str_replace(" ","",$request->trainingtitle);
                    if($info == "jpeg")
                    {
                        $storename =  $filepath . ".jpg";            
                    }elseif($info =="png")
                    {
                        $storename = $filepath . ".png";
                    }else{
                        return redirect('exerciseadd')->withErrors($validator->errors());
                    }

                    $file->move($destinationPath,$storename);
                    
                    $storename = '../images/training/' . $storename;
                }
                else{
                    // dd("file");
                    return redirect()->back()->withErrors($validator->errors());
                }
                // $result = DB::table('training')
                //     ->join('department', 'training.trainingdepartment', '=', 'department.id')
                //     ->select('training.id','training.trainingtitle', 'training.trainingdepartment', 'department.departmenttitle','department.id as departmentid')
                //     ->where('department.departmenttitle', "Heart")->first();
                $result = DB::table('department')
                    ->where('departmenttitle', $request->trainingdepartment)->first();
                // dd($result);
                DB::insert('insert into training (trainingtitle,trainingdepartment,content,filelink) values (?,?,?,?)', [$request->trainingtitle,$result->id,$request->content,$storename]);

                $training = DB::table('training')
                    ->join('department', 'training.trainingdepartment', '=', 'department.id')
                    ->select('training.id','training.trainingtitle', 'training.trainingdepartment', 'training.content','department.departmenttitle','training.filelink')
                    ->get();
                return redirect('availabletraining')->with('training',$training);
            }else
            {
                // dd("same");
                return redirect('trainingadd')->withErrors($validator->errors());
            }
        }
    }

    public function edit($id)
    {
        $trainingarray = DB::table('training')
            ->join('department', 'training.trainingdepartment', '=', 'department.id')
            ->select('training.id','training.trainingtitle', 'training.trainingdepartment', 'training.content', 'department.departmenttitle')
            ->get();
        $training = DB::table('training')->where('id', '=', $id)->first();
        return view('Training/AvailableTraining/trainingedit')->with('training',$training)->with('trainingarray',$trainingarray);
    }

    public function view($id)
    {
        $training = DB::table('training')->where('id', '=', $id)->first();
        return view('Training/AvailableTraining/viewtraining')->with('training',$training);
    }

    public function update(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'previous' => 'required|max:255',
            'trainingtitle' => 'required|max:255',
            // 'trainingdepartment' => 'required|max:255',
            // 'content' => 'required|max:255',
        ]);
        
        if ($request->hasFile('uplode_image_file')) {
            $file = $request->file('uplode_image_file');
            // dd($file);
            $info=$file->getClientOriginalExtension();
            $destinationPath = 'images';
            $filepath = str_replace(" ","",$request->exercisetitle);
            $storename = "";
            if($info == "jpeg")
            {
                $storename = $filepath . ".jpg";            
            }elseif($info =="png")
            {
                $storename = $filepath . ".png";
            }else{
                return redirect('exerciseadd')->withErrors($validator->errors());
            }

            $file->move($destinationPath,$storename);
            
            $storename = '../images/' . $storename;
        }
        else{
           
            return redirect()->back()->withErrors($validator->errors());
        }

        if ( $validator->fails()) {
            
            return redirect()->back()->withErrors($validator->errors());
        }else{
            // if(DB::table('training')->where('trainingtitle', '=', $request->trainingtitle)->count() == 0){
                $result = DB::table('training')
                    ->join('department', 'training.trainingdepartment', '=', 'department.id')
                    ->select('training.id','training.trainingtitle', 'training.content','training.trainingdepartment', 'department.departmenttitle','department.id as departmentid')
                    ->where('department.departmenttitle', $request->trainingdepartment)->first();

                DB::table('training')
                    ->where('trainingtitle', $request->previous)
                    ->update(['trainingtitle' => $request->trainingtitle ,'filelink'=>$storename,  'content' => $request->content]);
                $training = DB::table('training')->get();
                return redirect('availabletraining')->with('training',$training);
                
            // }else{
                
            //     return redirect()->back()->withErrors($validator->errors());
            // }
        }
    }

    public function delete($id)
    {
        // dd($id);
        $training = DB::table('training')
            ->where('id', $id)
            ->delete();
        $training = DB::table('training')->get();
        return redirect('availabletraining')->with('training',$training);
    }
}
