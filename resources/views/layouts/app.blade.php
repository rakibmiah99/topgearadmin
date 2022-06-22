<html lang="en">
<head>
    <title>@yield('pageTitle')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{asset("favicon.svg")}}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/responsive.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/fontawesome.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/animate.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/datatables.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/toastr.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/style.css') }}" rel="stylesheet" type="text/css" >
    <script type="text/javascript" src="{{asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.bundle.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/axios.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/toastr.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/moment.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/config.js') }}"></script>

    <script type="text/javascript" src="{{asset('js/chart.min.js') }}"></script>


    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
</head>
<body>
<div>
    <nav id="topNav" class="navbar py-3 fixed-top  top-navbar">
        <div class="container-fluid">
            <button id="MenuBar" class="btn btn-success">
                <i class="fa fa-bars"></i>
            </button>
            <div>
                <a id="logout-btn" class="btn btn-success">
                   Logout
                </a>
                <button id="FullScreen" class="btn btn-success">
                    <i class="fas fa-expand"></i> Full Screen
                </button>
            </div>
        </div>

    </nav>
    <div id="sideNav" class="side-nav-open">
        <div class="side-nav-top text-center bg-light ">
            <img alt="" class="side-nav-logo" src="{{asset("img/sidebarLogo.svg")}}" />
        </div>



        <a href="{{url("/")}}" class="side-bar-item @if($activePage == 'dashboard') active @else '' @endif">
            <span class="side-bar-item-icon"> <i class="fa fa-home"></i></span>
            <span class="side-bar-item-caption">Dashboard</span>
        </a>



        <div class="accordion accordion-flush side-bar-div-dropdown" id="accordion1">


            <div class="accordion-item side-bar-dropdown-item">
                <button class="accordion-button collapsed side-bar-div-dropdown-button " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse0" aria-expanded="false" aria-controls="flush-collapse0">
                    <i class="fas side-icon-dropdown fa-cogs"></i> Settings
                </button>
                <div id="flush-collapse0" class="accordion-collapse bg-light side-bar-inside-dropdown collapse @if($activeMenu === "settings") show @endif" aria-labelledby="flush-heading1" data-bs-parent="#accordion0">
                    <a href="{{url("/Settings")}}" class="side-bar-item @if($activePage === 'settings') active @endif">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">SMS Settings</span>
                    </a>
                </div>
            </div>



            <div class="accordion-item side-bar-dropdown-item">
                    <button class="accordion-button collapsed side-bar-div-dropdown-button " type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse1" aria-expanded="false" aria-controls="flush-collapse1">
                        <i class="fas side-icon-dropdown fa-chart-line"></i> Performance
                    </button>
                <div id="flush-collapse1" class="accordion-collapse bg-light side-bar-inside-dropdown collapse @if($activeMenu === "performance") show @endif" aria-labelledby="flush-heading1" data-bs-parent="#accordion1">

                    <a href="{{url("/Visitors")}}" class="side-bar-item @if($activePage === 'visitorHistory') active @endif">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">Visitor History</span>
                    </a>

                    <a href="{{url("/Notification")}}" class="side-bar-item d-none @if($activePage === 'notification') active @endif">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">Notification</span>
                    </a>


                </div>
            </div>





            <div class="accordion-item side-bar-dropdown-item">
                <button class="accordion-button side-bar-div-dropdown-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                    <i class="fas side-icon-dropdown fa- fa-globe"></i> SEO
                </button>
                <div id="flush-collapse2" class="accordion-collapse bg-light side-bar-inside-dropdown collapse @if($activeMenu === "seoManagement") show @endif" aria-labelledby="flush-heading2" data-bs-parent="#accordion1">
                    <a href="{{url("/PageSeo")}}" class="side-bar-item @if($activePage === 'pageSeo') active @endif">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">Page SEO</span>
                    </a>
                    <a href="{{url("/SiteInfo")}}" class="side-bar-item @if($activePage === "siteInfo") active @endif">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">Site Info</span>
                    </a>
                </div>
            </div>


            <div class="accordion-item side-bar-dropdown-item">
                <button class="accordion-button side-bar-div-dropdown-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse3" aria-expanded="false" aria-controls="flush-collapse3">
                    <i class="fas side-icon-dropdown fa fa-user"></i> User Management
                </button>
                <div id="flush-collapse3" class="accordion-collapse bg-light side-bar-inside-dropdown collapse @if($activeMenu === "userManagement") show @endif" aria-labelledby="flush-heading3" data-bs-parent="#accordion1">
                    <a href="{{url("/ContactRequest")}}" class="side-bar-item @if($activePage === "contactRequest") active @endif">
                        <span class="side-bar-item-icon"> <i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">Contact Request</span>
                    </a>
                    <a href="{{url("/UserProfile")}}" class="side-bar-item @if($activePage === "userProfile") active @endif">
                        <span class="side-bar-item-icon"> <i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">User Profile</span>
                    </a>
                    <a href="{{url("/OTP")}}" class="side-bar-item @if($activePage === "otp") active @endif">
                        <span class="side-bar-item-icon"> <i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">OTP</span>
                    </a>
                    <a href="{{url("/Testimonial")}}" class="side-bar-item @if($activePage === "Testimonial") active @endif">
                        <span class="side-bar-item-icon"> <i class="far fa-comments"></i></span>
                        <span class="side-bar-item-caption">Testimonial</span>
                    </a>
                </div>
            </div>





            <div class="accordion-item side-bar-dropdown-item">
                <button class="accordion-button side-bar-div-dropdown-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse4" aria-expanded="false" aria-controls="flush-collapse4">
                    <i class="fas side-icon-dropdown fas fa-shopping-cart"></i> Product
                </button>
                <div id="flush-collapse4" class="accordion-collapse bg-light side-bar-inside-dropdown collapse @if($activeMenu === "productManagement") show @endif" aria-labelledby="flush-heading4" data-bs-parent="#accordion1">
                    <a href="{{url("/ProductBrand")}}" class="side-bar-item @if($activePage === "productBrand") active @endif">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">Brand List</span>
                    </a>
                    <a href="{{url("/CarModel")}}" class="side-bar-item @if($activePage === "carModel") active @endif">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">Car Model List</span>
                    </a>
                    <a href="{{url("/CarBrand")}}" class="side-bar-item @if($activePage === "carBrand") active @endif">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">Car Brand List</span>
                    </a>
                    <a href="{{url("/ProductCategories")}}" class="side-bar-item @if($activePage === "productCategory") active @endif">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">Category List</span>
                    </a>
                    <a href="{{url("/ProductList")}}" class="side-bar-item @if($activePage === "productList") active @endif">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">Product List</span>
                    </a>
                    <a href="{{url("/ProductDetails")}}" class="side-bar-item @if($activePage === "productDetails") active @endif">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">Product Details</span>
                    </a>
                    <a href="{{url("/ProductSpecification")}}" class="side-bar-item @if($activePage === "productSpecification") active @endif">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">Product Specification</span>
                    </a>
                    <a href="{{url("/ProductFeatured")}}" class="side-bar-item @if($activePage === "productFeatured") active @endif">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">Featured Item</span>
                    </a>
                    <a href="{{url("/ProductStock")}}" class="d-none side-bar-item @if($activePage === "productStock") active @endif">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">Stock</span>
                    </a>
                    <a href="{{url("/ProductStockHistory")}}" class="d-none side-bar-item @if($activePage === "productStockHistory") active @endif">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">Stock History</span>
                    </a>
                </div>
            </div>




            <div class="accordion-item side-bar-dropdown-item">
                <button class="accordion-button side-bar-div-dropdown-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse5" aria-expanded="false" aria-controls="flush-collapse5">
                    <i class="fas side-icon-dropdown fa fa-cog"></i>Service
                </button>
                <div id="flush-collapse5" class="accordion-collapse bg-light side-bar-inside-dropdown collapse @if($activeMenu === "serviceManagement") show @endif" aria-labelledby="flush-heading5" data-bs-parent="#accordion1">
                    <a href="{{url("/Services")}}" class="side-bar-item @if($activePage === 'serviceList') active @endif">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">Service List</span>
                    </a>
                    <a href="{{url("/ServiceRequest")}}" class="side-bar-item @if($activePage === 'serviceRequest') active @endif">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">Service Request</span>
                    </a>
                </div>
            </div>


            <div class="accordion-item side-bar-dropdown-item">
                <button class="accordion-button side-bar-div-dropdown-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse6" aria-expanded="false" aria-controls="flush-collapse6">
                    <i class="fas side-icon-dropdown fas fa-truck"></i>Order
                </button>
                <div id="flush-collapse6" class="accordion-collapse bg-light side-bar-inside-dropdown collapse @if($activeMenu === "orderManagement") show @endif" aria-labelledby="flush-heading6" data-bs-parent="#accordion1">
                    <a href="{{url("/OrderRequest")}}" class="side-bar-item @if($activePage === 'orderRequest') active @endif">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">Order Request</span>
                    </a>
                </div>
            </div>



            <div class="accordion-item side-bar-dropdown-item">
                <button class="accordion-button side-bar-div-dropdown-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse7" aria-expanded="false" aria-controls="flush-collapse7">
                    <i class="fas side-icon-dropdown far fa-images"></i> Gallery
                </button>
                <div id="flush-collapse7" class="accordion-collapse bg-light side-bar-inside-dropdown collapse @if($activeMenu === 'galleryManagement') show @endif" aria-labelledby="flush-heading7" data-bs-parent="#accordion1">
                    <a href="{{url("/Gallery")}}" class="side-bar-item @if($activePage === 'gallery') active @endif ">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">Photo List</span>
                    </a>
                </div>
            </div>



            <div class="accordion-item side-bar-dropdown-item">
                <button class="accordion-button side-bar-div-dropdown-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse8" aria-expanded="false" aria-controls="flush-collapse8">
                    <i class="fas side-icon-dropdown fas fa-percent"></i> Discount
                </button>
                <div id="flush-collapse8" class="accordion-collapse bg-light side-bar-inside-dropdown collapse @if($activeMenu === "couponManagement") show @endif" aria-labelledby="flush-heading8" data-bs-parent="#accordion1">
                    <a href="{{url("/DetailsCoupon")}}" class="side-bar-item @if($activePage === 'detailsCoupon') active @endif">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">Details Coupon</span>
                    </a>
                </div>
            </div>



            <div class="accordion-item side-bar-dropdown-item">
                <button class="accordion-button side-bar-div-dropdown-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse9" aria-expanded="false" aria-controls="flush-collapse9">
                    <i class="fas side-icon-dropdown fa fa-blog"></i> Blogs
                </button>
                <div id="flush-collapse9" class="accordion-collapse bg-light side-bar-inside-dropdown collapse @if($activeMenu === "blogManagement") show @endif" aria-labelledby="flush-heading9" data-bs-parent="#accordion1">

                    <a href="{{url("/Blogs")}}" class="side-bar-item @if($activePage === "blogList") active @endif">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">Blogs</span>
                    </a>
                    <a href="{{url("/BlogComments")}}" class="side-bar-item @if($activePage === "blogComments") active @endif">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">Blog Comments</span>
                    </a>
                </div>
            </div>


            <div class="accordion-item side-bar-dropdown-item">
                <button class="accordion-button side-bar-div-dropdown-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse10" aria-expanded="false" aria-controls="flush-collapse10">
                    <i class="fas side-icon-dropdown far fa-credit-card"></i> Payment
                </button>
                <div id="flush-collapse10" class="accordion-collapse bg-light side-bar-inside-dropdown collapse @if($activeMenu === 'paymentManagement') show @endif" aria-labelledby="flush-heading10" data-bs-parent="#accordion1">
                    <a href="{{url("/SSLPayment")}}" class="side-bar-item @if($activePage === 'sslPayment') active @endif">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">SSL Payment</span>
                    </a>
                    <a href="{{url("/TempSSLPayment")}}" class="side-bar-item d-none @if($activePage === 'tempSslPayment') active @endif">
                        <span class="side-bar-item-icon"><i class="far fa-circle"></i></span>
                        <span class="side-bar-item-caption">Temp SSL Payment</span>
                    </a>
                </div>
            </div>

            <br/>  <br/>  <br/>  <br/>  <br/>



        </div>


































    </div>
    <div  id="content" class="main-content">
        <div class="container-fluid content-body">
            @yield('content')
        </div>
    </div>
