<?php

namespace App\Http\Controllers;

use App\Models\ServiceRequestModel;
use Illuminate\Http\Request;

class ServiceRequestController extends Controller
{
    function Page(){
        return view('pages.ServiceRequestPage', ['activePage'=> 'serviceRequest', 'activeMenu' => 'serviceManagement']);
    }

    //get data
    function Read(){
        return ServiceRequestModel::get();
    }

    //get single data
    function ReadSingle(Request $request)
    {
        $id = $request->id;
        $get = ServiceRequestModel::where('id', '=', $id)->get();
        return $get[0];
    }
    function UpdateStatus(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        return  ServiceRequestModel::where('id',$id)->update(['status'=> $status]);
    }

    //delete data
    function Delete(Request $request){
        $id = $request->id;
        return ServiceRequestModel::where('id','=',$id)->delete();
    }
}
