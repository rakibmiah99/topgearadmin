<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageSeoController;
use App\Http\Controllers\ProductCategoriesController;
use App\Http\Controllers\ProductFeaturedController;
use App\Http\Controllers\SiteInfoController;
use App\Http\Controllers\ProductListController;
use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\ProductSpecificationController;
use App\Http\Controllers\ProductBrandController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\ContactRequestController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\VisitorsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\BlogListController;
use App\Http\Controllers\CarModelController;
use App\Http\Controllers\CarBrandController;
use App\Http\Controllers\DetailsCouponController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OTPController;
use App\Http\Controllers\BlogCommentsController;
use App\Http\Controllers\SSLPaymentController;
use App\Http\Controllers\UserProfileControlller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductStockController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Admin Route
Route::get('/admin', [AdminController::class,'GetPage']);
Route::post('/admin/CheckAdmin', [AdminController::class,'CheckAdmin']);
Route::post('/admin/LogoutAdmin', [AdminController::class,'LogoutAdmin']);


Route::get('/',[HomeController::class,'Page'])->middleware('adminAuth');
Route::get('/AllCount',[HomeController::class,'AllCount'])->middleware('adminAuth');
Route::get('/VisitorByDate',[HomeController::class,'VisitorByDate'])->middleware('adminAuth');
Route::get('/OrderByDate',[HomeController::class,'OrderByDate'])->middleware('adminAuth');




//Page SEO
Route::get('/PageSeo',[PageSeoController::class,'Page'])->middleware('adminAuth');
Route::post('/PageSeo/Insert',[PageSeoController::class,'Insert'])->middleware('adminAuth');
Route::get('/PageSeo/Read',[PageSeoController::class,'Read'])->middleware('adminAuth');
Route::post('/PageSeo/ReadSingle',[PageSeoController::class,'ReadSingle'])->middleware('adminAuth');
Route::post('/PageSeo/Update',[PageSeoController::class,'Update'])->middleware('adminAuth');
Route::post('/PageSeo/Delete',[PageSeoController::class,'Delete'])->middleware('adminAuth');

//Product Categories
Route::get('/ProductCategories',[ProductCategoriesController::class,'Page'])->middleware('adminAuth');
Route::post('/ProductCategories/Insert',[ProductCategoriesController::class,'Insert'])->middleware('adminAuth');
Route::get('/ProductCategories/Read',[ProductCategoriesController::class,'Read'])->middleware('adminAuth');
Route::post('/ProductCategories/ReadSingle',[ProductCategoriesController::class,'ReadSingle'])->middleware('adminAuth');
Route::post('/ProductCategories/Update',[ProductCategoriesController::class,'Update'])->middleware('adminAuth');
Route::post('/ProductCategories/Delete',[ProductCategoriesController::class,'Delete'])->middleware('adminAuth');

//Product Brand
Route::get('/ProductBrand',[ProductBrandController::class,'Page'])->middleware('adminAuth');
Route::post('/ProductBrand/Insert',[ProductBrandController::class,'Insert'])->middleware('adminAuth');
Route::get('/ProductBrand/Read',[ProductBrandController::class,'Read'])->middleware('adminAuth');
Route::post('/ProductBrand/ReadSingle',[ProductBrandController::class,'ReadSingle'])->middleware('adminAuth');
Route::post('/ProductBrand/Update',[ProductBrandController::class,'Update'])->middleware('adminAuth');
Route::post('/ProductBrand/Delete',[ProductBrandController::class,'Delete'])->middleware('adminAuth');

//Product Featured
Route::get('/ProductFeatured',[ProductFeaturedController::class,'Page'])->middleware('adminAuth');
Route::post('/ProductFeatured/Insert',[ProductFeaturedController::class,'Insert'])->middleware('adminAuth');
Route::get('/ProductFeatured/Read',[ProductFeaturedController::class,'Read'])->middleware('adminAuth');
Route::post('/ProductFeatured/ReadSingle',[ProductFeaturedController::class,'ReadSingle'])->middleware('adminAuth');
Route::post('/ProductFeatured/Update',[ProductFeaturedController::class,'Update'])->middleware('adminAuth');
Route::post('/ProductFeatured/Delete',[ProductFeaturedController::class,'Delete'])->middleware('adminAuth');