</div>

<script>

    $('#logout-btn').click(function(){
        axios.post('/admin/LogoutAdmin').then(function(res){
            if(res.status === 200){
                window.location.href = '/admin';
            }
        }).catch(function(err){

        })
    })

    $('#MenuBar').on('click',function () {
        let sideNav = document.getElementById('sideNav')
        let content =document.getElementById('content')
        let topNav = document.getElementById('topNav')
        if (sideNav.classList.contains("side-nav-open")) {
            sideNav.classList.add("side-nav-close");
            sideNav.classList.remove("side-nav-open");
            content.classList.add("content-expand");
            content.classList.remove("main-content");
            topNav.classList.add("top-navbar-expand");
            topNav.classList.remove("top-navbar");
        } else {
            sideNav.classList.remove("side-nav-close");
            sideNav.classList.add("side-nav-open");
            content.classList.remove("content-expand");
            content.classList.add("main-content");
            topNav.classList.remove("top-navbar-expand");
            topNav.classList.add("top-navbar");
        }
    })

    $('#FullScreen').on('click',function () {
        var el = document.documentElement
            , rfs = // for newer Webkit and Firefox
            el.requestFullscreen
            || el.webkitRequestFullScreen
            || el.mozRequestFullScreen
            || el.msRequestFullscreen
        ;
        if(typeof rfs!="undefined" && rfs){
            rfs.call(el);
        } else if(typeof window.ActiveXObject!="undefined"){
            // for Internet Explorer
            var wscript = new ActiveXObject("WScript.Shell");
            if (wscript!=null) {
                wscript.SendKeys("{F11}");
            }
        }

    })




</script>
</body>
</html>

