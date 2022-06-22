<?php

namespace App\Http\Controllers;

use App\Models\BlogListModel;
use App\Models\BlogDetailsModel;
use Illuminate\Http\Request;

class BlogListController extends Controller
{
    function Page(){
        return view('pages.BlogPage',['activePage' =>'blogList', 'activeMenu' => 'blogManagement']);
    }

    //get data
    function Read(){
        return BlogListModel::get();
    }

    //get single data
    function ReadSingle(Request $request){
        $blogId = $request->blogId;
        $getSingleData['blogList'] = BlogListModel::where('blog_id','=',$blogId)->get()[0];
        $getSingleData['blogDetails'] = BlogDetailsModel::where('blog_id','=',$blogId)->get()[0];
        return $getSingleData;
    }

    //insert data
    function Insert(Request $request){
        $blogId = date('Y-m-d h:i:s');
        //BLOG LIST
        $title = $request->title;
        $shortDes = $request->shortDes;
        $topic = $request->topic;
        $cartPhoto = $request->cartPhoto;
        $saveBlogList = BlogListModel::insert([
            'title' => $title,
            'short_des' => $shortDes,
            'topic' => $topic,
            'cart_photo' => $cartPhoto,
            'blog_id' => $blogId,
            'update_time' => '0'
        ]);

        //BLOG DETAILS
        $writtenBy = $request->writtenBy;
        $readTime = $request->readTime;
        $coverPhoto = $request->coverPhoto;
        $description = $request->description;
        $keywords = $request->keywords;

        $saveBlogDetails = BlogDetailsModel::insert([
            'written_by' => $writtenBy,
            'read_time' => $readTime,
            'cover_photo' => $coverPhoto,
            'description' => $description,
            'blog_id' => $blogId,
            'keywords' => $keywords,
            'update_time' => '0'
        ]);

        if($saveBlogList == true && $saveBlogDetails == true){
            return true;
        }else{
            return false;
        }


    }

    //update data
    function Update(Request $request){
        $blogId = $request->blogId;
        $updateTime = date('Y-m-d h:i:s');
        //BLOG LIST
        $title = $request->title;
        $shortDes = $request->shortDes;
        $topic = $request->topic;
        $cartPhoto = $request->cartPhoto;


        //BLOG DETAILS
        $writtenBy = $request->writtenBy;
        $readTime = $request->readTime;
        $coverPhoto = $request->coverPhoto;
        $description = $request->description;
        $keywords = $request->keywords;

        $updateBlogList =  BlogListModel::where('blog_id','=',$blogId)->update([
            'title' => $title,
            'short_des' => $shortDes,
            'topic' => $topic,
            'cart_photo' => $cartPhoto,
            'blog_id' => $blogId,
            'update_time' => $updateTime
        ]);

        $updateBlogDetails =  BlogDetailsModel::where('blog_id','=',$blogId)->update([
            'written_by' => $writtenBy,
            'read_time' => $readTime,
            'cover_photo' => $coverPhoto,
            'description' => $description,
            'blog_id' => $blogId,
            'keywords' => $keywords,
            'update_time' => $updateTime
        ]);

        if($updateBlogDetails == true && $updateBlogList == true){
            return true;
        }
    }


    //delete data
    function Delete(Request $request){
        $blogId = $request->blogId;
        $deleteBlog = BlogListModel::where('blog_id','=',$blogId)->delete();
        $deleteBlogDetails = BlogDetailsModel::where('blog_id','=',$blogId)->delete();
        if($deleteBlog == true && $deleteBlogDetails == true){
            return true;
        }else{
            return false;
        }
    }
}