//Product List
Route::get('/ProductList',[ProductListController::class,'Page'])->middleware('adminAuth')->middleware('adminAuth');
Route::post('/ProductList/Insert',[ProductListController::class,'Insert'])->middleware('adminAuth');
Route::get('/ProductList/Read',[ProductListController::class,'Read']);
Route::get('/ProductList/ProductListName',[ProductListController::class,'ProductListName']);
Route::post('/ProductList/ReadSingle',[ProductListController::class,'ReadSingle'])->middleware('adminAuth');
Route::post('/ProductList/Update',[ProductListController::class,'Update'])->middleware('adminAuth');
Route::post('/ProductList/Delete',[ProductListController::class,'Delete'])->middleware('adminAuth');

//Product Stock
Route::get('/ProductStock',[ProductStockController::class,'Page'])->middleware('adminAuth')->middleware('adminAuth');
Route::post('/ProductStock/Insert',[ProductStockController::class,'Insert'])->middleware('adminAuth');
Route::get('/ProductStock/Read',[ProductStockController::class,'Read']);
Route::post('/ProductStock/ReadSingle',[ProductStockController::class,'ReadSingle'])->middleware('adminAuth');
Route::post('/ProductStock/Delete',[ProductStockController::class,'StockDelete'])->middleware('adminAuth');

//Product Stock History
Route::get('/ProductStockHistory',[ProductStockController::class,'HistoryPage'])->middleware('adminAuth')->middleware('adminAuth');
Route::post('/ProductStockHistory/Insert',[ProductStockController::class,'Insert'])->middleware('adminAuth');
Route::get('/ProductStockHistory/Read',[ProductStockController::class,'StockHistoryRead']);
Route::post('/ProductStockHistory/ReadSingle',[ProductStockController::class,'ReadSingle'])->middleware('adminAuth');
Route::post('/ProductStockHistory/Delete',[ProductStockController::class,'StockHistoryDelete'])->middleware('adminAuth');

//Product Details
Route::get('/ProductDetails',[ProductDetailsController::class,'Page'])->middleware('adminAuth')->middleware('adminAuth');
Route::post('/ProductDetails/Insert',[ProductDetailsController::class,'Insert'])->middleware('adminAuth');
Route::get('/ProductDetails/Read',[ProductDetailsController::class,'Read']);
Route::post('/ProductDetails/ReadSingle',[ProductDetailsController::class,'ReadSingle'])->middleware('adminAuth');
Route::post('/ProductDetails/Update',[ProductDetailsController::class,'Update'])->middleware('adminAuth');
Route::post('/ProductDetails/Delete',[ProductDetailsController::class,'Delete'])->middleware('adminAuth');

//Product Specification
Route::get('/ProductSpecification',[ProductSpecificationController::class,'Page'])->middleware('adminAuth')->middleware('adminAuth');
Route::get('/ProductSpecificationList',[ProductSpecificationController::class,'ListPage'])->middleware('adminAuth')->middleware('adminAuth');
Route::post('/ProductSpecification/Insert',[ProductSpecificationController::class,'Insert'])->middleware('adminAuth');
Route::get('/ProductSpecification/Read',[ProductSpecificationController::class,'Read']);
Route::post('/ProductSpecification/ReadSingle',[ProductSpecificationController::class,'ReadSingle'])->middleware('adminAuth');
Route::post('/ProductSpecification/Update',[ProductSpecificationController::class,'Update'])->middleware('adminAuth');
Route::post('/ProductSpecification/Delete',[ProductSpecificationController::class,'Delete'])->middleware('adminAuth');



//Product Specification By ID
Route::get('/ProductSpecification/{id}',[ProductSpecificationController::class,'ListPage']);


//Site Info
Route::get('/SiteInfo',[SiteInfoController::class,'Page'])->middleware('adminAuth');
Route::post('/SiteInfo/Insert',[SiteInfoController::class,'Insert'])->middleware('adminAuth');
Route::get('/SiteInfo/Read',[SiteInfoController::class,'Read']);
Route::post('/SiteInfo/ReadSingle',[SiteInfoController::class,'ReadSingle'])->middleware('adminAuth');
Route::post('/SiteInfo/Update',[SiteInfoController::class,'Update'])->middleware('adminAuth');
Route::post('/SiteInfo/Delete',[SiteInfoController::class,'Delete'])->middleware('adminAuth');

