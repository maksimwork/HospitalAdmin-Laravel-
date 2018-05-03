<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;


class RoleController extends Controller
{
    public function index()
    {
        $roletype = DB::table('role')->get();
        
        return view('SystemManagement/role',['roletype' => $roletype]);
    }
    public function add()
    {
        // $titlefield = $request->titlefield;
        return view('SystemManagement/roleadd');
    }

    public function addaction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titlefield' => 'required|max:255',
        ]);

        if ( $validator->fails()) {
            return redirect('roleadd')->withErrors($validator->errors());
        }else{
            if(DB::table('role')->where('roletype', '=', $request->titlefield)->count() == 0)
            {
                // DB::insertGetId('insert into role (roletype) values (?)', [$request->titlefield]);
                $index = DB::table('role')->insertGetId(
                    ['roletype' => $request->titlefield]
                );
                
                $roletype = DB::table('role')->get();

                for($i = 1; $i < 8; $i ++)
                {
                    DB::table('permission')->insert([
                        'roletype' => $index,
                        'module' => $i,
                        'view' => 0,
                        'add' => 0,
                        'edit' => 0,
                        'delete' => 0,
                        'share' => 0,
                    ]);
                }

                return redirect('role')->with('roletype',$roletype);
            }else
            {
                return redirect('roleadd')->withErrors($validator->errors());
            }
        }
    }

    public function edit($id)
    {
        $roletype = DB::table('role')->where('id', '=', $id)->first();
        return view('SystemManagement/roleedit')->with('roletype',$roletype);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'previous' => 'required|max:255',
            'typetitle' => 'required|max:255',
        ]);


        if ( $validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }else{
            // if(DB::table('role')->where('roletype', '=', $request->typetitle)->count() == 0)
            // {
                DB::table('role')
                    ->where('roletype', $request->previous)
                    ->update(['roletype' => $request->typetitle]);
                $roletype = DB::table('role')->get();
                return redirect('role')->with('roletype',$roletype);
            // }else{
            //     return redirect()->back()->withErrors($validator->errors());
            // }
        }
    }

    public function manage($id)
    {
        $library = DB::table('permission')
            ->where('roletype', $id)
            ->where('module','1')
            ->first();

        $patients = DB::table('permission')
            ->where('roletype', $id)
            ->where('module','2')
            ->first();
        
        $physio = DB::table('permission')
            ->where('roletype', $id)
            ->where('module','3')
            ->first(); 
        
        $training = DB::table('permission')
            ->where('roletype', $id)
            ->where('module','4')
            ->first(); 
        
        $help = DB::table('permission')
            ->where('roletype', $id)
            ->where('module','5')
            ->first(); 
        
        $feedback = DB::table('permission')
            ->where('roletype', $id)
            ->where('module','6')
            ->first(); 
        
        $system = DB::table('permission')
            ->where('roletype', $id)
            ->where('module','7')
            ->first(); 
        
        return view('SystemManagement/roleproperty')->with('library', $library)->with('patients', $patients)->with('physio', $physio)->
                                                with('training', $training)->with('help', $help)->with('feedback', $feedback)->with('system', $system)->with('roletype',$id);

    }

    public function delete($id)
    {
        $roletype = DB::table('role')
            ->where('id', $id)
            ->delete();
        DB::table('permission')->where('roletype',$id)->delete();
        $roletype = DB::table('role')->get();
        return redirect('role')->with('roletype',$roletype);
    }

    public function updateView($priv,$id)
    {

        $temp = DB::table('permission')
            ->where('roletype', $priv)
            ->where('module', $id)
            ->first();
        
        if($temp->view == 0)
        {
            DB::table('permission')
                    ->where('roletype', $priv)
                    ->where('module', $id)
                    ->update(['view' => 1]);
        }else if($temp->view == 1)
        {
            DB::table('permission')
                ->where('roletype', $priv)
                ->where('module', $id)
                ->update(['view' => 0]);
        }
        return redirect()->back()->withErrors("");

    }

    public function updateAdd($priv,$id)
    {
        $temp = DB::table('permission')
            ->where('roletype', $priv)
            ->where('module', $id)
            ->first();
        
        if($temp->add == 0)
        {
            DB::table('permission')
                    ->where('roletype', $priv)
                    ->where('module', $id)
                    ->update(['add' => 1]);
        }else if($temp->add == 1)
        {
            DB::table('permission')
                ->where('roletype', $priv)
                ->where('module', $id)
                ->update(['add' => 0]);
        }
        return redirect()->back()->withErrors("");

    }

    public function updateEdit($priv,$id)
    {
        $temp = DB::table('permission')
            ->where('roletype', $priv)
            ->where('module', $id)
            ->first();
        
        if($temp->edit == 0)
        {
            DB::table('permission')
                    ->where('roletype', $priv)
                    ->where('module', $id)
                    ->update(['edit' => 1]);
        }else if($temp->edit == 1)
        {
            DB::table('permission')
                ->where('roletype', $priv)
                ->where('module', $id)
                ->update(['edit' => 0]);
        }
        return redirect()->back()->withErrors("");

    }

    public function updateDelete($priv,$id)
    {
        $temp = DB::table('permission')
            ->where('roletype', $priv)
            ->where('module', $id)
            ->first();
        
        if($temp->delete == 0)
        {
            DB::table('permission')
                    ->where('roletype', $priv)
                    ->where('module', $id)
                    ->update(['delete' => 1]);
        }else if($temp->delete == 1)
        {
            DB::table('permission')
                ->where('roletype', $priv)
                ->where('module', $id)
                ->update(['delete' => 0]);
        }
        return redirect()->back()->withErrors("");

    }

    public function updateShare($priv,$id)
    {
        $temp = DB::table('permission')
            ->where('roletype', $priv)
            ->where('module', $id)
            ->first();
        
        if($temp->share == 0)
        {
            DB::table('permission')
                    ->where('roletype', $priv)
                    ->where('module', $id)
                    ->update(['share' => 1]);
        }else if($temp->share == 1)
        {
            DB::table('permission')
                ->where('roletype', $priv)
                ->where('module', $id)
                ->update(['share' => 0]);
        }
        return redirect()->back()->withErrors("");

    }
}
