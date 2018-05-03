<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Carbon;
use PDF;
use Auth;
use Input;
use Mail;
use Config;

class ManageExerciseController extends Controller
{
    //
    public function index()
    {
        

        $patient = DB::table('patient')->get();
        $exercise = DB::table('exercise')
            ->join('category', 'exercise.category', '=', 'category.id')
            ->join('area', 'exercise.area', '=', 'area.id')
            ->join('type', 'exercise.type', '=', 'type.id')
            ->join('subtype', 'exercise.subtype', '=', 'subtype.id')
            ->select('exercise.id','exercise.title','exercise.status','area.areatitle as areatitle', 'category.categorytitle as categorytitle','type.typetitle as typetitle','subtype.subtypetitle as subtypetitle')
            ->orderBy('id', 'asc') 
            ->get();
        // dd($exercise);
        return view('Library/ManageExercise/manageexercise',['exercise' => $exercise,'patient'=>$patient]);
    }
    // int function count($exercise){
        
    //     foreach($exercise as item){

    //     }
    // }
    public function add()
    {
        $exercise = DB::table('exercise')
            ->join('category', 'exercise.category', '=', 'category.id')
            ->join('area', 'exercise.area', '=', 'area.id')
            ->join('type', 'exercise.type', '=', 'type.id')
            ->join('subtype', 'exercise.subtype', '=', 'subtype.id')
            ->select('exercise.id','exercise.title', 'area.areatitle as areatitle', 'category.categorytitle as categorytitle','type.typetitle as typetitle','subtype.subtypetitle as subtypetitle')
            ->get();
        $category = DB::table('category')->get();
        $area = DB::table('area')->get();
        $type = DB::table('type')->get();
        $subtype = DB::table('subtype')->get();        
        return view('Library/ManageExercise/exerciseadd')->with('exercise',$exercise)-> with('category',$category)-> with('area',$area)-> with('type',$type)-> with('subtype',$subtype);
    }

    public function addaction(Request $request)
    {
        $mediatype = "Picture";
        $validator = Validator::make($request->all(), [
            'exercisetitle' => 'required|max:255',
            'exercisecategory' => 'required|max:255',
            'exercisearea' => 'required|max:255',
            'exercisetype' => 'required|max:255',
            'exercisesubtype' => 'required|max:255',
            'exercisedescription' => 'required|max:400',
            'exercisestatus' => 'required|max:255',
            
        ]);
        
        if ( $validator->fails()) {
            
            return redirect('exerciseadd')->withErrors($validator->errors());
        }else{
            
            if(DB::table('exercise')->where('title', '=', $request->exercisetitle)->count() == 0)
            {

                $file = $request->file('uplode_image_file');
                $info=$file->getClientOriginalExtension();
                
                if (!$request->hasFile('uplode_image_file')) {
                    return redirect()->back()->withErrors($validator->errors());
                }
                if(($info == "jpeg" || $info == 'png') && $request->mediatype == "mp4")
                {
                        $mediatype = "Picture";


                        return redirect()->back()->withErrors($validator->errors());
                }
                else if($info == "mp4" && $request->mediatype == "JPEG or PNG"){
                        $mediatype = "Video";
                        return redirect()->back()->withErrors($validator->errors());
                }
                
                $destinationPath = 'images/news';
                $destinationPath1 = 'videos';
                $storename = "";
                $filepath = str_replace(" ","",$request->exercisetitle);
                if($info == "jpeg")
                {
                    $mediatype = "Picture";
                    $storename = $filepath . ".jpg"; 
                    $storename = '../images/news/' . $storename;
                    $file->move($destinationPath,$storename); 
                              
                }elseif($info =="png")
                {
                    $mediatype = "Picture";
                    $storename = $filepath . ".png";
                    $storename = '../images/news/' . $storename;
                    $file->move($destinationPath,$storename);
                }elseif($info =="mp4")
                {
                    $mediatype = "Video";
                    $storename = $filepath . ".mp4";
                    $storename = '../videos/' . $storename;
                    $file->move($destinationPath1,$storename); 
                    
                }else{
                    return redirect('exerciseadd')->withErrors($validator->errors());
                }

               
                
                
                $category = DB::table('category')
                    ->where('categorytitle', $request->exercisecategory)->first();
                // dd($category);
                $area = DB::table('area')
                    
                    ->where('areatitle', $request->exercisearea)->first();
                // dd($area);
                
                $type = DB::table('type')
                    
                    ->where('typetitle', $request->exercisetype)->first();
                // dd($type);
                // dd("aa");
                $subtype = DB::table('subtype')
                    
                    ->where('subtypetitle', $request->exercisesubtype)->first();
                

                DB::insert('insert into exercise (title,category,area,type,subtype,keyword,description,status,mediatype,filelink) values (?,?,?,?,?,?,?,?,?,?)', 
                                    [$request->exercisetitle,$category->id,$area->id,$type->id,$subtype->id,"",$request->exercisedescription,$request->exercisestatus,$mediatype,$storename]);
                
                $exercise = DB::table('exercise')
                    ->join('category', 'exercise.category', '=', 'category.id')
                    ->join('area', 'exercise.area', '=', 'area.id')
                    ->join('type', 'exercise.type', '=', 'type.id')
                    ->join('subtype', 'exercise.subtype', '=', 'subtype.id')
                    ->select('exercise.id','exercise.title', 'area.areatitle as areatitle', 'category.categorytitle as categorytitle','type.typetitle as typetitle','subtype.subtypetitle as subtypetitle')
                    ->get();
                return redirect('manageexercise')->with('exercise',$exercise);
            }else
            {
                echo "<script>
                    alert('This Exercise Title already Exist');
                    window.history.back();
                    </script>";
                // return redirect('exerciseadd')->withErrors($validator->errors());
            }
        }
    }

    public function edit($id)
    {
        $category = DB::table('category')->get();
        $area = DB::table('area')->get();
        $type = DB::table('type')->get();
        $subtype = DB::table('subtype')->get();

        $exercise = DB::table('exercise')->where('id', '=', $id)->first();
        return view('Library/ManageExercise/exerciseedit')->with('exercise',$exercise)-> with('category',$category)-> with('area',$area)-> with('type',$type)-> with('subtype',$subtype);
    }

