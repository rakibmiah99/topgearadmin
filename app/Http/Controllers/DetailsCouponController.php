<?php

namespace App\Http\Controllers;

use App\Models\DetailsCouponModel;
use Illuminate\Http\Request;

class DetailsCouponController extends Controller
{
    function Page(){
        return view('pages.DetailsCouponPage', ['activePage' => 'detailsCoupon', 'activeMenu' => 'couponManagement']);
    }

    //get data
    function Read(){
        return DetailsCouponModel::get();
    }

    //get single data
    function ReadSingle(Request $request){
        $id = $request->id;
        $getSingleData = DetailsCouponModel::where('id','=',$id)->get();
        return $getSingleData[0];
    }


    //insert data
    function Insert(Request $request){
        $couponId = $request->couponId;
        $couponName = $request->couponName;
        $couponUnit = $request->couponUnit;
        $couponValue = $request->couponValue;

        return DetailsCouponModel::insert([
            'coupon_id' => $couponId,
            'coupon_name' => $couponName,
            'coupon_unit' => $couponUnit,
            'coupon_value' => $couponValue,
        ]);
    }

    //update data
    function Update(Request $request){
        $id = $request->id;
        $couponId = $request->couponId;
        $couponName = $request->couponName;
        $couponUnit = $request->couponUnit;
        $couponValue = $request->couponValue;

        return DetailsCouponModel::where('id','=',$id)->update([
            'coupon_id' => $couponId,
            'coupon_name' => $couponName,
            'coupon_unit' => $couponUnit,
            'coupon_value' => $couponValue,
        ]);
    }


    //delete data
    function Delete(Request $request){
        $id = $request->id;
        return DetailsCouponModel::where('id','=',$id)->delete();
    }
}
