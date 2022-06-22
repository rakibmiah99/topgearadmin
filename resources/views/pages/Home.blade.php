@extends('layouts.app')
@section('pageTitle','Admin Dashboard')
@section('content')

<div>
    <div id="ContentLoaderDiv" class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="Line-Progress">
                <div class="indeterminate">
                </div>
            </div>
        </div>
    </div>
</div>

<ul class="nav nav-pills shadow-sm bg-white p-3 mx-2 mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link  active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Performance</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Order</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-ssl-tab" data-bs-toggle="pill" data-bs-target="#pills-ssl" type="button" role="tab" aria-controls="pills-ssl" aria-selected="false">SSL Commerz</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Service</button>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        @include('components.Home.home-performance')
    </div>
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        @include('components.Home.home-order')
     </div>
    <div class="tab-pane fade" id="pills-ssl" role="tabpanel" aria-labelledby="pills-ssl-tab">
        @include('components.Home.SSL-Commarz')
    </div>
    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
        @include('components.Home.home-service')
    </div>
</div>



    <script>


        $(document).ready(function(){
            axios.get('/AllCount').then(function (response) {
                if(response.status === 200 ){
                    let data = response.data;
                    $('#MainDiv').removeClass('d-none');
                    $('#ContentLoaderDiv').addClass('d-none');

                    //set content
                    $('#Visitors').html(data.totalVisitors);
                    $('#otp').html(data.totalOTP);
                    $('#notification').html(data.totalNotification);
                    $('#user').html(data.totalUserProfile);
                    $('#product').html(data.totalProduct);
                    $('#image').html(data.totalGallery);
                    $('#blog').html(data.totalBlog);
                    $('#service').html(data.totalService);
                    $('#service-request').html(data.totalServiceRequest);
                    $('#contact-request').html(data.totalContactRequest);

                    $('#OrderInProcess').html(data.totalProcessing);
                    $('#OrderAccepted').html(data.totalOrderAccepted);
                    $('#OrderPicked').html(data.totalOrderPicked);
                    $('#OrderDelivered').html(data.totalOrderDelivered);
                    $('#OrderCanceled').html(data.totalOrderCanceled);

                    $('#ServiceInProcess').html(data.totalServiceProcessing);
                    $('#ServiceAccepted').html(data.totalServiceAccepted);
                    $('#ServiceCompleted').html(data.totalServiceCompleted);
                    $('#ServiceCanceled').html(data.totalServiceCanceled);
                    $('#ContactRequest').html(data.totalContactRequest);


                    $('#SSLPending').html(data.totalSSLPending);
                    $('#SSLProcessing').html(data.totalSSLProcessing);
                    $('#SSLComplete').html(data.totalSSLComplete);
                    $('#SSLFailed').html(data.totalSSLFailed);
                    $('#SSLCanceled').html(data.totalSSLCanceled);




                }
            }).catch(function (error) {
                console.log(error);
            });
        });















    </script>


@endsection

