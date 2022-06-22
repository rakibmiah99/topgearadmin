<?php

namespace App\Http\Controllers;

use App\Models\BlogCommentsModel;
use Illuminate\Http\Request;

class BlogCommentsController extends Controller
{
    function Page(){
        return view('pages.BlogCommentsPage',['activePage' => 'blogComments','activeMenu' => 'blogManagement']);
    }

    //get data
    function Read(){
        return BlogCommentsModel::get();
    }
}
