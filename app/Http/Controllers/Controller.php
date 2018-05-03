<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use DB;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $user;
    private $permission_result;

    public function __construct()
    {
        // if(Auth::check())
        // {
            $this->middleware('auth');
            
            $this->middleware(function ($request, $next) {
                $this->user = Auth::user();
                
                $this->permission_result = DB::table('permission')
                    ->where('roletype',$this->user->privillege)
                    ->get();
                
                view()->share('permission_result', $this->permission_result);
                return $next($request);
            });

        // }
            
    }
}
