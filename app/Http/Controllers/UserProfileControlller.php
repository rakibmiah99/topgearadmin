<?php

namespace App\Http\Controllers;

use App\Models\UserProfileModel;
use Illuminate\Http\Request;

class UserProfileControlller extends Controller
{
    function Page(){
        return view('pages.UserProfilePage',['activePage' => 'userProfile','activeMenu' => 'userManagement']);
    }

    //get data
    function Read(){
        return UserProfileModel::get();
    }
    //get single data
    function ReadSingle(Request $request)
    {
        $id = $request->id;
        $get = UserProfileModel::where('id', '=', $id)->get();
        return $get[0];
    }
}
