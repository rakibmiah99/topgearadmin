<?php

namespace App\Http\Controllers;

use App\Models\ProductListModel;
use App\Models\ProductDetailsModel;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    function Page(){
        $productCode = ProductListModel::get(['product_code']);
        $data = [
            'productCode' => $productCode,
            'activePage' => 'productDetails',
            'activeMenu' => 'productManagement'
        ];
        return view('pages.ProductDetailsPage', $data);
    }

    //get data
    function Read(){
        return ProductDetailsModel::get();
    }


    //get single data
    function ReadSingle(Request $request){
        $id = $request->id;
        $getSingleData = ProductDetailsModel::where('id','=',$id)->get();
        return $getSingleData[0];
    }

    //insert data
    function Insert(Request $request){
        $productCode = $request->productCode;
        $size = $request->size;
        $color = $request->color;
        $img1 = $request->img1;
        $img2 = $request->img2;
        $img3 = $request->img3;
        $img4 = $request->img4;
        $description = $request->description;

        return ProductDetailsModel::insert([
            'product_code' => $productCode,
            'size' => $size,
            'color' => $color,
            'img1' => $img1,
            'img2' => $img2,
            'img3' => $img3,
            'img4' => $img4,
            'des' => $description,
        ]);
    }




    //update data
    function Update(Request $request){
        $id = $request->id;
        $productCode = $request->productCode;
        $size = $request->size;
        $color = $request->color;
        $img1 = $request->img1;
        $img2 = $request->img2;
        $img3 = $request->img3;
        $img4 = $request->img4;
        $description = $request->description;

        return ProductDetailsModel::where('id','=',$id)->update([
            'product_code' => $productCode,
            'size' => $size,
            'color' => $color,
            'img1' => $img1,
            'img2' => $img2,
            'img3' => $img3,
            'img4' => $img4,
            'des' => $description,
        ]);
    }



    //delete data
    function Delete(Request $request){
        $id = $request->id;
        return ProductDetailsModel::where('id','=',$id)->delete();
    }
}
