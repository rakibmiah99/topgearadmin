<?php

namespace App\Http\Controllers;

use App\Models\SettingsModel;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    function Page(){
        return view('pages.SettingsPage', ['activePage' => 'settings','activeMenu' => 'settings']);
    }

    //get data
    function Read(){
        return SettingsModel::get();
    }

    //get single data
    function ReadSingle(Request $request){
        $id = $request->id;
        $getSingleData = SettingsModel::where('id','=',$id)->get();
        return $getSingleData[0];
    }

    //insert data
    function Insert(Request $request){
        $sslApiToken = $request->sslApiToken;
        $sslSmsId = $request->sslSmsId;
        $sslDomain = $request->sslDomain;

        return SettingsModel::insert([
            'ssl_wireless_sms_api_token' => $sslApiToken,
            'ssl_wireless_sms_sid' => $sslSmsId,
            'ssl_wireless_sms_domain' => $sslDomain
        ]);
    }

    //update data
    function Update(Request $request){
        $id = $request->id;
        $sslApiToken = $request->sslApiToken;
        $sslSmsId = $request->sslSmsId;
        $sslDomain = $request->sslDomain;

        return SettingsModel::where('id','=',$id)->update([
            'ssl_wireless_sms_api_token' => $sslApiToken,
            'ssl_wireless_sms_sid' => $sslSmsId,
            'ssl_wireless_sms_domain' => $sslDomain
        ]);
    }


    //delete data
    function Delete(Request $request){
        $id = $request->id;
        return SettingsModel::where('id','=',$id)->delete();
    }
}
