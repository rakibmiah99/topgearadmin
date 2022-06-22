<?php

namespace App\Http\Controllers;

use App\Models\ProductListModel;
use Illuminate\Http\Request;
use App\Models\ProductStockModel;
use App\Models\ProductStockHistoryModel;

class ProductStockController extends Controller
{
    function Page(){
        $productCode = ProductListModel::get(['product_code']);
        $data = [
            'activePage' => 'productStock',
            'activeMenu' => 'productManagement',
            'productCode' => $productCode
        ];
        return view('pages.ProductStockPage', $data);
    }

    function Insert(Request $request){
        $productCode = $request->productCode;
        $type = $request->type;
        $quantity = $request->quantity;
        $totalProduct = ProductStockModel::where('product_code', $productCode)->get(['total_product']);
        $total = 0;
        if(count($totalProduct) < 1){
            $total = 0;
        }else{
            $total += $totalProduct[0]->total_product;
        }


        if($type === "stock_in"){
            $total += $quantity;
        }else if($type === 'stock_out'){
            $total -= $quantity;
        };

        $input = [
            'stock' => [
                'product_code' => $productCode,
                'total_product' => $total,
                'updated_time' => date('Y-m-d h:i:s')
            ],
            'history' => [
                'product_code' => $productCode,
                'quantity' => $quantity,
                'created_by' => $request->createdBy,
                'created_time' => date('Y-m-d h:i:s'),
                'type' => $type
            ]
        ];

        if(count($totalProduct) < 1){
            $stock = ProductStockModel::insert($input['stock']);
            $history = ProductStockHistoryModel::insert($input['history']);
            if($stock && $history){
                return true;
            }else{
                return false;
            }
        }else{
            $stock = ProductStockModel::where('product_code',$productCode)->update($input['stock']);
            $history = ProductStockHistoryModel::insert($input['history']);
            if($stock && $history){
                return true;
            }else{
                return false;
            }
        }

    }


    function ReadSingle(Request $request){
        return ProductStockModel::where('product_code', $request->productCode)->first(['total_product']);
    }

    public function Read(){
        return ProductStockModel::all();
    }

    public function StockDelete(Request $request){
        $id = $request->id;
        return ProductStockModel::where('id','=',$id)->delete();
    }


    //Stock History
    function HistoryPage(){
        $data = [
            'activePage' => 'productStockHistory',
            'activeMenu' => 'productManagement'
        ];
        return view('pages.ProductStockHistoryPage', $data);
    }

    public function StockHistoryRead(){
        return ProductStockHistoryModel::all();
    }

    public function StockHistoryDelete(Request $request){
        $id = $request->id;
        return ProductStockHistoryModel::where('id','=',$id)->delete();
    }



}
