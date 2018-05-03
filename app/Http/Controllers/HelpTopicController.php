<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Auth;
class HelpTopicController extends Controller
{
    //
    public function index()
    {
        if(Auth::user()->privillege == 1 || Auth::user()->privillege == 3){
            $topic = DB::table('topic')->get();
        }
        else
        {
            $topic = DB::table('topic')
                ->where('topicaccess', 1)
                ->get();
        }
        
        return view('HelpSupport/HelpTopic/helptopic',['topic' => $topic]);
    }

    public function add()
    {
        // $titlefield = $request->titlefield;
        return view('HelpSupport/HelpTopic/helpadd');
    }

    public function addaction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'topictitle' => 'required|max:255',
            // 'content' => 'required|max:400',
        ]);

        if ( $validator->fails()) {
            return redirect('helpadd')->withErrors($validator->errors());
        }else{
            if(DB::table('topic')->where('topictitle', '=', $request->topictitle)->count() == 0)
            {
                if($request->topicaccess =='on'){
                    DB::insert('insert into topic (topictitle,topicaccess,content) values (?,?,?)', [$request->topictitle,1,$request->content]);
                }
               else
               {
                    DB::insert('insert into topic (topictitle,topicaccess,content) values (?,?,?)', [$request->topictitle,0,$request->content]);
                }
                if(Auth::user()->privillege == 1 || Auth::user()->privillege == 3){
                    $topic = DB::table('topic')->get();
                }
                else
                {
                    $topic = DB::table('topic')
                        ->where('topicaccess', 1)
                        ->get();
                }
                return redirect('helptopic')->with('topic',$topic);
            }else
            {
                return redirect('helpadd')->withErrors($validator->errors());
            }
        }
    }

    public function edit($id)
    {
        $topic = DB::table('topic')->where('id', '=', $id)->first();
        return view('HelpSupport/HelpTopic/helpedit')->with('topic',$topic);
    }

    public function view($id)
    {
        $topic = DB::table('topic')->where('id', '=', $id)->first();
        return view('HelpSupport/HelpTopic/helpview')->with('topic',$topic);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'topictitle' => 'required|max:255',
            'content' => 'required|max:255',
        ]);
       
        if ( $validator->fails()) {
            
            return redirect()->back()->withErrors($validator->errors());
            
        }else{
           
            // if(DB::table('topic')->where('topictitle', '=', $request->topictitle)->count() == 0){
                if($request->topicaccess == 'on'){
                    DB::table('topic')
                    ->where('topictitle', $request->previous)
                    ->update(['topictitle' => $request->topictitle,'topicaccess' => 1,'content' => $request->content]);
                }
                else{
                    DB::table('topic')
                    ->where('topictitle', $request->previous)
                    ->update(['topictitle' => $request->topictitle,'topicaccess' => 0,'content' => $request->content]);
                }
                // dd($request->id);
                if(Auth::user()->privillege == 1 || Auth::user()->privillege == 3){
                    $topic = DB::table('topic')->get();
                }
                else
                {
                    $topic = DB::table('topic')
                    ->where('topicaccess', 1)
                    ->get();
                }
               
                
                return redirect('helptopic')->with('topic',$topic);
            // }else{
               
            //     return redirect()->back()->withErrors($validator->errors());
            // }
        }
    }

    public function delete($id)
    {
        $topic = DB::table('topic')
            ->where('id', $id)
            ->delete();
        if(Auth::user()->privillege == 1 || Auth::user()->privillege == 3){
            $topic = DB::table('topic')->get();
        }
        else
        {
            $topic = DB::table('topic')
                    ->where('topicaccess', 1)
                    ->get();
        }
        return redirect('helptopic')->with('topic',$topic);
    }

}
