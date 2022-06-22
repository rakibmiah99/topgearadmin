<?php

namespace App\Http\Controllers;

use App\Models\ProductBrandModel;
use App\Models\ProductFeaturedModel;
use Illuminate\Http\Request;

class ProductFeaturedController extends Controller
{
    function Page(){
        $brands = ProductBrandModel::get();
        $data = [
            'brands' => $brands,
            'activePage' => 'productFeatured',
            'activeMenu' => 'productManagement'
        ];
        return view('pages.ProductFeaturedPage', $data);
    }

    //get data
    function Read(){
        return ProductFeaturedModel::get();
    }

    //get single data
    function ReadSingle(Request $request){
        $id = $request->id;
        $getSingleData = ProductFeaturedModel::where('id','=',$id)->get();
        return $getSingleData[0];
    }

    //insert data
    function Insert(Request $request){
        $brand = $request->brand;
        $title = $request->title;
        $itemLink = $request->itemLink;
        $salePrice = $request->salePrice;
        $star = $request->star;
        $image = $request->image;
        $description = $request->description;

        return ProductFeaturedModel::insert([
            'brand' => $brand,
            'star' => $star,
            'title' => $title,
            'des' => $description,
            'item_link' => $itemLink,
            'sell_price' => $salePrice,
            'image' => $image,
            'status'=>'active'
        ]);
    }

    //update data
    function Update(Request $request){
        $id = $request->id;
        $brand = $request->brand;
        $title = $request->title;
        $itemLink = $request->itemLink;
        $salePrice = $request->salePrice;
        $star = $request->star;
        $image = $request->image;
        $description = $request->description;

        return ProductFeaturedModel::where('id','=',$id)->update([
            'brand' => $brand,
            'star' => $star,
            'title' => $title,
            'des' => $description,
            'item_link' => $itemLink,
            'sell_price' => $salePrice,
            'image' => $image
        ]);
    }

    //delete data
    function Delete(Request $request){
        $id = $request->id;
        return ProductFeaturedModel::where('id','=',$id)->delete();
    }


}
