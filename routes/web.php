<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TestominalController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Frontend\HomeBlogController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\CashController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Backend\ShippingAreaController;
use App\Http\Controllers\Backend\AdminUserController;








/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', function () {
    return view('admin.index');
})->middleware(['auth:admin', 'verified'])->name('admin.index');

require __DIR__.'/adminauth.php';


/// all admins routes
Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/logout','destroy')->name('admin.logout');
});
// admin profile route
Route::controller(AdminProfileController::class)->group(function(){
    Route::get('/admin/profile','profile')->name('admin.profile');
    Route::get('/admin/profile/edit','editprofile')->name('admin.editprofile');
    Route::post('/admin/profile/store','profile_store')->name('admin.profile_store');
    Route::get('/admin/profile/changePassword','change_Password')->name('admin.change_Password');
    Route::post('/update/change/password','update_pass')->name('update.change_Password');
});
// Admin User Role Routes
Route::prefix('adminuserrole')->group(function(){

    Route::get('/all', [AdminUserController::class, 'AllAdminRole'])->name('all.admin.user');
    Route::get('/add', [AdminUserController::class, 'AddAdmin'])->name('add.admin');
    Route::post('/store', [AdminUserController::class, 'StoreAdminRole'])->name('admin.user.store');
    Route::get('/edit/{id}', [AdminUserController::class, 'EditAdminRole'])->name('edit.admin.user');
    Route::post('/update', [AdminUserController::class, 'UpdateAdminRole'])->name('admin.user.update');
    Route::get('/delete/{id}', [AdminUserController::class, 'DeleteAdminRole'])->name('delete.admin.user');




    });

