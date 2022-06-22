<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageSeoModel;

class PageSeoController extends Controller
{
    function Page(){
        return view('pages.PageSeoPage', ['activePage' => 'pageSeo','activeMenu' => 'seoManagement']);
    }

    function Insert(Request $request){
        $name = $request->name;
        $title = $request->title;
        $shareTitle = $request->shareTitle;
        $keyword = $request->keyword;
        $imageLink = $request->imageLink;
        $description = $request->description;

        return PageSeoModel::insert([
            'name' => $name,
            'title' => $title,
            'share_title' => $shareTitle,
            'keywords' => $keyword,
            'page_img' => $imageLink,
            'description' => $description
        ]);

    }

    function Read(){
       return PageSeoModel::get();

    }

    //get single data
    function ReadSingle(Request $request)
    {
        $id = $request->id;
        $get = PageSeoModel::where('id', '=', $id)->get();
        return $get[0];
    }

    function Update(Request $request){
        $id = $request->id;
        $name = $request->name;
        $title = $request->title;
        $shareTitle = $request->shareTitle;
        $keyword = $request->keyword;
        $imageLink = $request->imageLink;
        $description = $request->description;

        return PageSeoModel::where('id','=',$id)->update([
            'name' => $name,
            'title' => $title,
            'share_title' => $shareTitle,
            'keywords' => $keyword,
            'page_img' => $imageLink,
            'description' => $description
        ]);

    }


    function Delete(Request $request){
        $id = $request->id;
        return PageSeoModel::where('id','=',$id)->delete();

    }

}