//Gallery
Route::get('/Gallery',[GalleryController::class,'Page'])->middleware('adminAuth');
Route::post('/Gallery/Insert',[GalleryController::class,'Insert'])->middleware('adminAuth');
Route::get('/Gallery/Read',[GalleryController::class,'Read']);
Route::post('/Gallery/ReadSingle',[GalleryController::class,'ReadSingle'])->middleware('adminAuth');
Route::post('/Gallery/Update',[GalleryController::class,'Update'])->middleware('adminAuth');
Route::post('/Gallery/Delete',[GalleryController::class,'Delete'])->middleware('adminAuth');

//Testimonial
Route::get('/Testimonial',[TestimonialController::class,'Page'])->middleware('adminAuth')->middleware('adminAuth');
Route::post('/Testimonial/Insert',[TestimonialController::class,'Insert'])->middleware('adminAuth');
Route::get('/Testimonial/Read',[TestimonialController::class,'Read'])->middleware('adminAuth');
Route::post('/Testimonial/ReadSingle',[TestimonialController::class,'ReadSingle'])->middleware('adminAuth');
Route::post('/Testimonial/Update',[TestimonialController::class,'Update'])->middleware('adminAuth');
Route::post('/Testimonial/Delete',[TestimonialController::class,'Delete'])->middleware('adminAuth');

//Services
Route::get('/Services',[ServicesController::class,'Page'])->middleware('adminAuth')->middleware('adminAuth');
Route::post('/Services/Insert',[ServicesController::class,'Insert'])->middleware('adminAuth');
Route::get('/Services/Read',[ServicesController::class,'Read']);
Route::post('/Services/ReadSingle',[ServicesController::class,'ReadSingle'])->middleware('adminAuth');
Route::post('/Services/Update',[ServicesController::class,'Update'])->middleware('adminAuth');
Route::post('/Services/Delete',[ServicesController::class,'Delete'])->middleware('adminAuth');

//Contact Request
Route::get('/ContactRequest',[ContactRequestController::class,'Page'])->middleware('adminAuth');
Route::get('/ContactRequest/Read',[ContactRequestController::class,'Read'])->middleware('adminAuth');
Route::post('/ContactRequest/Delete',[ContactRequestController::class,'Delete'])->middleware('adminAuth');

//Service Request
Route::get('/ServiceRequest',[ServiceRequestController::class,'Page'])->middleware('adminAuth');
Route::get('/ServiceRequest/Read',[ServiceRequestController::class,'Read'])->middleware('adminAuth');
Route::Post('/ServiceRequest/ReadSingle',[ServiceRequestController::class,'ReadSingle'])->middleware('adminAuth');
Route::post('/ServiceRequest/Delete',[ServiceRequestController::class,'Delete'])->middleware('adminAuth');
Route::post('/ServiceRequest/UpdateStatus',[ServiceRequestController::class,'UpdateStatus'])->middleware('adminAuth');


//Visitors
Route::get('/Visitors',[VisitorsController::class,'Page'])->middleware('adminAuth')->middleware('adminAuth');
Route::get('/Visitors/Read',[VisitorsController::class,'Read']);

//Settings
Route::get('/Settings',[SettingsController::class,'Page'])->middleware('adminAuth');
Route::post('/Settings/Insert',[SettingsController::class,'Insert'])->middleware('adminAuth');
Route::get('/Settings/Read',[SettingsController::class,'Read'])->middleware('adminAuth');
Route::post('/Settings/ReadSingle',[SettingsController::class,'ReadSingle'])->middleware('adminAuth');
Route::post('/Settings/Update',[SettingsController::class,'Update'])->middleware('adminAuth');
Route::post('/Settings/Delete',[SettingsController::class,'Delete'])->middleware('adminAuth');

