<?php

namespace App\Http\Controllers;

use App\Models\GalleryModel;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    function Page(){
        return view('pages.GalleryPage', ['activeMenu' => 'galleryManagement', 'activePage' => 'gallery']);
    }

    //get data
    function Read(){
        return GalleryModel::get();
    }

    //get single data
    function ReadSingle(Request $request){
        $id = $request->id;
        $getSingleData = GalleryModel::where('id','=',$id)->get();
        return $getSingleData[0];
    }


    //insert data
    function Insert(Request $request){
        $title = $request->input('title');
        $shortDes = $request->input('shortDes');
        $image = $request->input('image');

        return GalleryModel::insert([
            'title' => $title,
            'short_des' => $shortDes,
            'image' => $image
        ]);
    }

    //update data
    function Update(Request $request){
        $id = $request->id;
        $title = $request->title;
        $shortDes = $request->shortDes;
        $image = $request->image;

        return GalleryModel::where('id','=',$id)->update([
            'title' => $title,
            'short_des' => $shortDes,
            'image' => $image
        ]);
    }


    //delete data
    function Delete(Request $request){
        $id = $request->id;
        return GalleryModel::where('id','=',$id)->delete();
    }
}
