<?php

namespace App\Http\Controllers;
use App\Models\ProductBrandModel;
use App\Models\ProductCategoriesModel;
use App\Models\ProductListModel;
use Illuminate\Http\Request;

class ProductListController extends Controller
{

    function Page(){
        $brands = ProductBrandModel::get();
        $categories = ProductCategoriesModel::get();
        $data = [
            'brands' => $brands,
            'categories' => $categories,
            'activePage' => 'productList',
            'activeMenu' => 'productManagement'
        ];
        return view('pages.ProductListPage', $data);
    }

    //get data
    function Read(){
        return ProductListModel::get();
    }

    function ProductListName(){
        return ProductListModel::get(['id','title','product_code']);
    }

    //get single data
    function ReadSingle(Request $request){
        $id = $request->id;
        $getSingleData = ProductListModel::where('id','=',$id)->get();
        return $getSingleData[0];
    }

    //insert data
    function Insert(Request $request){
        $brand = $request->brand;
        $title = $request->title;
        $code = $request->code;
        $salePrice = $request->salePrice;
        $star = $request->star;
        $image = $request->image;
        $remark = $request->remarks;
        $keywords = $request->keywords;
        $specialSalePrice = $request->specialSalePrice;
        $specialPrice = $request->specialPrice;
        $callPrice = $request->callPrice;
        $category = $request->category;
        $stock = $request->stock;

        return ProductListModel::insert([
            'brand' => $brand,
            'star' => $star,
            'title' => $title,
            'remark' => $remark,
            'product_code' => $code,
            'sell_price' => $salePrice,
            'image' => $image,
            'special_sell_price' => $specialSalePrice,
            'special_price' => $specialPrice,
            'call_price' => $callPrice,
            'category' => $category,
            'stock' => $stock,
            'keywords' => $keywords,
        ]);
    }




    //update data
    function Update(Request $request){
        $id = $request->id;
        $brand = $request->brand;
        $title = $request->title;
        $code = $request->code;
        $salePrice = $request->salePrice;
        $star = $request->star;
        $image = $request->image;
        $remark = $request->remarks;
        $keywords = $request->keywords;
        $specialSalePrice = $request->specialSalePrice;
        $specialPrice = $request->specialPrice;
        $callPrice = $request->callPrice;
        $category = $request->category;
        $stock = $request->stock;

        return ProductListModel::where('id','=',$id)->update([
            'brand' => $brand,
            'star' => $star,
            'title' => $title,
            'remark' => $remark,
            'product_code' => $code,
            'sell_price' => $salePrice,
            'image' => $image,
            'special_sell_price' => $specialSalePrice,
            'special_price' => $specialPrice,
            'call_price' => $callPrice,
            'category' => $category,
            'stock' => $stock,
            'keywords' => $keywords,
        ]);
    }



    //delete data
    function Delete(Request $request){
        $id = $request->id;
        return ProductListModel::where('id','=',$id)->delete();
    }
}
