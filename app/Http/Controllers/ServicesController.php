<?php

namespace App\Http\Controllers;

use App\Models\ServicesModel;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    function Page(){
        return view('pages.ServicesPage',['activePage'=> 'serviceList', 'activeMenu' => 'serviceManagement']);
    }

    function Insert(Request $request){
        $serviceName = $request->serviceName;
        $priceRange = $request->priceRange;
        $ratting = $request->ratting;
        $discountStatus = $request->discountStatus;
        $discountPercentage = $request->discountPercentage;
        $image = $request->image;
        $shortDes = $request->shortDes;
        $longDes = $request->longDes;

        return ServicesModel::insert([
            'service_name' => $serviceName,
            'short_des' => $shortDes,
            'long_des' => $longDes,
            'price_range' => $priceRange,
            'image' => $image,
            'rating' => $ratting,
            'discount_status' => $discountStatus,
            'discount_percentage' => $discountPercentage
        ]);

    }

    function Read(){
        return ServicesModel::get();

    }

    //get single data
    function ReadSingle(Request $request)
    {
        $id = $request->id;
        $get = ServicesModel::where('id', '=', $id)->get();
        return $get[0];
    }

    function Update(Request $request){
        $id = $request->id;
        $serviceName = $request->serviceName;
        $priceRange = $request->priceRange;
        $ratting = $request->ratting;
        $discountStatus = $request->discountStatus;
        $discountPercentage = $request->discountPercentage;
        $image = $request->image;
        $shortDes = $request->shortDes;
        $longDes = $request->longDes;

        return ServicesModel::where('id','=',$id)->update([
            'service_name' => $serviceName,
            'short_des' => $shortDes,
            'long_des' => $longDes,
            'price_range' => $priceRange,
            'image' => $image,
            'rating' => $ratting,
            'discount_status' => $discountStatus,
            'discount_percentage' => $discountPercentage
        ]);

    }


    function Delete(Request $request){
        $id = $request->id;
        return ServicesModel::where('id','=',$id)->delete();

    }
}
