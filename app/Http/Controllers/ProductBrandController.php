<?php

namespace App\Http\Controllers;

use App\Models\ProductCategoriesModel;
use App\Models\ProductBrandModel;
use Illuminate\Http\Request;

class ProductBrandController extends Controller
{


    function Page(){
        return view('pages.ProductBrandPage', ['activePage' => 'productBrand','activeMenu' => 'productManagement']);
    }

    //get data
    function Read(){
        return ProductBrandModel::get();
    }

    //get single data
    function ReadSingle(Request $request){
        $id = $request->id;
        $getSingleData = ProductBrandModel::where('id','=',$id)->get();
        return $getSingleData[0];
    }


    //insert data
    function Insert(Request $request){
        $brandName = $request->brandName;

        return ProductBrandModel::insert([
            'brand_name' => $brandName,
        ]);
    }

    //update data
    function Update(Request $request){
        $id = $request->id;
        $brandName = $request->brandName;

        return ProductBrandModel::where('id','=',$id)->update([
            'brand_name' => $brandName
        ]);
    }


    //delete data
    function Delete(Request $request){
        $id = $request->id;
        return ProductBrandModel::where('id','=',$id)->delete();
    }
}
