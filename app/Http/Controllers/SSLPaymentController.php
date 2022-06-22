<?php

namespace App\Http\Controllers;

use App\Models\SSLPaymentModel;
use Illuminate\Http\Request;

class SSLPaymentController extends Controller
{
    function Page(){
        return view('pages.SSLPaymentPage',['activePage' => 'sslPayment','activeMenu' => 'paymentManagement']);
    }

    //get data
    function Read(){
        return SSLPaymentModel::get();
    }
    //get single data
    function ReadSingle(Request $request)
    {
        $id = $request->id;
        $get = SSLPaymentModel::where('id', '=', $id)->get();
        return $get[0];
    }
}
