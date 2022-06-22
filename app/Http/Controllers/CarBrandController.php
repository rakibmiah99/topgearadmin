<?php

namespace App\Http\Controllers;

use App\Models\CarBrandModel;
use Illuminate\Http\Request;

class CarBrandController extends Controller
{
    function Page(){
        return view('pages.CarBrandPage', ['activePage' => 'carBrand','activeMenu' => 'productManagement']);
    }

    //get data
    function Read(){
        return CarBrandModel::get();
    }

    //get single data
    function ReadSingle(Request $request){
        $id = $request->id;
        $getSingleData = CarBrandModel::where('id','=',$id)->get();
        return $getSingleData[0];
    }


    //insert data
    function Insert(Request $request){
        $carBrandName = $request->carBrandName;
        $carBrandId = $request->carBrandId;

        return CarBrandModel::insert([
            'car_brand' => $carBrandName,
            'car_brand_id' => $carBrandId
        ]);
    }

    //update data
    function Update(Request $request){
        $id = $request->id;
        $carBrandName = $request->carBrandName;
        $carBrandId = $request->carBrandId;

        return CarBrandModel::where('id','=',$id)->update([
            'car_brand' => $carBrandName,
            'car_brand_id' => $carBrandId
        ]);
    }


    //delete data
    function Delete(Request $request){
        $id = $request->id;
        return CarBrandModel::where('id','=',$id)->delete();
    }
}
