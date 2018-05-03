<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class ManageSubTypeController extends Controller
{
    public function index()
    {
        $subtype = DB::table('subtype')->get();
        
        return view('Library/ManageSubType/managesubtype',['subtype' => $subtype]);
    }

    public function add()
    {
        // $titlefield = $request->titlefield;
        return view('Library/ManageSubType/subtypeadd');
    }

    public function addaction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titlefield' => 'required|max:255',
        ]);

        if ( $validator->fails()) {
            return redirect('subtypeadd')->withErrors($validator->errors());
        }else{
            if(DB::table('subtype')->where('subtypetitle', '=', $request->titlefield)->count() == 0)
            {
                DB::insert('insert into subtype (subtypetitle) values (?)', [$request->titlefield]);
                $subtype = DB::table('subtype')->get();
                return redirect('managesubtype')->with('subtype',$subtype);
            }else
            {
                echo "<script>
                    alert(' Sub Type Title already Exist');
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
            if(DB::table('subtype')->where('subtypetitle', '=', $request->titlefield)->count() == 0)
            {
                DB::insert('insert into subtype (subtypetitle) values (?)', [$request->titlefield]);
                $subtype = DB::table('subtype')->get();
                return redirect('exerciseadd')->with('subtype',$subtype);
            }else
            {
                echo "<script>
                    alert(' Sub Type Title already Exist');
                    window.history.back();
                    </script>";
            }
        }
    }

    public function edit($id)
    {
        $subtype = DB::table('subtype')->where('id', '=', $id)->first();
        return view('Library/ManageSubType/subtypeedit')->with('subtype',$subtype);
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
            // if(DB::table('subtype')->where('subtypetitle', '=', $request->typetitle)->count() == 0){
                $subtype = DB::table('subtype')
                    ->where('subtypetitle', $request->previous)
                    ->update(['subtypetitle' => $request->typetitle]);
                $subtype = DB::table('subtype')->get();
                return redirect('managesubtype')->with('subtype',$subtype);
            // }else{
                // return redirect()->back()->withErrors($validator->errors());
            // }
        }
    }

    public function delete($id)
    {
        $subtype = DB::table('subtype')
            ->where('id', $id)
            ->delete();
        $subtype = DB::table('subtype')->get();
        return redirect('managesubtype')->with('subtype',$subtype);
    }

}
