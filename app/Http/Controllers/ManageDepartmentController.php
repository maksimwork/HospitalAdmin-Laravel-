<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ManageDepartmentController extends Controller
{
    //
    public function index()
    {
        $department = DB::table('department')->get();
        
        return view('Training/ManageDepartment/managedepartment',['department' => $department]);
    }
    public function add()
    {
        // $titlefield = $request->titlefield;
        return view('Training/ManageDepartment/departmentadd');
    }

    public function addaction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titlefield' => 'required|max:255',
        ]);

        if ( $validator->fails()) {
            return redirect('departmentadd')->withErrors($validator->errors());
        }else{
            if(DB::table('department')->where('departmenttitle', '=', $request->titlefield)->count() == 0)
            {
                DB::insert('insert into department (departmenttitle) values (?)', [$request->titlefield]);
                $department = DB::table('department')->get();
                return redirect('managedepartment')->with('department',$department);
            }else
            {
                return redirect('departmentadd')->withErrors($validator->errors());
            }
        }
    }

    public function edit($id)
    {
        $department = DB::table('department')->where('id', '=', $id)->first();
        return view('Training/ManageDepartment/departmentedit')->with('department',$department);
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
            // if(DB::table('department')->where('departmenttitle', '=', $request->typetitle)->count() == 0)
            // {
                DB::table('department')
                    ->where('departmenttitle', $request->previous)
                    ->update(['departmenttitle' => $request->typetitle]);
                $department = DB::table('department')->get();
                return redirect('managedepartment')->with('department',$department);
            // }else{
            //     return redirect()->back()->withErrors($validator->errors());
            // }
        }
    }

    public function delete($id)
    {
        $department = DB::table('department')
            ->where('id', $id)
            ->delete();
        $department = DB::table('department')->get();
        return redirect('managedepartment')->with('department',$department);
    }
}
