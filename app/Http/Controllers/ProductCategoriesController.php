<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategoriesModel;

class ProductCategoriesController extends Controller
{
    function Page(){
        return view('pages.ProductCategoriesPage', ['activePage' => 'productCategory','activeMenu' => 'productManagement']);
    }

    //get data
    function Read(){
        return ProductCategoriesModel::get();
    }

    //get single data
    function ReadSingle(Request $request){
        $id = $request->id;
        $getSingleData = ProductCategoriesModel::where('id','=',$id)->get();
        return $getSingleData[0];
    }


    //insert data
    function Insert(Request $request){
        $catName = $request->catName;
        $catId = $request->catId;
        $catImage = $request->catImage;

        return ProductCategoriesModel::insert([
            'name' => $catName,
            'categorie_id' => $catId,
            'image' => $catImage,
        ]);
    }

    //update data
    function Update(Request $request){
        $id = $request->id;
        $catName = $request->catName;
        $catId = $request->catId;
        $catImage = $request->catImage;

        return ProductCategoriesModel::where('id','=',$id)->update([
            'name' => $catName,
            'categorie_id' => $catId,
            'image' => $catImage,
        ]);
    }


    //delete data
    function Delete(Request $request){
        $id = $request->id;
        return ProductCategoriesModel::where('id','=',$id)->delete();
    }

}
