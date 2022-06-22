<?php

namespace App\Http\Controllers;

use App\Models\ProductFeaturedModel;
use App\Models\SiteInfoModel;
use Illuminate\Http\Request;

class SiteInfoController extends Controller
{
    function Page(){
        return view('pages.SiteInfoPage', ['activePage' => 'siteInfo','activeMenu' => 'seoManagement']);
    }

    //get data
    function Read(){
        return SiteInfoModel::get();
    }

    //get single data
    function ReadSingle(Request $request){
        $id = $request->id;
        $getSingleData = SiteInfoModel::where('id','=',$id)->get();
        return $getSingleData[0];
    }

    //insert data
    function Insert(Request $request){
        $siteType = $request->siteType;
        $siteDetails = $request->siteDetails;

        return SiteInfoModel::insert([
            'type' => $siteType,
            'details' => $siteDetails
        ]);
    }

    //update data
    function Update(Request $request){
        $id = $request->id;
        $siteType = $request->siteType;
        $siteDetails = $request->siteDetails;

        return SiteInfoModel::where('id','=',$id)->update([
            'type' => $siteType,
            'details' => $siteDetails
        ]);
    }


    //delete data
    function Delete(Request $request){
        $id = $request->id;
        return SiteInfoModel::where('id','=',$id)->delete();
    }
}
