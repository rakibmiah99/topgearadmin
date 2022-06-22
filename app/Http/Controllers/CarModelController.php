<?php

namespace App\Http\Controllers;

use App\Models\CarModelModel;
use Illuminate\Http\Request;

class CarModelController extends Controller
{
    function Page(){
        return view('pages.CarModelPage',['activePage' => 'carModel','activeMenu' => 'productManagement']);
    }

    //get data
    function Read(){
        return CarModelModel::get();
    }

    //get single data
    function ReadSingle(Request $request){
        $id = $request->id;
        $getSingleData = CarModelModel::where('id','=',$id)->get();
        return $getSingleData[0];
    }


    //insert data
    function Insert(Request $request){
        $modelName = $request->modelName;
        $modelId = $request->modelId;

        return CarModelModel::insert([
            'car_model' => $modelName,
            'model_id' => $modelId
        ]);
    }

    //update data
    function Update(Request $request){
        $id = $request->id;
        $modelName = $request->modelName;
        $modelId = $request->modelId;

        return CarModelModel::where('id','=',$id)->update([
            'car_model' => $modelName,
            'model_id' => $modelId
        ]);
    }


    //delete data
    function Delete(Request $request){
        $id = $request->id;
        return CarModelModel::where('id','=',$id)->delete();
    }
}
