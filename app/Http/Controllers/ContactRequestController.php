<?php

namespace App\Http\Controllers;

use App\Models\ContactRequestModel;
use Illuminate\Http\Request;

class ContactRequestController extends Controller
{
    function Page(){
        return view('pages.ContactRequestPage', ['activePage' => 'contactRequest','activeMenu' => 'userManagement']);
    }

    //get data
    function Read(){
        return ContactRequestModel::get();
    }

    //delete data
    function Delete(Request $request){
        $id = $request->id;
        return ContactRequestModel::where('id','=',$id)->delete();
    }
}
