<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoiceListModel;
use App\Models\InvoiceProductModel;

class InvoiceController extends Controller
{
    public function Page(){
        return view('pages.OrderRequestPage',['activeMenu'=> 'orderManagement','activePage' => 'orderRequest']);
    }

    public function Read(){
        return InvoiceListModel::all();
    }

    public function GetInvoice(Request $request){
        $invoiceNo = $request->invoiceNo;
        $customerInfo = InvoiceListModel::where('invoice_no',$invoiceNo)->get()[0];
        $invoiceProduct = InvoiceProductModel::where('invoice_no',$invoiceNo)->get();

        $invoice['invoiceNo'] = $invoiceNo;
        $invoice['customerInfo'] = $customerInfo;
        $invoice['invoiceProduct'] = $invoiceProduct;

        return view('pages.InvoicePrintPage',$invoice);
    }

    public function GetInvoiceData(Request $request){
        $invoiceNo = $request->invoiceNo;
        $customerInfo = InvoiceListModel::where('invoice_no',$invoiceNo)->get()[0];
        $invoiceProduct = InvoiceProductModel::where('invoice_no',$invoiceNo)->get();

        $invoice['invoiceNo'] = $invoiceNo;
        $invoice['customerInfo'] = $customerInfo;
        $invoice['invoiceProduct'] = $invoiceProduct;

        return $invoice;
    }

    public function ReadSingle(Request $request){
        $id = $request->id;
        return InvoiceListModel::where('id',$id)->get(['id','order_status'])[0];
    }

    public function UpdateOrderStatus(Request $request){
        $id = $request->id;
        $orderStatus = $request->orderStatus;
        return InvoiceListModel::where('id',$id)->update([
            'order_status' => $orderStatus
        ]);
    }

    //delete data
    function Delete(Request $request){
        $id = $request->id;
        $invoiceNo =  InvoiceListModel::where('id','=',$id)->get(['invoice_no'])[0]->invoice_no;
        $invoiceProduct =  InvoiceProductModel::where('invoice_no','=',$invoiceNo)->delete();
        if($invoiceProduct){
            return InvoiceListModel::where('id',$id)->delete();
        }else{
            return 0;
        }
    }
}
