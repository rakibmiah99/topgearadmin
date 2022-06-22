<?php

namespace App\Http\Controllers;

use App\Models\OTPModel;
use App\Models\ServiceRequestModel;
use Illuminate\Http\Request;

class OTPController extends Controller
{
    function Page(){
        return view('pages.OTPPage',['activePage' => 'otp','activeMenu' => 'userManagement']);
    }

    //get data
    function Read(){
        return OTPModel::get();
    }

}
