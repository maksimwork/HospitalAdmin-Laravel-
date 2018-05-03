<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class ManageCategoryController extends Controller
{
    //
    public function index()
    {
        $category = DB::table('category')->get();
        
        return view('Library/ManageCategories/managecategory',['category' => $category]);
    }

    public function add()
    {
        // $titlefield = $request->titlefield;
        return view('Library/ManageCategories/categoryadd');
    }

    public function addaction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titlefield' => 'required|max:255',
        ]);

        if ( $validator->fails()) {
            return redirect('categoryadd')->withErrors($validator->errors());
        }else{
            if(DB::table('category')->where('categorytitle', '=', $request->titlefield)->count() == 0)
            {
                DB::insert('insert into category (categorytitle) values (?)', [$request->titlefield]);
                $category = DB::table('category')->get();
                return redirect('managecategory')->with('category',$category);
            }else
            {
                echo "<script>
                    alert('Category Title already Exist');
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
            if(DB::table('category')->where('categorytitle', '=', $request->titlefield)->count() == 0)
            {
                DB::insert('insert into category (categorytitle) values (?)', [$request->titlefield]);
                $category = DB::table('category')->get();
                return redirect('exerciseadd')->with('category',$category);
            }else
            {
                echo "<script>
                    alert('Category Title already Exist');
                    window.history.back();
                    </script>";
            }
        }
    }

    public function edit($id)
    {
        $category = DB::table('category')->where('id', '=', $id)->first();
        return view('Library/ManageCategories/categoryedit')->with('category',$category);
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
            // if(DB::table('category')->where('categorytitle', '=', $request->typetitle)->count() == 0){
                $category = DB::table('category')
                    ->where('categorytitle', $request->previous)
                    ->update(['categorytitle' => $request->typetitle]);
                $category = DB::table('category')->get();
                return redirect('managecategory')->with('category',$category);
            // }else{
            
            //     return redirect()->back()->withErrors($validator->errors());
            // }
        }
    }

    public function delete($id)
    {
        $category = DB::table('category')
            ->where('id', $id)
            ->delete();
        $category = DB::table('category')->get();
        return redirect('managecategory')->with('category',$category);
    }
}