/// All Brand Route
Route::prefix('brand')->group(function(){
    Route::get('/view', [BrandController::class, 'BrandView'])->name('all.brand');
    Route::post('/store', [BrandController::class, 'brandstore'])->name('brand.store');
    Route::get('/edit/{id}', [BrandController::class, 'brandedit'])->name('brand.edit');
    Route::post('/update', [BrandController::class, 'brandupdate'])->name('brand.update');
    Route::get('/delete/{id}', [BrandController::class, 'branddelete'])->name('brand.delete');

});
/// All Category Route
Route::prefix('category')->group(function(){
    Route::get('/view', [CategoryController::class, 'categoryView'])->name('all.category');
    Route::post('/store', [CategoryController::class, 'categorystore'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'categoryedit'])->name('category.edit');
    Route::post('/update', [CategoryController::class, 'categoryupdate'])->name('category.update');
    Route::get('/delete/{id}', [CategoryController::class, 'categorydelete'])->name('category.delete');

});
/// All SubCategory Route
Route::prefix('subcategory')->group(function(){
    Route::get('/view', [SubCategoryController::class, 'subcategoryView'])->name('all.subcategory');
    Route::post('/store', [SubCategoryController::class, 'subcategorystore'])->name('subcategory.store');
    Route::get('/edit/{id}', [SubCategoryController::class, 'subcategoryedit'])->name('subcategory.edit');
    Route::post('/update', [SubCategoryController::class, 'subcategoryupdate'])->name('subcategory.update');
    Route::get('/delete/{id}', [SubCategoryController::class, 'subcategorydelete'])->name('subcategory.delete');
    Route::get('/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);

});

/// All Product Route
Route::prefix('product')->group(function(){
    Route::get('/view', [ProductController::class, 'productView'])->name('all.product');
    Route::get('/add', [ProductController::class, 'productadd'])->name('add-product');
    Route::post('/store', [ProductController::class, 'productstore'])->name('product-store');
    Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');
    Route::post('/data/update', [ProductController::class, 'ProductDataUpdate'])->name('product-update');
    Route::post('/image/update', [ProductController::class, 'MultiImageUpdate'])->name('update-product-image');
    Route::post('/thambnail/update', [ProductController::class, 'ThambnailImageUpdate'])->name('update-product-thambnail');
    Route::get('/multiimg/delete/{id}', [ProductController::class, 'MultiImageDelete'])->name('product.multiimg.delete');
    Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
    Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
    Route::get('/delete/{id}', [ProductController::class, 'productdelete'])->name('product.delete');
    Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage-product');

});

// Admin Slider All Routes

Route::prefix('slider')->group(function(){
    Route::get('/view', [SliderController::class, 'SliderView'])->name('manage-slider');
    Route::post('/store', [SliderController::class, 'SliderStore'])->name('slider.store');
    Route::get('/edit/{id}', [SliderController::class, 'SliderEdit'])->name('slider.edit');
    Route::post('/update', [SliderController::class, 'SliderUpdate'])->name('slider.update');
    Route::get('/delete/{id}', [SliderController::class, 'SliderDelete'])->name('slider.delete');
    Route::get('/inactive/{id}', [SliderController::class, 'SliderInactive'])->name('slider.inactive');
    Route::get('/active/{id}', [SliderController::class, 'SliderActive'])->name('slider.active');

    });
    // Admin Testominal All Routes

Route::prefix('testominal')->group(function(){

    Route::get('/view', [TestominalController::class, 'TestominalView'])->name('manage-testominal');
    Route::post('/store', [TestominalController::class, 'TestominalStore'])->name('testominal.store');
    Route::get('/edit/{id}', [TestominalController::class, 'TestominalEdit'])->name('testominal.edit');
    Route::post('/update', [TestominalController::class, 'TestominalUpdate'])->name('testominal.update');
    Route::get('/delete/{id}', [TestominalController::class, 'TestominalDelete'])->name('testominal.delete');



    });



/// All Users Route
Route::get('/',[IndexController::class,'index']);
Route::get('/user/logout',[IndexController::class,'UserLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');
Route::get('/user/change/password', [IndexController::class, 'UserChangePassword'])->name('change.password');
Route::post('/user/password/update', [IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');


//// Frontend All Routes /////
/// Multi Language All Routes ////

Route::get('/language/arabic', [LanguageController::class, 'arabic'])->name('arabic.language');
Route::get('/language/english', [LanguageController::class, 'English'])->name('english.language');


// Frontend Product Details Page url
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails'])->name('product.details');
Route::get('/product/tag/{tag}', [IndexController::class, 'TagWiseProduct']);
Route::get('/subcategory/product/{subcat_id}/{slug}', [IndexController::class, 'SubCatWiseProduct']);
// Product View Modal with Ajax
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);


Route::group(['prefix'=>'user','middleware' => ['user','auth'],'namespace'=>'User'],function(){
/// All Cart Route
Route::post('/addcart', [CartController::class, 'addcart'])->name('addcart');
Route::get('/mycart', [CartController::class, 'cartList'])->name('mycart');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
});
// Add to Wishlist
   // wishlist
   Route::group(['prefix' => 'wishlist'], function () {
    Route::get('/', [WishlistController::class, 'Wishlist'])->name('wishlist');
    Route::post('delete', [WishlistController::class, 'delete'])->name('wishlist.delete');
    Route::post('/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');

});
// Admin Reports Routes
Route::prefix('reports')->group(function(){

    Route::get('/view', [ReportController::class, 'ReportView'])->name('all-reports');
    Route::post('/search/by/date', [ReportController::class, 'ReportByDate'])->name('search-by-date');
    Route::post('/search/by/month', [ReportController::class, 'ReportByMonth'])->name('search-by-month');
    Route::post('/search/by/year', [ReportController::class, 'ReportByYear'])->name('search-by-year');


    });

    // Admin Get All User Routes
Route::prefix('alluser')->group(function(){

    Route::get('/view', [AdminProfileController::class, 'AllUsers'])->name('all-users');
    });
// Admin Blogs Routes
Route::prefix('blog')->group(function(){

    Route::get('/category', [BlogController::class, 'BlogCategory'])->name('blog.category');
    Route::post('/store', [BlogController::class, 'BlogCategoryStore'])->name('blogcategory.store');
    Route::get('/category/edit/{id}', [BlogController::class,'BlogCategoryEdit'])->name('blog.category.edit');
    Route::post('/update', [BlogController::class, 'BlogCategoryUpdate'])->name('blogcategory.update');
    Route::get('/category/delete/{id}', [BlogController::class, 'BlogCategoryDelete'])->name('BlogCategoryDelete.delete');
    // Admin View Blog Post Routes
    Route::get('/list/post', [BlogController::class, 'ListBlogPost'])->name('list.post');
    Route::get('/add/post', [BlogController::class, 'AddBlogPost'])->name('add.post');
    Route::post('/post/store', [BlogController::class, 'BlogPostStore'])->name('post-store');
    Route::get('/delete/{id}', [BlogController::class, 'BlogPostDelete'])->name('blogpost.delete');



    });

    Route::get('/blog', [HomeBlogController::class, 'AddBlogPost'])->name('home.blog');
    Route::get('/post/details/{id}', [HomeBlogController::class, 'DetailsBlogPost'])->name('post.details');
    Route::get('/blog/category/post/{category_id}', [HomeBlogController::class, 'HomeBlogCatPost']);


// Admin Site Setting Routes
Route::prefix('setting')->group(function(){

    Route::get('/site', [SiteSettingController::class, 'SiteSetting'])->name('site.setting');
    Route::post('/site/update', [SiteSettingController::class, 'SiteSettingUpdate'])->name('update.sitesetting');
    Route::get('/seo', [SiteSettingController::class, 'SeoSetting'])->name('seo.setting');
    Route::post('/seo/update', [SiteSettingController::class, 'SeoSettingUpdate'])->name('update.seosetting');


});
/// review frontend

// Admin Manage Review Routes
Route::prefix('review')->group(function(){
    Route::post('/store', [ReviewController::class, 'ReviewStore'])->name('review.store');
    Route::get('/pending', [ReviewController::class, 'PendingReview'])->name('pending.review');
    Route::get('/admin/approve/{id}', [ReviewController::class, 'ReviewApprove'])->name('review.approve');
    Route::get('/publish', [ReviewController::class, 'PublishReview'])->name('publish.review');
    Route::get('/delete/{id}', [ReviewController::class, 'DeleteReview'])->name('delete.review');
    });
    /// Product Search Route
Route::post('/search', [IndexController::class, 'ProductSearch'])->name('product.search');
Route::post('search-product', [IndexController::class, 'SearchProduct']);

// Shop Page Route
Route::get('/shop', [ShopController::class, 'ShopPage'])->name('shop.page');
Route::post('/shop/filter', [ShopController::class, 'ShopFilter'])->name('shop.filter');


// Admin Coupons All Routes

Route::prefix('coupons')->group(function(){

    Route::get('/view', [CouponController::class, 'CouponView'])->name('manage-coupon');
    Route::post('/store', [CouponController::class, 'CouponStore'])->name('coupon.store');
Route::get('/edit/{id}', [CouponController::class, 'CouponEdit'])->name('coupon.edit');
Route::post('/update/{id}', [CouponController::class, 'CouponUpdate'])->name('coupon.update');
Route::get('/delete/{id}', [CouponController::class, 'CouponDelete'])->name('coupon.delete');



    });
    // Admin Shipping All Routes

Route::prefix('shipping')->group(function(){

// division State
    Route::get('/division/view', [ShippingAreaController::class, 'DivisionView'])->name('manage-division');
    Route::post('/division/store', [ShippingAreaController::class, 'DivisionStore'])->name('division.store');
    Route::get('/division/edit/{id}', [ShippingAreaController::class, 'DivisionEdit'])->name('division.edit');
    Route::post('/division/update/{id}', [ShippingAreaController::class, 'DivisionUpdate'])->name('division.update');
    Route::get('/division/delete/{id}', [ShippingAreaController::class, 'DivisionDelete'])->name('division.delete');
    Route::get('/district/view', [ShippingAreaController::class, 'DistrictView'])->name('manage-district');

// District State
Route::post('/district/store', [ShippingAreaController::class, 'DistrictStore'])->name('district.store');
Route::get('/district/edit/{id}', [ShippingAreaController::class, 'DistrictEdit'])->name('district.edit');
Route::post('/district/update/{id}', [ShippingAreaController::class, 'DistrictUpdate'])->name('district.update');
Route::get('/district/delete/{id}', [ShippingAreaController::class, 'DistrictDelete'])->name('district.delete');

// Ship State
Route::get('/state/view', [ShippingAreaController::class, 'StateView'])->name('manage-state');

Route::post('/state/store', [ShippingAreaController::class, 'StateStore'])->name('state.store');

Route::get('/state/edit/{id}', [ShippingAreaController::class, 'StateEdit'])->name('state.edit');

Route::post('/state/update/{id}', [ShippingAreaController::class, 'StateUpdate'])->name('state.update');

Route::get('/state/delete/{id}', [ShippingAreaController::class, 'StateDelete'])->name('state.delete');



    });

    // Frontend Coupon Option

Route::post('/coupon-apply', [CartController::class, 'CouponApply']);
Route::get('/coupon-calculation', [CartController::class, 'CouponCalculation']);
Route::get('/coupon-remove', [CartController::class, 'CouponRemove']);


 // Checkout Routes
 Route::group(['prefix'=>'user','middleware' => ['user','auth'],'namespace'=>'User'],function(){

 Route::get('/checkout', [CartController::class, 'CheckoutCreate'])->name('checkout');
 });
 // Wishlist page
 Route::group(['prefix'=>'user','middleware' => ['user','auth'],'namespace'=>'User'],function(){

    // Wishlist page
    Route::get('/wishlist', [WishlistController::class, 'showWishlist'])->name('wishlist');
    Route::get('/get-wishlist-product', [WishlistController::class, 'GetWishlistProduct']);
    Route::post('/cash/order', [CashController::class, 'CashOrder'])->name('cash.order');
    Route::get('/order_details/{order_id}', [AllUserController::class, 'OrderDetails']);
    Route::get('/my/orders', [AllUserController::class, 'MyOrders'])->name('my.orders');
    Route::get('/invoice_download/{order_id}', [AllUserController::class, 'InvoiceDownload']);
});


Route::get('/district-get/ajax/{division_id}', [CheckoutController::class, 'DistrictGetAjax']);
Route::get('/state-get/ajax/{district_id}', [CheckoutController::class, 'StateGetAjax']);
Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');


/// admin orders view
Route::prefix('orders')->group(function(){
Route::get('/pending/orders', [OrderController::class, 'PendingOrders'])->name('pending-orders');
Route::get('/pending/orders/details/{order_id}', [OrderController::class, 'PendingOrdersDetails'])->name('pending.order.details');  Route::get('/confirmed/orders', [OrderController::class, 'ConfirmedOrders'])->name('confirmed-orders');
Route::get('/processing/orders', [OrderController::class, 'ProcessingOrders'])->name('processing-orders');
Route::get('/picked/orders', [OrderController::class, 'PickedOrders'])->name('picked-orders');
Route::get('/shipped/orders', [OrderController::class, 'ShippedOrders'])->name('shipped-orders');
Route::get('/delivered/orders', [OrderController::class, 'DeliveredOrders'])->name('delivered-orders');
Route::get('/cancel/orders', [OrderController::class, 'CancelOrders'])->name('cancel-orders');
Route::get('/pending/confirm/{order_id}', [OrderController::class, 'PendingToConfirm'])->name('pending-confirm');
Route::get('/confirm/processing/{order_id}', [OrderController::class, 'ConfirmToProcessing'])->name('confirm.processing');
Route::get('/processing/picked/{order_id}', [OrderController::class, 'ProcessingToPicked'])->name('processing.picked');
Route::get('/picked/shipped/{order_id}', [OrderController::class, 'PickedToShipped'])->name('picked.shipped');
Route::get('/shipped/delivered/{order_id}', [OrderController::class, 'ShippedToDelivered'])->name('shipped.delivered');
Route::get('/invoice/download/{order_id}', [OrderController::class, 'AdminInvoiceDownload'])->name('invoice.download');
Route::post('/return', [OrderController::class, 'returndata'])->name('return.data');


    });
    Route::prefix('stock')->group(function(){

        Route::get('/product', [ProductController::class, 'ProductStock'])->name('product.stock');


        });
// Payment Route thawani
Route::get('/success-thawani-pay', [CheckoutController::class, 'success'])->name('success');
Route::get('/cancel-thawani-pay', [CheckoutController::class, 'cancel'])->name('cancel');

