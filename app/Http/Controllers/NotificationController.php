<?php

namespace App\Http\Controllers;

use App\Models\NotificationModel;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    function Page(){
        return view('pages.NotificationPage',['activeMenu'=> 'performance','activePage' => 'notification']);
    }

    //get data
    function Read(){
        return NotificationModel::get();
    }


    //insert data
    function Insert(Request $request){
        date_default_timezone_set("Asia/Dhaka");
        $notificationTime= date("h:i:sa");
        $notificationDate= date("d-m-Y");
        $subject = $request->subject;
        $msg = $request->msg;
        return NotificationModel::insert([
            'subject' => $subject,
            'msg' => $msg,
            'notification_time' => $notificationTime,
            'notification_date' => $notificationDate,
        ]);
    }


    //delete data
    function Delete(Request $request){
        $id = $request->id;
        return NotificationModel::where('id','=',$id)->delete();
    }
}
