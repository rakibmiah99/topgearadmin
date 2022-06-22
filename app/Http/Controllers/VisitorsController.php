<?php

namespace App\Http\Controllers;

use App\Models\VisitorsModel;
use Illuminate\Http\Request;

class VisitorsController extends Controller
{
    function Page(){
        return view('pages.VisitorsPage',['activeMenu'=> 'performance','activePage' => 'visitorHistory']);
    }

    //get data
    function Read(){
        return VisitorsModel::orderBy('id', 'desc')->take(10000)->get();
    }
}
