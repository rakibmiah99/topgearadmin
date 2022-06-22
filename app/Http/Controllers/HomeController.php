<?php

namespace App\Http\Controllers;

use App\Models\InvoiceListModel;
use App\Models\SSLPaymentModel;
use App\Models\UserProfileModel;
use Illuminate\Http\Request;
use App\Models\VisitorsModel;
use App\Models\OTPModel;
use App\Models\NotificationModel;
use App\Models\ProductListModel;
use App\Models\GalleryModel;
use App\Models\BlogListModel;
use App\Models\ServicesModel;
use App\Models\ServiceRequestModel;
use App\Models\ContactRequestModel;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class HomeController extends Controller
{


  function Page(){
      return view('pages.Home',['activeMenu'=>'dashboard','activePage' => 'dashboard']);
  }

  function AllCount(){
      $totalVisitors = count(VisitorsModel::get());
      $totalOTP = count(OTPModel::get());
      $totalNotification = count(NotificationModel::get());
      $totalProduct = count(ProductListModel::get());
      $totalGallery = count(GalleryModel::get());
      $totalBlog = count(BlogListModel::get());
      $totalService = count(ServicesModel::get());
      $totalContactRequest = count(ContactRequestModel::get());
      $totalUserProfile = count(UserProfileModel::get());

      $totalOrderProcessing = count(InvoiceListModel::where('order_status','processing')->get());
      $totalOrderAccepted = count(InvoiceListModel::where('order_status','accepted')->get());
      $totalOrderPicked = count(InvoiceListModel::where('order_status','picked up')->get());
      $totalOrderDelivered = count(InvoiceListModel::where('order_status','delivered')->get());
      $totalOrderCanceled= count(InvoiceListModel::where('order_status','canceled')->get());

      $totalServiceProcessing = count(ServiceRequestModel::where('status','processing')->get());
      $totalServiceAccepted = count(ServiceRequestModel::where('status','accepted')->get());
      $totalServiceCompleted = count(ServiceRequestModel::where('status','completed')->get());
      $totalServiceCanceled = count(ServiceRequestModel::where('status','canceled')->get());


      $totalSSLProcessing = count(SSLPaymentModel::where('status','Processing')->get());
      $totalSSLPending = count(SSLPaymentModel::where('status','Pending')->get());
      $totalSSLFailed = count(SSLPaymentModel::where('status','Failed')->get());
      $totalSSLComplete = count(SSLPaymentModel::where('status','Complete')->get());
      $totalSSLCanceled = count(SSLPaymentModel::where('status','Canceled')->get());

      $count['totalSSLProcessing'] =  $totalSSLProcessing;
      $count['totalSSLPending'] =  $totalSSLPending;
      $count['totalSSLFailed'] =  $totalSSLFailed;
      $count['totalSSLComplete'] =  $totalSSLComplete;
      $count['totalSSLCanceled'] =  $totalSSLCanceled;


      $count['totalVisitors'] = $totalVisitors;
      $count['totalOTP'] = $totalOTP;
      $count['totalNotification'] = $totalNotification;
      $count['totalProduct'] = $totalProduct;
      $count['totalGallery'] = $totalGallery;
      $count['totalBlog'] = $totalBlog;
      $count['totalService'] = $totalService;
      $count['totalContactRequest'] = $totalContactRequest;
      $count['totalUserProfile'] = $totalUserProfile;


      $count['totalProcessing'] =  $totalOrderProcessing;
      $count['totalOrderAccepted'] =  $totalOrderAccepted;
      $count['totalOrderPicked'] =  $totalOrderPicked;
      $count['totalOrderDelivered'] =  $totalOrderDelivered;
      $count['totalOrderCanceled'] =  $totalOrderCanceled;

      $count['totalServiceProcessing'] =  $totalServiceProcessing;
      $count['totalServiceAccepted'] =  $totalServiceAccepted;
      $count['totalServiceCompleted'] =  $totalServiceCompleted;
      $count['totalServiceCanceled'] =  $totalServiceCanceled;

      return $count;
  }

  function VisitorByDate(){
      $visitors =VisitorsModel::select(DB::raw('visit_date as date'), DB::raw('count(*) as total'))
          ->groupBy('visit_date')
          ->orderBy('visit_date', 'asc')
          ->take(15)
          ->get();
      return $visitors;
  }

    function OrderByDate(){
        $Order =InvoiceListModel::select(DB::raw('order_date as date'), DB::raw('count(*) as total'))
            ->groupBy('order_date')
            ->orderBy('order_date', 'asc')
            ->take(15)
            ->get();
        return  $Order;
    }



}
