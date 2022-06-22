@extends('layouts.app2')
@section('pageTitle','Order Request')
@section('content')
<div id="invoice" class="p-5">
    <h1 class="text-center">Invoice</h1>
    <div class="inv-customer-info">
        <div class="lh-lg"><h4>INVOICE NO:  {{$invoiceNo}}</h4></div>
        <div class="lh-lg"><b>Name: </b><span id="name">{{$customerInfo->name}}</span></div>
        <div class="lh-lg"><b>Mobile 1: </b><span id="name">{{$customerInfo->mobile1}}</span></div>
        <div class="lh-lg"><b>Mobile 2: </b><span id="name">{{$customerInfo->mobile2}}</span></div>
        <div class="lh-lg"><b>Email: </b><span id="name">{{$customerInfo->email_address}}</span></div>
        <div class="lh-lg"><b>Payment Method: </b><span id="name">{{$customerInfo->payment_method}}</span></div>
        <div class="lh-lg"><b>Order Time: </b><span id="name">{{$customerInfo->order_date}} , {{$customerInfo->order_time}}</span></div>
        <div class="lh-lg"><b>City: </b><span id="name">{{$customerInfo->city}}</span></div>
        <div class="lh-lg"><b>Shipping Address: </b><span id="name">{{$customerInfo->shipping_address}}</span></div>
        <div>
            <table class="table table-striped table-light mt-3">
                <thead>
                <tr>
                    <th>SL NO</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Product Info</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th class="text-end">Total Price</th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                @foreach($invoiceProduct as $product)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->product_code}}</td>
                        <td>{{$product->product_info}}</td>
                        <td>{{$product->unit_price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td class="text-end">{{$product->total_price}}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="6"  class="text-end">Sub Total</td>
                    <td colspan="1" class="text-end">{{$customerInfo->subtotal_price}}</td>
                </tr>
                <tr>
                    <td colspan="6" class="text-end">Shipping Charge</td>
                    <td colspan="1" class="text-end">{{$customerInfo->shipping_charge}}</td>
                </tr>
                <tr>
                    <td colspan="6" class="text-end">Total Due</td>
                    <td colspan="1" class="text-end">{{$customerInfo->total_due}}</td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function (){
        window.print();
    })
</script>
@endsection

