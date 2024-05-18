<?php

use App\Http\Livewire\Admin\AdminAddCouponComponent;
use App\Http\Livewire\Admin\AdminAddCtegoryComponent;
use App\Http\Livewire\Admin\AdminAddHomeSliderComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdmindeOrdersDetailsComponent;
use App\Http\Livewire\Admin\AdminEditCouponComponent;
use App\Http\Livewire\Admin\AdminEditHomeSliderComponent;
use App\Http\Livewire\Admin\AdminHomeCategoryComponent;
use App\Http\Livewire\Admin\AdminHomeSliderComponent;
use App\Http\Livewire\Admin\AdminOrderCompent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;
use App\Http\Livewire\Admin\AdminUpdateCategoryComponent;
use App\Http\Livewire\Admin\AdminUpdateProductComponent;
use App\Http\Livewire\CartComp;
use App\Http\Livewire\CheckoutComp;
use App\Http\Livewire\DetailComponent;
use App\Http\Livewire\shopComp;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\ContactUs;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\User\UserOrderCompent;
use App\Http\Livewire\User\UserOrderDetailsCompent;
use App\Http\Livewire\WishlistComponent;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class)->name('home');
Route::get('/shop', shopComp::class)->name('shop') ;
Route::get('/cart', CartComp::class)->name('product.cart') ;
Route::get('/checkout', CheckoutComp::class)->name('product.checkout') ;
Route::get('/product/{slug}', DetailComponent::class)->name('product.details') ;
Route::get('/product-category/{category_slug}', CategoryComponent::class)->name('product.category') ;
Route::get('/search', SearchComponent::class)->name('product.search') ;
Route::get('/wishlist', WishlistComponent::class)->name('product.wishlist') ;
Route::get('/thanyou', ThankyouComponent::class)->name('thankyou') ;
Route::get('/contactUs', ContactUs::class)->name('ContactUs') ;

//for  user :
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
    Route::get('user/orders',UserOrderCompent::class)->name('user.order');
    Route::get('user/orders/Details/{order_id}',UserOrderDetailsCompent::class)->name('user.orderDetails');
});

//For Admin
Route::middleware(['auth:sanctum', 'verified','authAdmin'])->group(function(){
    Route::get('Admin/dashboard',AdminDashboardComponent::class)->name('Admin.dashboard');
    Route::get('Admin/Categories',AdminCategoryComponent::class)->name('Admin.category');
    Route::get('Admin/Category/Add',AdminAddCtegoryComponent::class)->name('Admin.Addcategory');
    Route::get('Admin/Category/update/{category_slug}',AdminUpdateCategoryComponent::class)->name('Admin.Updatecategory');
    Route::get('Admin/Product',AdminProductComponent::class)->name('Admin.Product');
    Route::get('Admin/Product/Add',AdminAddProductComponent::class)->name('Admin.AddProduct');
    Route::get('Admin/Product/Update/{product_slug}',AdminUpdateProductComponent::class)->name('Admin.UpdateProduct');
    Route::get('Admin/Home-Categories',AdminHomeCategoryComponent::class)->name('Admin.Homecategory');
    Route::get('Admin/Sale',AdminSaleComponent::class)->name('Admin.Sale');
    Route::get('Admin/coupons',AdminCouponsComponent::class)->name('Admin.Coupons');
    Route::get('Admin/coupon/Add',AdminAddCouponComponent::class)->name('Admin.AddCoupon');
    Route::get('Admin/coupon/Edit/{coupon_id}',AdminEditCouponComponent::class)->name('Admin.EditCoupon');
    Route::get('Admin/orders',AdminOrderCompent::class)->name('Admin.order');
    Route::get('Admin/orders/Details/{order_id}',AdmindeOrdersDetailsComponent::class)->name('Admin.orderDetails');
    Route::get('Admin/Slider',AdminHomeSliderComponent::class)->name('Admin.homeslider');
    Route::get('Admin/Slider/Add',AdminAddHomeSliderComponent::class)->name('Admin.Addhomeslider');
    Route::get('Admin/Slider/Add/{slide_id}',AdminEditHomeSliderComponent::class)->name('Admin.Edithomeslider');
});
