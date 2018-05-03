<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class ManageAreaController extends Controller
{
    //
    public function index()
    {
        $area = DB::table('area')->get();
        
        return view('Library/ManageArea/managearea',['area' => $area]);
    }

    public function add()
    {
        // $titlefield = $request->titlefield;
        return view('Library/ManageArea/areaadd');
    }

    public function addaction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titlefield' => 'required|max:255',
        ]);

        if ( $validator->fails()) {
            return redirect('areaadd')->withErrors($validator->errors());
        }else{
            if(DB::table('area')->where('areatitle', '=', $request->titlefield)->count() == 0)
            {
                DB::insert('insert into area (areatitle) values (?)', [$request->titlefield]);
                $area = DB::table('area')->get();
                return redirect('managearea')->with('area',$area);
            }else
            {
                echo "<script>
                alert('Area Title already Exist');
                window.history.back();
                </script>";
            }
        }
    }
    public function addaction1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titlefield' => 'required|max:255',
        ]);

        if ( $validator->fails()) {
            return redirect('exerciseadd')->withErrors($validator->errors());
        }else{
            if(DB::table('area')->where('areatitle', '=', $request->titlefield)->count() == 0)
            {
                DB::insert('insert into area (areatitle) values (?)', [$request->titlefield]);
                $area = DB::table('area')->get();
                return redirect('exerciseadd')->with('area',$area);
            }else
            {
                echo "<script>
                    alert('Area Title already Exist');
                    window.history.back();
                    </script>";
            }
        }
    }

    public function edit($id)
    {
        $area = DB::table('area')->where('id', '=', $id)->first();
        return view('Library/ManageArea/areaedit')->with('area',$area);
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
            // if(DB::table('area')->where('areatitle', '=', $request->typetitle)->count() == 0){
                $area = DB::table('area')
                    ->where('areatitle', $request->previous)
                    ->update(['areatitle' => $request->typetitle]);
                $area = DB::table('area')->get();
                return redirect('managearea')->with('area',$area);
            // }else{
            
            //     return redirect()->back()->withErrors($validator->errors());
            // }
        }
    }

    public function delete($id)
    {
        $area = DB::table('area')
            ->where('id', $id)
            ->delete();
        $area = DB::table('area')->get();
        return redirect('managearea')->with('area',$area);
    }
}
