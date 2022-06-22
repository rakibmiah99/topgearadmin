<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;

class AdminController extends Controller
{

    public function GetPage(){
        return view('pages.LoginPage');
    }

    public function CheckAdmin(Request $request){
        $userName = $request->username;
        $password = $request->password;
        $haveAdmin = AdminModel::where('username','=',$userName)->where('password','=',$password)->get();
        if(count($haveAdmin) > 0){
            $haveAdmin = $haveAdmin[0];
            if($haveAdmin->username === $userName && $haveAdmin->password === $password){
                $request->session()->push('topgear_admin_login','true');
                $request->session()->push('topgear_admin_username', $userName);
                return response(200);
            }else{
                return response('',301);
            }
        }else{
            return response('',500);
        }
    }

    public function LogoutAdmin(Request $request){
        try{
            $request->session()->flash('topgear_admin_login');
            $request->session()->flash('topgear_admin_username');
            return response('',200);
        }catch (\Exception $e){
            return $e;
        }
    }
}
