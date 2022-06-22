<?php

namespace App\Http\Controllers;
use App\Models\TestimonialModel;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    function Page(){
        return view('pages.Testimonial', ['activePage' => 'Testimonial','activeMenu' => 'userManagement']);
    }

    //get data
    function Read(){
        return TestimonialModel::get();
    }

    //get single data
    function ReadSingle(Request $request){
        $id = $request->id;
        $getSingleData = TestimonialModel::where('id','=',$id)->get();
        return $getSingleData[0];
    }


    //insert data
    function Insert(Request $request){
        $customerName = $request->input('customerName');
        $score = $request->input('score');;
        $comment = $request->input('comment');
        $ImageLink= $request->input('ImageLink');

        return TestimonialModel::insert([
            'testi_user' => $customerName,
            'testi_user_image' => $ImageLink,
            'test_des' => $comment,
            'rating' => $score
        ]);
    }

    //update data
    function Update(Request $request){
        $id = $request->input('id');
        $customerName = $request->input('customerName');
        $score = $request->input('score');;
        $comment = $request->input('comment');
        $ImageLink= $request->input('ImageLink');

        return TestimonialModel::where('id','=',$id)->update([
            'testi_user' => $customerName,
            'testi_user_image' => $ImageLink,
            'test_des' => $comment,
            'rating' => $score
        ]);
    }


    //delete data
    function Delete(Request $request){
        $id = $request->id;
        return TestimonialModel::where('id','=',$id)->delete();
    }
}