    public function update(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'previous' => 'required|max:255',
            'exercisetitle' => 'required|max:255',
            'exercisecategory' => 'required|max:255',
            'exercisearea' => 'required|max:255',
            'exercisetype' => 'required|max:255',
            'exercisesubtype' => 'required|max:255',
        ]);

        if ( $validator->fails()) {
           
            return redirect()->back()->withErrors($validator->errors());
        }else{
            if(DB::table('exercise')->where('title', '=', $request->exercisetitle)->count() == 0){
                // $result = DB::table('training')
                //     ->join('department', 'training.trainingdepartment', '=', 'department.id')
                //     ->select('training.id','training.trainingtitle', 'training.trainingdepartment', 'department.departmenttitle','department.id as departmentid')
                //     ->where('department.departmenttitle', $request->trainingdepartment)->first();
                $file = $request->file('uplode_image_file');
                // dd($file);
                $info=$file->getClientOriginalExtension();
                if (!$request->hasFile('uplode_image_file')) {
                    return redirect()->back()->withErrors($validator->errors());
                }
                if(($info == "jpeg" || $info == 'png') && $request->mediatype == "mp4")
                {
                        return redirect()->back()->withErrors($validator->errors());
                }
                else if($info == "mp4" && $request->mediatype == "JPEG or PNG"){
                   
                        return redirect()->back()->withErrors($validator->errors());
                }
                
                $destinationPath = 'images/news';
                $destinationPath1 = 'videos';
                $storename = "";
                $filepath = str_replace(" ","",$request->exercisetitle);
                if($info == "jpeg")
                {
                    $storename = $filepath . ".jpg"; 
                    $storename = '../images/news/' . $storename;
                    $file->move($destinationPath,$storename); 
                              
                }elseif($info =="png")
                {
                    $storename = $filepath . ".png";
                    $storename = '../images/news/' . $storename;
                    $file->move($destinationPath,$storename);
                }elseif($info =="mp4")
                {
                    $storename = $filepath . ".mp4";
                    $storename = '../videos/' . $storename;
                    $file->move($destinationPath1,$storename); 
                    
                }else{
                    return redirect()->back()->withErrors($validator->errors());
                }
                // dd($storename);
                $category = DB::table('category')
                    ->where('categorytitle', $request->exercisecategory)->first();
                
                $area = DB::table('area')
                    
                    ->where('areatitle', $request->exercisearea)->first();
                // dd($area);
                
                $type = DB::table('type')
                    
                    ->where('typetitle', $request->exercisetype)->first();
                // dd($type);
                // dd("aa");
                $subtype = DB::table('subtype')
                    
                    ->where('subtypetitle', $request->exercisesubtype)->first();
                DB::table('exercise')
                    ->where('title', $request->previous)
                    ->update(['title' => $request->exercisetitle, 
                    'status' => $request->exercisestatus, 
                    'filelink' => $storename,
                    'category' => $category->id,
                    'area' =>$area->id,
                    'type' =>$type->id,
                    'subtype' => $subtype->id
                    ]);
                
                $exercise = DB::table('exercise')
                    ->join('category', 'exercise.category', '=', 'category.id')
                    ->join('area', 'exercise.area', '=', 'area.id')
                    ->join('type', 'exercise.type', '=', 'type.id')
                    ->join('subtype', 'exercise.subtype', '=', 'subtype.id')
                    ->select('exercise.id','exercise.title', 'area.areatitle as areatitle', 'category.categorytitle as categorytitle','type.typetitle as typetitle','subtype.subtypetitle as subtypetitle')
                    ->get();

                    
                return redirect('manageexercise')->with('exercise',$exercise);
            }else{
                
                // return redirect()->back()->withErrors($validator->errors());
                echo "<script>
                    alert('This Exercise Title already Exist');
                    window.history.back();
                    </script>";
                
            }
        }
    }

    public function generate_pdf(Request $request) 
    {
       
        $data = DB::table('exercise')->get(100);
        $selectedExerciseList = array();
        $arrayCount = DB::table('exercise')->count();

        for($i = 0; $i < $arrayCount; $i ++)
        {
            unset($data[$i]);
        }
        for($i =1; $i < $arrayCount + 1; $i ++ )
        {
            $temp = "exerciseindex" . $i;
            if($request->get($temp) != "")
            {
                $exercise = DB::table('exercise')
                    ->where('id','=',$i)
                    ->first();
                $data[] = $exercise;
            }
        }
        PDF::loadView('pdf.document', $data)->stream('docunment.pdf');
    }

    public function delete($id)
    {
        $tempexercise = DB::table('exercise')
            ->where('id', $id)
            ->get();
       
        $exercise = DB::table('exercise')
            ->where('id', $id)
            ->delete();
        $userexercise = DB::table('userexercise')
            ->where('exercise', $tempexercise[0]->title)
            ->delete();
        // dd($userexercise);
        $exercise = DB::table('exercise')->get();
        return redirect('manageexercise')->with('exercise',$exercise);
    }

    public function viewexercise()
    {
        $patient = DB::table('patient')->get();
        
        $category = DB::table('category')->get();
        $area = DB::table('area')->get();
        $type = DB::table('type')->get();
        $subtype = DB::table('subtype')->get();        
        $temp = 0;
        // dd($temp);
        $exercise = DB::table('exercise')->get();
        $final_category = array();
        $empty = false;
        $expiredItem = array();
        $userExeItem = array();
        $isexpired = false;
        if(Auth::user()->privillege == 1 || Auth::user()->privillege == 3)
        {
            foreach($category as $category_item)
            {
                foreach($exercise as $item) {
                    if ($category_item->id == $item->category)
                        $temp++;
                }
                if($temp != 0)
                {
                    $temp = 0;
                    array_push($final_category, $category_item);
                }
            }
            $count = (count($exercise)-1)/12+1;
            $tempexe = DB::table('exercise')
            ->get();
            foreach($tempexe as $item){
                DB::table('exercise')->where('id', $item->id)->update(['repeat' => 1]);
            }
            
            return view('Library/ViewExercise/viewexercise')->with('area',$area)->with('type',$type)->with('subtype',$subtype)->with('category',$final_category)->with('exercise',$exercise)->with('patient',$patient)->with('empty', $empty)->with('isexpired', $isexpired)->with('expiredItem', $expiredItem)->with('userItem', $userExeItem)->with('execnt', $count);
        }
        else
        {
            $isexpired = true;
            $userexercise = DB::table('userexercise')
                            ->where('user','=',Auth::user()->name)
                            ->get();
 
            $selectedExerciseList = array();
    
            
            foreach($userexercise as $item)
            {
                $userExeItem[] = $item;
                $calculate_date = date('Y-m-d');

                if($calculate_date > $item->expire_date){
                    $expiredItem[] = $item;
                }
                else{
                    $result = DB::table('exercise')
                                ->where('title','=',$item->exercise)
                                ->first();
                    
                    $selectedExerciseList[] = $result;
                }
                
            }
            // dd($selectedExerciseList);
            if(empty($expiredItem)){
                $isexpired = false;
            }
            foreach($expiredItem as $exeitem)
            {
                $temp = DB::table('userexercise')
                    ->where('exercise', $exeitem->exercise)
                    ->where('user', $exeitem->user)
                    ->delete();
                // dd($temp);
            }
            foreach($category as $category_item)
            {
                foreach($selectedExerciseList as $item) {
                   
                    if ($category_item->id == $item->category)
                        $temp++;
                }
                if($temp != 0)
                {
                    $temp = 0;
                    array_push($final_category, $category_item);
                }
            }
           
            $count = (count($selectedExerciseList)-1)/12+1;
            return view('Library/ViewExercise/viewexercise')->with('area',$area)->with('type',$type)->with('subtype',$subtype)->with('category',$final_category)->with('exercise',$selectedExerciseList)->with('patient',$patient)->with('empty', $empty)->with('isexpired', $isexpired)->with('expiredItem', $expiredItem)->with('userItem', $userExeItem)->with('execnt', $count);
        }
    }
    
    public function updatefavouriteexercise($id)
    {
        if(Auth::user()->privillege == 1 || Auth::user()->privillege == 3 )
        {
            $result = DB::table('exercise')
            ->where('id', $id)
            ->first();
            if($result->favourite == 0)
            {
                DB::table('exercise')
                    ->where('id', $id)
                    ->update(['favourite' => "1"]);
            }else
            {
                DB::table('exercise')
                ->where('id', $id)
                ->update(['favourite' => "0"]);
            }
        }
        
        return redirect()->back()->withErrors("back");
    }

    public function showfiltercategoryexercise($id)
    {
        $expiredItem = array();
        $userExeItem = array();
        $patient = DB::table('patient')->get();
        $exercise = DB::table('exercise')
                ->where('category',$id)
                ->get();
        $area = DB::table('area')->get();
        $type = DB::table('type')->get();
        $subtype = DB::table('subtype')->get();
        $category = DB::table('category')->get();
        $empty = false;
        $temp = 0;
        $isexpired = false;
        // dd($temp);
        if(Auth::user()->privillege == 1 || Auth::user()->privillege == 3){
            $exercise = DB::table('exercise')
                ->where('category',$id)
                ->get();
            $exercisetemp = DB::table('exercise')->get();
        }
        else if(Auth::user()->privillege == 2){
            $exercise = array();
            $exercisetemp = array();
            $userexercise = DB::table('userexercise')
                            ->where('user','=',Auth::user()->name)
                            ->get();
            foreach($userexercise as $item)
            {
                $calculate_date = date('Y-m-d');
                $userExeItem[] = $item;
                if($calculate_date > $item->expire_date){
                    $expiredItem[] = $item;
                }
                else{
                    $result = DB::table('exercise')
                                ->where('title','=',$item->exercise)
                                ->first();
                    $result1 = DB::table('exercise')
                                ->where('category',$id)
                                ->where('title','=',$item->exercise)
                                ->first();
                    $exercisetemp[] = $result;
                    if($result1 != null){
                        $exercise[] = $result1;
                    }
                }
            }
            // dd($exercise);
        }
        $final_category = array();
        foreach($category as $category_item)
        {
            foreach($exercisetemp as $item) {
                if ($category_item->id == $item->category)
                    $temp++;
            }
            if($temp != 0)
            {
                $temp = 0;
                array_push($final_category, $category_item);
            }
        }
        $count = (count($exercise)-1)/12+1;
        return view("Library/ViewExercise/viewexercise")->with('area',$area)->with('type',$type)->with('subtype',$subtype)->with('exercise',$exercise)->with('category',$final_category)->with('patient',$patient)->with('empty', $empty)->with('isexpired', $isexpired)->with('expiredItem', $expiredItem)->with('userItem', $userExeItem)->with('execnt', $count);
    }
    public function showfilterexercise(Request $request)
    {
        $individual_area = $individual_type = $individual_subtype = $individual_media = false;
        $validator = Validator::make($request->all(), [
            'areatitle' => 'required|max:255',
            'mediatype'=>'required|max:255',
            'typetitle' => 'required|max:255',
            'subtypetitle' => 'required|max:255',
            
        ]);

        $patient = DB::table('patient')->get();

        $category = DB::table('category')->get();
        $expiredItem = array();
        $userExeItem = array();
        $isexpired = false;
        $empty = false;
        $mediatype1 = "";
        if($request->mediatype == "JPEG or PNG")
            $mediatype1 = "Picture";
        else if($request->mediatype == "mp4")
            $mediatype1 = "Video";
        // dd($request->mediatype);
        if(Auth::user()->privillege == 1 || Auth::user()->privillege == 3){
            if($request->areatitle == "All Exercise Areas")
            {
                $area = DB::table('exercise')
                ->join('area', 'area.id', '=', 'exercise.area')
                ->select('exercise.id','area.areatitle','area.id as areaid')
                ->get();
            }else
            {
                $area = DB::table('exercise')
                ->join('area', 'area.id', '=', 'exercise.area')
                ->select('exercise.id','area.areatitle','area.id as areaid')
                ->where('area.areatitle', $request->areatitle)->first();
                if(!$area){
                    $empty = true;
                }
                $individual_area = true;
            }

            if($request->typetitle=="All Exercise Types")
            {
                $type = DB::table('exercise')
                ->join('type', 'type.id', '=', 'exercise.type')
                ->select('exercise.id','type.typetitle','type.id as typeid')
                ->get();
                
            }
            else
            {
                $type = DB::table('exercise')
                ->join('type', 'type.id', '=', 'exercise.type')
                ->select('exercise.id','type.typetitle','type.id as typeid')
                ->where('type.typetitle', $request->typetitle)->first();
                if(!$type){
                    $empty = true;
                }
                $individual_type = true;
            }

            if($request->subtypetitle=="All Exercise Sub Types")
            {
                $subtype = DB::table('exercise')
                ->join('subtype', 'subtype.id', '=', 'exercise.subtype')
                ->select('exercise.id','subtype.subtypetitle','subtype.id as subtypeid')
                ->get();
            }
            else
            {
                $subtype = DB::table('exercise')
                ->join('subtype', 'subtype.id', '=', 'exercise.subtype')
                ->select('exercise.id','subtype.subtypetitle','subtype.id as subtypeid')
                ->where('subtype.subtypetitle', $request->subtypetitle)->first();
                // dd($subtype)
                if(!$subtype){
                    $empty = true;
                }
                $individual_subtype = true;
            }
            if($request->mediatype=="All Exercise Media Tpyes")
            {
                // $subtype = DB::table('exercise')
                // ->join('subtype', 'subtype.id', '=', 'exercise.subtype')
                // ->select('exercise.id','subtype.subtypetitle','subtype.id as subtypeid')
                // ->get();
            }
            else
            {
                // $subtype = DB::table('exercise')
                // ->join('subtype', 'subtype.id', '=', 'exercise.subtype')
                // ->select('exercise.id','subtype.subtypetitle','subtype.id as subtypeid')
                // ->where('subtype.subtypetitle', $request->subtypetitle)->first();
                $individual_media = true;
            }
            if(!$empty){
                if(!$individual_area&& !$individual_type && !$individual_subtype && !$individual_media)
                {
                    $exercise = DB::table('exercise')->get();
                }
                elseif(!$individual_area && !$individual_type && !$individual_subtype &&  $individual_media)
                {
                    $exercise = DB::table('exercise')
                        ->where('mediatype','=',$mediatype1)
                        ->get();
                }
                elseif(!$individual_area && !$individual_type && $individual_subtype && !$individual_media)
                {
                    $exercise = DB::table('exercise')
                        ->where('subtype','=',$subtype->subtypeid)
                        ->get();
                }
                elseif(!$individual_area && !$individual_type && $individual_subtype && $individual_media)
                {
                    $exercise = DB::table('exercise')
                        ->where('subtype','=',$subtype->subtypeid)
                        ->where('mediatype','=',$mediatype1)
                        ->get();
                }
                elseif(!$individual_area && $individual_type &&  !$individual_subtype &&  !$individual_media)
                {
                    $exercise = DB::table('exercise')
                        ->where('type','=',$type->typeid)
                        ->get();
                }
                elseif(!$individual_area && $individual_type && !$individual_subtype && $individual_media)
                {
                    $exercise = DB::table('exercise')
                        ->where('mediatype','=',$mediatype1)
                        ->where('type','=',$type->typeid)
                        ->get();
                }
                elseif(!$individual_area && $individual_type && $individual_subtype && !$individual_media)
                {
                    $exercise = DB::table('exercise')
                        ->where('subtype','=',$subtype->subtypeid)
                        ->where('type','=',$type->typeid)
                        ->get();
                }
                elseif(!$individual_area && $individual_type && $individual_subtype && $individual_media)
                {
                    $exercise = DB::table('exercise')
                        ->where('mediatype','=',$mediatype1)
                        ->where('subtype','=',$subtype->subtypeid)
                        ->where('type','=',$type->typeid)
                        ->get();
                }
                elseif($individual_area && !$individual_type && !$individual_subtype && !$individual_media)
                {
                    $exercise = DB::table('exercise')
                        ->where('area','=',$area->areaid)
                        ->get();
                }
                elseif($individual_area && !$individual_type && !$individual_subtype && $individual_media)
                {
                    $exercise = DB::table('exercise')
                        ->where('area','=',$area->areaid)
                        ->where('mediatype','=',$mediatype1)
                        ->get();
                }
                elseif($individual_area && !$individual_type && $individual_subtype && !$individual_media)
                {
                    $exercise = DB::table('exercise')
                        ->where('area','=',$area->areaid)
                        ->where('subtype','=',$subtype->subtypeid)
                        ->get();
                }
                elseif( $individual_area && !$individual_type && $individual_subtype && $individual_media)
                {
                    $exercise = DB::table('exercise')
                        ->where('area','=',$area->areaid)
                        ->where('subtype','=',$subtype->subtypeid)
                        ->where('mediatype','=',$mediatype1)
                        ->get();
                }
                elseif($individual_area &&  $individual_type && !$individual_subtype && !$individual_media)
                {
                    $exercise = DB::table('exercise')
                        ->where('area','=',$area->areaid)
                        ->where('type','=',$type->typeid)
                        ->get();
                }
                elseif($individual_area && $individual_type && !$individual_subtype && $individual_media)
                {
                    $exercise = DB::table('exercise')
                        ->where('mediatype','=',$mediatype1)
                        ->where('area','=',$area->areaid)
                        ->where('type','=',$type->typeid)
                        ->get();
                }
                elseif( $individual_area &&  $individual_type && $individual_subtype && !$individual_media)
                {
                    $exercise = DB::table('exercise')
                        ->where('area','=',$area->areaid)
                        ->where('subtype','=',$subtype->subtypeid)
                        ->where('type','=',$type->typeid)
                        ->get();
                }
                elseif($individual_area && $individual_type && $individual_subtype && $individual_media)
                {
                    $exercise = DB::table('exercise')
                        ->where('mediatype','=',$mediatype1)
                        ->where('area','=',$area->areaid)
                        ->where('subtype','=',$subtype->subtypeid)
                        ->where('type','=',$type->typeid)
                        ->get();
                }
            }
            else{
                $exercise = DB::table('exercise')->get();
            }
        }

        else if(Auth::user()->privillege == 2){
            $userexercise = DB::table('userexercise')
                            ->where('user','=',Auth::user()->name)
                            ->get();
            if($request->areatitle == "All Exercise Areas")
            {
                $area = array();
                foreach($userexercise as $item){
                    $calculate_date = date('Y-m-d');
                   
                    if($calculate_date > $item->expire_date){
                        $expiredItem[] = $item;
                    }
                    else{
                    $result = DB::table('exercise')
                    ->join('area', 'area.id', '=', 'exercise.area')
                    ->select('exercise.id','area.areatitle','area.id as areaid')
                    ->where('title','=',$item->exercise)
                    ->first();
                    $area[] = $result;
                    }
                }
                // dd($area);
                
            }
            else
            {
                $area = array();
                foreach($userexercise as $item){
                    $calculate_date = date('Y-m-d');
                    
                    if($calculate_date > $item->expire_date){
                        $expiredItem[] = $item;
                    }
                    else{
                        $result = DB::table('exercise')
                        ->join('area', 'area.id', '=', 'exercise.area')
                        ->select('exercise.id','area.areatitle','area.id as areaid')
                        ->where('title','=',$item->exercise)
                        ->where('area.areatitle', $request->areatitle)->first();
                        if($result){
                            $area[] = $result;
                        }}
                }
                if(empty($area)){
                    $empty = true;
                }
                
                $individual_area = true;
            }

            if($request->typetitle=="All Exercise Types")
            {
                $type = array();
                foreach($userexercise as $item){
                    $calculate_date = date('Y-m-d');
                    
                    if($calculate_date > $item->expire_date){
                        $expiredItem[] = $item;
                    }
                    else{
                        $result = DB::table('exercise')
                        ->join('type', 'type.id', '=', 'exercise.type')
                        ->select('exercise.id','type.typetitle','type.id as typeid')
                        ->where('title','=',$item->exercise)
                        ->first();
                        $type[] = $result;
                    }
                }
                
            }
            else
            {
                $type = array();
                foreach($userexercise as $item){
                    $calculate_date = date('Y-m-d');
                    
                    if($calculate_date > $item->expire_date){
                        $expiredItem[] = $item;
                    }
                    else{
                        $result = DB::table('exercise')
                        ->join('type', 'type.id', '=', 'exercise.type')
                        ->select('exercise.id','type.typetitle','type.id as typeid')
                        ->where('title','=',$item->exercise)
                        ->where('type.typetitle', $request->typetitle)->first();
                        if($result){
                            $type[] = $result;
                        }
                    }

                }
                if(empty($type)){
                   
                    $empty = true;
                }
                $individual_type = true;
            }

            if($request->subtypetitle=="All Exercise Sub Types")
            {
                
                // $subtype = DB::table('exercise')
                // ->join('subtype', 'subtype.id', '=', 'exercise.subtype')
                // ->select('exercise.id','subtype.subtypetitle','subtype.id as subtypeid')
                // ->get();
                $subtype = array();
                foreach($userexercise as $item){
                
                $calculate_date = date('Y-m-d');
                if($calculate_date > $item->expire_date){
                     $expiredItem[] = $item;
                }
                else{
                        $result = DB::table('exercise')
                        ->join('subtype', 'subtype.id', '=', 'exercise.subtype')
                        ->select('exercise.id','subtype.subtypetitle','subtype.id as subtypeid')
                        ->where('title','=',$item->exercise)
                        ->first();
                        $subtype[] = $result;
                    }
                }
                
            }
            else
            {
                $subtype = array();
                foreach($userexercise as $item){
                    
                    $calculate_date = date('Y-m-d');

                    if($calculate_date > $item->expire_date){
                        $expiredItem[] = $item;
                    }
                    else{
                            $result = DB::table('exercise')
                            ->join('subtype', 'subtype.id', '=', 'exercise.subtype')
                            ->select('exercise.id','subtype.subtypetitle','subtype.id as subtypeid')
                            ->where('title','=',$item->exercise)
                            ->where('subtype.subtypetitle', $request->subtypetitle)->first();
                            if($result){
                                $subtype[] = $result;
                            }
                    }
                }
                if(empty($subtype)){
                    $empty = true;
                }
                // dd($subtype[0]->subtypeid);
                $individual_subtype = true;
            }
            if($request->mediatype=="All Exercise Media Tpyes")
            {
                // $subtype = DB::table('exercise')
                // ->join('subtype', 'subtype.id', '=', 'exercise.subtype')
                // ->select('exercise.id','subtype.subtypetitle','subtype.id as subtypeid')
                // ->get();
            }
            else
            {
                // $subtype = DB::table('exercise')
                // ->join('subtype', 'subtype.id', '=', 'exercise.subtype')
                // ->select('exercise.id','subtype.subtypetitle','subtype.id as subtypeid')
                // ->where('subtype.subtypetitle', $request->subtypetitle)->first();
                $individual_media = true;
            }
            if(!$empty){
                if(!$individual_area&& !$individual_type && !$individual_subtype && !$individual_media)
                {
                    $exercise = array();
                    
                    foreach($userexercise as $item)
                    {
                        $calculate_date = date('Y-m-d');
                        $userExeItem[] = $item;
                        if($calculate_date > $item->expire_date){
                            $expiredItem[] = $item;
                        }
                        else{
                        $result = DB::table('exercise')
                                    ->where('title','=',$item->exercise)
                                    ->first();
                        $exercise[] = $result;
                        }
                    }
                    // dd($exercise);
                }
                elseif(!$individual_area && !$individual_type && !$individual_subtype &&  $individual_media)
                {
                    $exercise = array();
                    
                    foreach($userexercise as $item)
                    {
                        
                        $calculate_date = date('Y-m-d');
                        $userExeItem[] = $item;
                        if($calculate_date > $item->expire_date){
                            $expiredItem[] = $item;
                        }
                        else{
                            $result = DB::table('exercise')
                                        ->where('mediatype','=',$mediatype1)
                                        ->where('title','=',$item->exercise)
                                        ->first();
                            if($result){
                                    $exercise[] = $result;
                                }
                        }
                    }
                    if(empty($exercise)){
                        $empty = true;
                    }
                    
                    
                }
                elseif(!$individual_area && !$individual_type && $individual_subtype && !$individual_media)
                {
                    $exercise = array();
                    
                    foreach($userexercise as $item)
                    {
                        $calculate_date = date('Y-m-d');
                        $userExeItem[] = $item;
                        if($calculate_date > $item->expire_date){
                            $expiredItem[] = $item;
                        }
                        else{
                            $result = DB::table('exercise')
                                        ->where('subtype','=',$subtype[0]->subtypeid)
                                        ->where('title','=',$item->exercise)
                                        ->first();
                            if($result){
                            $exercise[] = $result;
                            }
                        }
                    }
                    if(empty($exercise)){
                        $empty = true;
                    }
                }
                elseif(!$individual_area && !$individual_type && $individual_subtype && $individual_media)
                {
                    $exercise = array();
                    foreach($userexercise as $item)
                    {
                        $calculate_date = date('Y-m-d');
                        $userExeItem[] = $item;
                        if($calculate_date > $item->expire_date){
                            $expiredItem[] = $item;
                        }
                        else{
                            $result = DB::table('exercise')
                                    ->where('subtype','=',$subtype[0]->subtypeid)
                                    ->where('mediatype','=',$mediatype1)
                                        ->where('title','=',$item->exercise)
                                        ->first();
                            if($result){
                            $exercise[] = $result;
                            }
                        }
                    }
                    if(empty($exercise)){
                        $empty = true;
                    }
                }
                elseif(!$individual_area && $individual_type &&  !$individual_subtype &&  !$individual_media)
                {
                    $exercise = array();
                    foreach($userexercise as $item)
                    {
                        $calculate_date = date('Y-m-d');
                        $userExeItem[] = $item;
                        if($calculate_date > $item->expire_date){
                             $expiredItem[] = $item;
                        }
                        else{
                            $result = DB::table('exercise')                                    
                                        ->where('title','=',$item->exercise)
                                        ->where('type','=',$type[0]->typeid)
                                        ->first();
                            if($result){
                            $exercise[] = $result;
                            }
                        }
                    }
                    if(empty($exercise)){
                        $empty = true;
                    }
                
                }
                elseif(!$individual_area && $individual_type && !$individual_subtype && $individual_media)
                {
                    $exercise = array();
                    foreach($userexercise as $item)
                    {
                        $calculate_date = date('Y-m-d');
                        $userExeItem[] = $item;
                        if($calculate_date > $item->expire_date){
                            $expiredItem[] = $item;
                        }
                        else{
                            $result = DB::table('exercise')                 
                                        ->where('mediatype','=',$mediatype1)                   
                                        ->where('title','=',$item->exercise)
                                        ->where('type','=',$type [0]->typeid)
                                        ->first();
                            if($result){
                            $exercise[] = $result;
                            }
                        }
                    }
                    if(empty($exercise)){
                        $empty = true;
                    }
                }
                elseif(!$individual_area && $individual_type && $individual_subtype && !$individual_media)
                {
                    // $exercise = DB::table('exercise')
                    //     ->where('subtype','=',$subtype->subtypeid)
                    //     ->where('type','=',$type->typeid)
                    //     ->get();
                    $exercise = array();
                    foreach($userexercise as $item)
                    {
                        $calculate_date = date('Y-m-d');
                        $userExeItem[] = $item;
                        if($calculate_date > $item->expire_date){
                             $expiredItem[] = $item;
                        }
                        else{
                            $result = DB::table('exercise')                                    
                                        ->where('title','=',$item->exercise)
                                        ->where('subtype','=',$subtype[0]->subtypeid)
                                        ->where('type','=',$type[0]->typeid)
                                        ->first();
                            if($result){
                            $exercise[] = $result;
                            }
                        }
                    }
                    if(empty($exercise)){
                        $empty = true;
                    }
                }
                elseif(!$individual_area && $individual_type && $individual_subtype && $individual_media)
                {
                    $exercise = array();
                    foreach($userexercise as $item)
                    {

                        $calculate_date = date('Y-m-d');
                        $userExeItem[] = $item;
                        if($calculate_date > $item->expire_date){
                            $expiredItem[] = $item;
                        }
                        else{
                            $result = DB::table('exercise')                                    
                                        ->where('title','=',$item->exercise)
                                        ->where('mediatype','=',$mediatype1)
                                    ->where('subtype','=',$subtype[0]->subtypeid)
                                    ->where('type','=',$type[0]->typeid)
                                        ->first();
                            if($result){
                            $exercise[] = $result;
                            }
                        }
                    }
                    if(empty($exercise)){
                        $empty = true;
                    }
                }
                elseif($individual_area && !$individual_type && !$individual_subtype && !$individual_media)
                {
                    $exercise = array();
                    foreach($userexercise as $item)
                    {
                        $calculate_date = date('Y-m-d');
                        $userExeItem[] = $item;
                        if($calculate_date > $item->expire_date){
                            $expiredItem[] = $item;
                        }
                        else{
                            $result = DB::table('exercise')                                    
                                        ->where('title','=',$item->exercise)
                                        ->where('area','=',$area[0]->areaid)
                                        ->first();
                            if($result){
                            $exercise[] = $result;
                            }
                        }
                    }
                    if(empty($exercise)){
                        $empty = true;
                    }
                    // $exercise = DB::table('exercise')
                    //     ->where('area','=',$area[0]->areaid)
                    //     ->get();
                }
                elseif($individual_area && !$individual_type && !$individual_subtype && $individual_media)
                {
                    $exercise = array();
                    foreach($userexercise as $item)
                    {
                        $calculate_date = date('Y-m-d');
                        $userExeItem[] = $item;
                        if($calculate_date > $item->expire_date){
                             $expiredItem[] = $item;
                        }
                        else{
                            $result = DB::table('exercise')                                    
                                        ->where('title','=',$item->exercise)
                                        ->where('area','=',$area[0]->areaid)
                                        ->where('mediatype','=',$mediatype1)
                                        ->first();
                            if($result){
                            $exercise[] = $result;
                            }
                        }
                    }
                    if(empty($exercise)){
                        $empty = true;
                    }
                }
                elseif($individual_area && !$individual_type && $individual_subtype && !$individual_media)
                {
                    
                    $exercise = array();
                    foreach($userexercise as $item)
                    {
                        $calculate_date = date('Y-m-d');
                        $userExeItem[] = $item;
                        if($calculate_date > $item->expire_date){
                            $expiredItem[] = $item;
                        }
                        else{
                            $result = DB::table('exercise')                                    
                                        ->where('title','=',$item->exercise)
                                        ->where('area','=',$area[0]->areaid)
                                        ->where('subtype','=',$subtype[0]->subtypeid)
                                        ->first();
                            if($result){
                            $exercise[] = $result;
                            }
                        }
                    }
                    if(empty($exercise)){
                        $empty = true;
                    }
                }
                elseif( $individual_area && !$individual_type && $individual_subtype && $individual_media)
                {
                    $exercise = array();
                    foreach($userexercise as $item)
                    {
                        $calculate_date = date('Y-m-d');
                        $userExeItem[] = $item;
                        if($calculate_date > $item->expire_date){
                            $expiredItem[] = $item;
                        }
                        else{
                            $result = DB::table('exercise')                                    
                                        ->where('title','=',$item->exercise)
                                        ->where('area','=',$area[0]->areaid)
                                        ->where('subtype','=',$subtype[0]->subtypeid)
                                        ->where('mediatype','=',$mediatype1)
                                        ->first();
                            if($result){
                            $exercise[] = $result;
                            }
                        } 
                        
                    }
                    if(empty($exercise)){
                        $empty = true;
                    }
                }
                elseif($individual_area &&  $individual_type && !$individual_subtype && !$individual_media)
                {
                    $exercise = array();
                    foreach($userexercise as $item)
                    {
                        $calculate_date = date('Y-m-d');
                        $userExeItem[] = $item;
                        if($calculate_date > $item->expire_date){
                            $expiredItem[] = $item;
                        }
                        else{
                            $result = DB::table('exercise')                                    
                                        ->where('title','=',$item->exercise)
                                        ->where('area','=',$area[0]->areaid)
                                        ->where('type','=',$type[0] -> typeid)
                                        ->first();
                            if($result){
                            $exercise[] = $result;
                            }
                        }
                    }
                    if(empty($exercise)){
                        $empty = true;
                    }
                }
                elseif($individual_area && $individual_type && !$individual_subtype && $individual_media)
                {
                    $exercise = array();
                    foreach($userexercise as $item)
                    {
                        $calculate_date = date('Y-m-d');
                        $userExeItem[] = $item;
                        if($calculate_date > $item->expire_date){
                            $expiredItem[] = $item;
                        }
                        else{
                            $result = DB::table('exercise')                                    
                                        ->where('title','=',$item->exercise)
                                        ->where('mediatype','=',$mediatype1)
                                        ->where('area','=',$area[0]->areaid)
                                        ->where('type','=',$type[0]->typeid)
                                        ->first();
                            if($result){
                            $exercise[] = $result;
                            }
                        }
                    }
                    if(empty($exercise)){
                        $empty = true;
                    }
                }
                elseif( $individual_area &&  $individual_type && $individual_subtype && !$individual_media)
                {
                    $exercise = array();
                    foreach($userexercise as $item)
                    {
                        $calculate_date = date('Y-m-d');
                        $userExeItem[] = $item;
                        if($calculate_date > $item->expire_date){
                            $expiredItem[] = $item;
                        }
                        else{
                            $result = DB::table('exercise')                                    
                                        ->where('title','=',$item->exercise)
                                        ->where('area','=',$area[0]->areaid)
                                        ->where('subtype','=',$subtype[0]->subtypeid)
                                        ->where('type','=',$type[0]->typeid)
                                        ->first();
                            if($result){
                            $exercise[] = $result;
                            }
                        }
                    }
                    if(empty($exercise)){
                        $empty = true;
                    }
                }
                elseif($individual_area && $individual_type && $individual_subtype && $individual_media)
                {
                    $exercise = array();
                    foreach($userexercise as $item)
                    {
                        $calculate_date = date('Y-m-d');
                        $userExeItem[] = $item;
                        if($calculate_date > $item->expire_date){
                            $expiredItem[] = $item;
                        }
                        else{
                            $result = DB::table('exercise')                                    
                                        ->where('title','=',$item->exercise)
                                        ->where('mediatype','=',$mediatype1)
                                        ->where('area','=',$area[0]->areaid)
                                        ->where('subtype','=',$subtype[0]->subtypeid)
                                        ->where('type','=',$type[0]->typeid)
                                        ->first();
                            if($result){
                            $exercise[] = $result;
                            }
                        }
                    }
                    if(empty($exercise)){
                        $empty = true;
                    }
                    // $exercise = DB::table('exercise')
                    //     ->where('mediatype','=',$request->mediatype)
                    //     ->where('area','=',$area->areaid)
                    //     ->where('subtype','=',$subtype->subtypeid)
                    //     ->where('type','=',$type->typeid)
                    //     ->get();
                }
            }
            else{
                $exercise = array();
                foreach($userexercise as $item)
                {
                    $userExeItem[] = $item;
                    $calculate_date = date('Y-m-d');
                    if($calculate_date > $item->expire_date){
                        $expiredItem[] = $item;
                    }
                    else{
                    $result = DB::table('exercise')
                                ->where('title','=',$item->exercise)
                                ->first();
                    $exercise[] = $result;
                    }
                }
            }
        }
        $area = DB::table('area')->get();
        $type = DB::table('type')->get();
        $subtype = DB::table('subtype')->get();
        $temp = 0;
        $exercisetemp = DB::table('exercise')->get();
        $final_category = array();
       
        if(Auth::user()->privillege == 1 || Auth::user()->privillege == 3){
            foreach($category as $category_item)
            {
                foreach($exercisetemp as $item) {
                    if ($category_item->id == $item->category)
                        $temp++;
                }
                if($temp != 0)
                {
                    $temp = 0;
                    array_push($final_category, $category_item);
                }
            }
            $count = (count($exercise)-1)/12+1;
            return view("Library/ViewExercise/viewexercise")->with('area',$area)->with('type',$type)->with('subtype',$subtype)->with('exercise',$exercise)->with('category',$final_category)->with('patient',$patient)->with('empty', $empty)->with('isexpired', $isexpired)->with('expiredItem', $expiredItem)->with('userItem', $userExeItem)->with('execnt', $count);
        }
        else{
            $userexercise = DB::table('userexercise')
                            ->where('user','=',Auth::user()->name)
                            ->get();
            $selectedExerciseList = array();
            foreach($userexercise as $item)
            {
                $calculate_date = date('Y-m-d');
                
                if($calculate_date > $item->expire_date){
                     $expiredItem[] = $item;
                }
                else{
                $result = DB::table('exercise')
                            ->where('title','=',$item->exercise)
                            ->first();
                $selectedExerciseList[] = $result;
                }
            }
            foreach($category as $category_item)
            {
                foreach($selectedExerciseList as $item) {
                    if ($category_item->id == $item->category)
                        $temp++;
                }
                if($temp != 0)
                {
                    $temp = 0;
                    array_push($final_category, $category_item);
                }
            }
            $count = (count($exercise)-1)/12+1;
            
            return view('Library/ViewExercise/viewexercise')->with('area',$area)->with('type',$type)->with('subtype',$subtype)->with('category',$final_category)->with('exercise',$exercise)->with('patient',$patient)->with('empty', $empty)->with('isexpired', $isexpired)->with('expiredItem', $expiredItem)->with('userItem', $userExeItem)->with('execnt', $count);
        }
    }

    public function preview(Request $request)
    {
        $mydate = date('m/d/Y');
        $daystosum = '10';
        $datesum = date('m/d/Y', strtotime($mydate.' + '.$daystosum.' days'));

        // $mytime = Carbon\Carbon::now();
        // echo $mytime->toDateTimeString();
        // echo $ldate->toDateTimeString();
        // return;
        $patient = DB::table('patient')->get();
        
        $selectedExerciseList = array();
        $exerciseArray = DB::table('exercise')->get();
        foreach($exerciseArray as $item){
            $temp = "check" . $item->id;
            if($request->get($temp) == "checked")
            {
                $exercise = DB::table('exercise')
                    ->where('id','=',$item->id)
                    ->first();
                
                $selectedExerciseList[] = $exercise;
            }
        }
        // $arrayCount = DB::table('exercise')->count();
        
        // for($i =1; $i < $arrayCount + 1; $i ++ )
        // {
        //     $temp = "check" . $i;
        //     if($request->get($temp) == "checked")
        //     {
        //         $exercise = DB::table('exercise')
        //             ->where('id','=',$i)
        //             ->first();
        //         $selectedExerciseList[] = $exercise;
        //     }
        // }

        if(count($selectedExerciseList) == 0)
        {
            return redirect()->back()->withErrors("Error");
        }
        else
        {
            // dd($patient);
            return view("Library/exercisepreview")->with('exercise',$selectedExerciseList)->with('patient',$patient)->with('flag',0)->with('currentDate',$datesum);
        }

        
    }

    public function oneview($id)
    {

        $exercise = DB::table('exercise')->where('id','=',$id)->get();
        $patient = DB::table('patient')->get();

        return view("Library/exercisepreview")->with('exercise',$exercise)->with('patient',$patient);
    }

    public function updateminusexercisepreview($id, Request $request)
    {
        $mydate = date('m/d/Y');
        $daystosum = '10';
        $datesum = date('m/d/Y', strtotime($mydate.' + '.$daystosum.' days'));

        $exercise = DB::table('exercise')
            ->where('id',$id)
            ->first();
        $repeatCount = $exercise->repeat;
        if($repeatCount > 1)
        {
            $repeatCount -= 1;
        }else
        {
            $repeatCount = 1;
        }

        DB::table('exercise')
            ->where('id', $id)
            ->update(['repeat' => $repeatCount]);
        $patient = DB::table('patient')->get();
        
        $selectedExerciseList = array();
        $exerciseArray = DB::table('exercise')->get();
        foreach($exerciseArray as $item){
            $temp = "check" . $item->id;
            if($request->get($temp) == "checked")
            {
                $exercise = DB::table('exercise')
                    ->where('id','=',$item->id)
                    ->first();
                
                $selectedExerciseList[] = $exercise;
            }
        }
        return view("Library/exercisepreview")->with('exercise',$selectedExerciseList)->with('patient',$patient)->with('flag',0)->with('currentDate',$datesum);
        // return redirect()->back()->withErrors("error")->with('flag', 0);
    }

    public function updateplusexercisepreview($id, Request $request)
    {
        $mydate = date('m/d/Y');
        $daystosum = '10';
        $datesum = date('m/d/Y', strtotime($mydate.' + '.$daystosum.' days'));

        $exercise = DB::table('exercise')
            ->where('id',$id)
            ->first();
        $repeatCount = $exercise->repeat;
        
        if($repeatCount > 150)
        {
            $repeatCount = 150;
        }else
        {
            $repeatCount += 1;
        }

        DB::table('exercise')
            ->where('id', $id)
            ->update(['repeat' => $repeatCount]);
            
        $patient = DB::table('patient')->get();
        
        $selectedExerciseList = array();
        $exerciseArray = DB::table('exercise')->get();
        foreach($exerciseArray as $item){
            $temp = "check" . $item->id;
            if($request->get($temp) == "checked")
            {
                $exercise = DB::table('exercise')
                    ->where('id','=',$item->id)
                    ->first();
                
                $selectedExerciseList[] = $exercise;
            }
        }
        return view("Library/exercisepreview")->with('exercise',$selectedExerciseList)->with('patient',$patient)->with('flag',0)->with('currentDate',$datesum);
    }

    public function showfavourite()
    {
        if(Auth::user()->privillege == 1 || Auth::user()->privillege == 3)
        {
            $exercise = DB::table('exercise')
                                    ->where('favourite','=',1)
                                    ->get();
            $patient = DB::table('patient')->get();

            return view("Library/MyFavourites/myfavourite")->with('exercise',$exercise)->with('patient',$patient);
        }
        else
        {
            $userexercise = DB::table('userexercise')
                            ->where('user','=',Auth::user()->name)
                            ->get();
            $selectedExerciseList = array();
            foreach($userexercise as $item)
            {
                $calculate_date = date('Y-m-d');
                $userExeItem[] = $item;
                if($calculate_date > $item->expire_date){
                     $expiredItem[] = $item;
                }
                else{
                    $result = DB::table('exercise')
                                ->where('title','=',$item->exercise)
                                ->first();
                    $selectedExerciseList[] = $result;
                    }
            }
            $patient = DB::table('patient')->get();

            return view("Library/MyFavourites/myfavourite")->with('exercise',$selectedExerciseList)->with('patient',$patient);
        }
    }

    public function shareoption(Request $request)
    {
        $mydate = date('m/d/Y');
        $daystosum = '10';
        $datesum = date('m/d/Y', strtotime($mydate.' + '.$daystosum.' days'));

        // dd($request->repeat);
        $patient = DB::table('patient')->get();
        // dd(Auth::user()->name);
        
        $selectedExerciseList = array();
        $exerciseArray = DB::table('exercise')->get();
        foreach($exerciseArray as $item){
            $temp = "check" . $item->id;
            if($request->get($temp) == "checked")
            {
                $exercise = DB::table('exercise')
                    ->where('id','=',$item->id)
                    ->first();
                
                $selectedExerciseList[] = $exercise;
            }
        }
        
        if(count($selectedExerciseList) > 0)
        {
            for($i = 0; $i < count($selectedExerciseList); $i ++)
            {
                $userexercise = DB::table('userexercise')
                    ->where('user','=',$request->bpatient)
                    ->where('exercise','=',$selectedExerciseList[$i]->title)
                    ->count();
                
                $calculate_date = date('Y-m-d');
                $resultdate = date('Y-m-d', strtotime($calculate_date. ' + 10 days'));
                $bdate = date('Y-m-d', strtotime($request->bdate));
                $todaydate = date('Y-m-d', strtotime($calculate_date));
                $namefield = Auth::user()->name;
                // dd($bdate);
                if($userexercise > 0)
                {
                    if($request->bdate == "")
                    {
                        // dd($userexercise);
                        $query = DB::table('userexercise')
                        ->where('user','=' ,$request->bpatient)
                        ->where('exercise','=',$selectedExerciseList[$i]->title);

                        $update = $query
                        ->update(['expire_date' => $resultdate,'adminname' => $namefield,'given_date' => $todaydate,'exerciserepeat' => $request->repeat]);
                    }else{
                        // dd($userexercise);
                        $query = DB::table('userexercise')
                        ->where('user','=' ,$request->bpatient)
                        ->where('exercise','=',$selectedExerciseList[$i]->title);
                        
                        $update = $query
                        ->update(['expire_date' => $bdate,'adminname' => $namefield,'given_date' => $todaydate,'exerciserepeat' => $request->repeat]);
                        
                        // ->update(['expire_date' => $request->bdate])
                        // ->update(['adminname' => $namefield])
                        // ->update(['given_date' => $todaydate]);
                        // ->update(['exerciserepeat' => $request->repeat]);
                    }

                    
                }
                else
                {
                    if($request->bdate == "")
                    {
                        DB::insert('insert into userexercise (user,exercise,expire_date, adminname, given_date, exerciserepeat) values (?,?,?,?,?,?)', 
                                    [$request->bpatient,$selectedExerciseList[$i]->title,$resultdate,Auth::user()->name, $todaydate, $request->repeat]);
                    }else{
                        DB::insert('insert into userexercise (user,exercise,expire_date,adminname, given_date, exerciserepeat) values (?,?,?,?,?,?)', 
                            [$request->bpatient,$selectedExerciseList[$i]->title,$bdate,Auth::user()->name, $todaydate, $request->repeat]);
                    }
                    
                }
            }
            Config::set('constant.patientname', $request->bpatient);

            $patientresult = DB::table('patient')
                ->where('patientname',$request->bpatient)
                ->first();
            
            $emailfield = $patientresult->patientemail;
            // dd($emailfield);
            
            Mail::send('Templates/patientexerciseverify', ['email' => $emailfield], function ($m) use ($emailfield) {
                $m->from('hospital@gmail.com', 'Patient Exercise');
                
                $m->to($emailfield, 'Adam Vital')->subject('Patient Exercise');
            });


        }
        $tempexe = DB::table('exercise')->get();
        foreach($tempexe as $item){
            DB::table('exercise')->where('id', $item->id)->update(['repeat' => 1]);
        }
        $selectedExerciseTempList = array();
        foreach($tempexe as $item){
            $temp = "check" . $item->id;
            if($request->get($temp) == "checked")
            {
                $exercise = DB::table('exercise')
                    ->where('id','=',$item->id)
                    ->first();
                
                $selectedExerciseTempList[] = $exercise;
            }
        }
        return view("Library/exercisepreview")->with('exercise',$selectedExerciseTempList)->with('patient',$patient)->with('flag',1)->with('currentDate',$datesum);
    }
}