//Blogs
Route::get('/Blogs',[BlogListController::class,'Page'])->middleware('adminAuth');
Route::post('/Blogs/Insert',[BlogListController::class,'Insert']);
Route::get('/Blogs/Read',[BlogListController::class,'Read']);
Route::post('/Blogs/ReadSingle',[BlogListController::class,'ReadSingle']);
Route::post('/Blogs/Update',[BlogListController::class,'Update']);
Route::post('/Blogs/Delete',[BlogListController::class,'Delete']);

//Car Model
Route::get('/CarModel',[CarModelController::class,'Page'])->middleware('adminAuth');
Route::post('/CarModel/Insert',[CarModelController::class,'Insert']);
Route::get('/CarModel/Read',[CarModelController::class,'Read']);
Route::post('/CarModel/ReadSingle',[CarModelController::class,'ReadSingle']);
Route::post('/CarModel/Update',[CarModelController::class,'Update']);
Route::post('/CarModel/Delete',[CarModelController::class,'Delete']);

//Car Brand
Route::get('/CarBrand',[CarBrandController::class,'Page'])->middleware('adminAuth');
Route::post('/CarBrand/Insert',[CarBrandController::class,'Insert']);
Route::get('/CarBrand/Read',[CarBrandController::class,'Read']);
Route::post('/CarBrand/ReadSingle',[CarBrandController::class,'ReadSingle']);
Route::post('/CarBrand/Update',[CarBrandController::class,'Update']);
Route::post('/CarBrand/Delete',[CarBrandController::class,'Delete']);

//Car Brand
Route::get('/OrderRequest',[InvoiceController::class,'Page'])->middleware('adminAuth');
Route::post('/OrderRequest/Insert',[InvoiceController::class,'Insert']);
Route::get('/OrderRequest/Read',[InvoiceController::class,'Read']);
Route::post('/OrderRequest/ReadSingle',[InvoiceController::class,'ReadSingle']);
Route::post('/OrderRequest/GetInvoice',[InvoiceController::class,'GetInvoice']);
Route::post('/OrderRequest/GetInvoiceData',[InvoiceController::class,'GetInvoiceData']);
Route::get('/OrderRequest/Print/{invoiceNo}',[InvoiceController::class,'GetInvoice']);
Route::post('/OrderRequest/UpdateOrderStatus',[InvoiceController::class,'UpdateOrderStatus']);
Route::post('/OrderRequest/Delete',[InvoiceController::class,'Delete']);

//Details Coupon
Route::get('/DetailsCoupon',[DetailsCouponController::class,'Page'])->middleware('adminAuth');
Route::post('/DetailsCoupon/Insert',[DetailsCouponController::class,'Insert']);
Route::get('/DetailsCoupon/Read',[DetailsCouponController::class,'Read']);
Route::post('/DetailsCoupon/ReadSingle',[DetailsCouponController::class,'ReadSingle']);
Route::post('/DetailsCoupon/Update',[DetailsCouponController::class,'Update']);
Route::post('/DetailsCoupon/Delete',[DetailsCouponController::class,'Delete']);

//Notification
Route::get('/Notification',[NotificationController::class,'Page'])->middleware('adminAuth');
Route::post('/Notification/Insert',[NotificationController::class,'Insert']);
Route::get('/Notification/Read',[NotificationController::class,'Read']);
Route::post('/Notification/Delete',[NotificationController::class,'Delete']);

//OTP
Route::get('/OTP',[OTPController::class,'Page'])->middleware('adminAuth');
Route::get('/OTP/Read',[OTPController::class,'Read']);

//Blog Comments
Route::get('/BlogComments',[BlogCommentsController::class,'Page'])->middleware('adminAuth');
Route::get('/BlogComments/Read',[BlogCommentsController::class,'Read']);

//SSL Payment
Route::get('/SSLPayment',[SSLPaymentController::class,'Page'])->middleware('adminAuth');
Route::get('/SSLPayment/Read',[SSLPaymentController::class,'Read']);
Route::post('/SSLPayment/ReadSingle',[SSLPaymentController::class,'ReadSingle']);



//User Profile
Route::get('/UserProfile',[UserProfileControlller::class,'Page'])->middleware('adminAuth');
Route::get('/UserProfile/Read',[UserProfileControlller::class,'Read']);
Route::post('/UserProfile/ReadSingle',[UserProfileControlller::class,'ReadSingle']);


