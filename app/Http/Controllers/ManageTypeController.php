<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class ManageTypeController extends Controller
{

    public function index()
    {
        $type = DB::table('type')->get();
        
        return view('Library/ManageType/managetype',['type' => $type]);
    }

    public function add()
    {
        // $titlefield = $request->titlefield;
        return view('Library/ManageType/typeadd');
    }

    public function addaction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titlefield' => 'required|max:255',
        ]);

        if ( $validator->fails()) {
            return redirect('typeadd')->withErrors($validator->errors());
        }else{
            if(DB::table('type')->where('typetitle', '=', $request->titlefield)->count() == 0)
            {
                DB::insert('insert into type (typetitle) values (?)', [$request->titlefield]);
                $type = DB::table('type')->get();
                return redirect('managetype')->with('type',$type);
            }else
            {
                echo "<script>
                    alert(' Type Title already Exist');
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
            if(DB::table('type')->where('typetitle', '=', $request->titlefield)->count() == 0)
            {
                DB::insert('insert into type (typetitle) values (?)', [$request->titlefield]);
                $type = DB::table('type')->get();
                return redirect('exerciseadd')->with('type',$type);
            }else
            {
                echo "<script>
                    alert(' Type Title already Exist');
                    window.history.back();
                    </script>";
            }
        }
    }

    public function edit($id)
    {
        $type = DB::table('type')->where('id', '=', $id)->first();
        return view('Library/ManageType/typeedit')->with('type',$type);
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
            // if(DB::table('type')->where('typetitle', '=', $request->typetitle)->count() == 0){
                DB::table('type')
                    ->where('typetitle', $request->previous)
                    ->update(['typetitle' => $request->typetitle]);
                $type = DB::table('type')->get();
                return redirect('managetype')->with('type',$type);
            // }else{
            //     return redirect()->back()->withErrors($validator->errors());
            // }
        }
    }

    public function delete($id)
    {
        $type = DB::table('type')
            ->where('id', $id)
            ->delete();
        $type = DB::table('type')->get();
        return redirect('managetype')->with('type',$type);
    }
}
