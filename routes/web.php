<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SubCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\User\AllUserController;
use App\Http\Controllers\User\CartPageController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\PaymentController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

// Admin Auth
Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
    Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');
});

Route::middleware(['auth:admin'])->group(function(){
    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard')->middleware('auth:admin');

    // Admin Profile
    Route::get('/admin/profile', [ProfileController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [ProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
});

// Admin Brands
Route::middleware(['auth:admin'])->prefix('brand')->group(function() { 
    Route::get('/view', [BrandController::class, 'BrandView'])->name('brand.view'); 
    Route::post('/store', [BrandController::class, 'BrandStore'])->name('brand.store'); 
    Route::get('/edit/{id}', [BrandController::class, 'BrandEdit'])->name('brand.edit'); 
    Route::post('/update', [BrandController::class, 'BrandUpdate'])->name('brand.update'); 
    Route::get('/delete/{id}', [BrandController::class, 'BrandDelete'])->name('brand.delete'); 
});

// Admin Categories
Route::middleware(['auth:admin'])->prefix('category')->group(function() { 
    Route::get('/view', [CategoryController::class, 'CategoryView'])->name('category.view'); 
    Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category.store'); 
    Route::get('/edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit'); 
    Route::post('/update', [CategoryController::class, 'CategoryUpdate'])->name('category.update'); 
    Route::get('/delete/{id}', [CategoryController::class, 'CategoryDelete'])->name('category.delete'); 

    // Sub Categories
    Route::get('/sub/view', [SubCategoryController::class, 'SubCategoryView'])->name('subcategory.view'); 
    Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store'); 
    Route::get('/sub/edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit'); 
    Route::post('/sub/update', [SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update'); 
    Route::get('/sub/delete/{id}', [SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete'); 
    Route::get('/subcategory/ajax/{category_id}', [SubCategoryController::class, 'GetSubCategory']);
}); 

// Admin Products
Route::middleware(['auth:admin'])->prefix('product')->group(function() { 
    Route::get('/add', [ProductController::class, 'AddProduct'])->name('add.product'); 
    Route::post('/store', [ProductController::class, 'ProductStore'])->name('product.store');
    Route::get('/manage', [ProductController::class, 'ManageProduct'])->name('manage.product');
    Route::get('/edit/{id}', [ProductController::class, 'EditProduct'])->name('product.edit');
    Route::post('/update', [ProductController::class, 'ProductUpdate'])->name('product.update');
    Route::post('/image/update', [ProductController::class, 'ProductImageUpdate'])->name('product.image.update');
    Route::post('/gallery/update', [ProductController::class, 'ProductGalleryUpdate'])->name('product.gallery.update');
    Route::get('/image/delete/{id}', [ProductController::class, 'ProductImageDelete'])->name('product.image.delete');
    Route::get('/delete/{id}', [ProductController::class, 'ProductDelete'])->name('product.delete');
    Route::get('/inactive/{id}', [ProductController::class, 'ProductInactive'])->name('product.inactive');
    Route::get('/active/{id}', [ProductController::class, 'ProductActive'])->name('product.active');
});

// User Auth
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $user = User::find($id);
    return view('dashboard', compact('user'));
})->name('dashboard');

// User Profile
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'UserProfileStore'])->name('user.profile.store');

// Frontend
Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/about', [IndexController::class, 'about'])->name('about');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');
Route::get('/faq', [IndexController::class, 'faq'])->name('faq');

// Product Details
Route::get('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);

// Product Modal Ajax
Route::get('/product/view/modal/{id}', [IndexController::class, 'ProductViewAjax']);

// Add to Cart
Route::post('/cart/data/store/{id}', [CartController::class, 'AddToCart']);
// Mini Cart
Route::get('/product/mini/cart/', [CartController::class, 'AddMiniCart']);
Route::get('/minicart/product-remove/{rowId}', [CartController::class, 'RemoveMiniCart']);

// User must Login
Route::group(['prefix'=>'user', 'middleware' => ['user','auth'], 'namespace'=>'User'], function(){
    Route::get('/mycart', [CartPageController::class, 'MyCart'])->name('mycart');
    Route::get('/get-cart-product', [CartPageController::class, 'GetCartProduct']);
    Route::get('/cart-remove/{rowId}', [CartPageController::class, 'RemoveCartProduct']);
    Route::get('/cart-increment/{rowId}', [CartPageController::class, 'CartIncrement']);
    Route::get('/cart-decrement/{rowId}', [CartPageController::class, 'CartDecrement']);
    
    Route::get('/checkout', [CheckoutController::class, 'CheckoutCreate'])->name('checkout');
    Route::get('/province', [CheckoutController::class, 'get_province'])->name('province');
    Route::get('/city/{id}', [CheckoutController::class, 'get_city'])->name('city');
    Route::get('/origin={city_origin}&destination={city_destination}&weight={weight}&courier={courier}', [CheckoutController::class, 'get_ongkir']);
    Route::post('/checkout/store', [CheckoutController::class, 'CheckoutStore'])->name('checkout.store');
    Route::post('/payment/cash', [PaymentController::class, 'PayCash'])->name('pay.cash');
    Route::post('/payment/manual', [PaymentController::class, 'PayManual'])->name('pay.manual');
    
    Route::get('/order-list', [AllUserController::class, 'OrderList'])->name('order-list');
    Route::get('/order_details/{order_id}', [AllUserController::class, 'OrderDetails']);
    Route::get('/invoice-p/{order_id}', [AllUserController::class, 'InvoiceP']);
});


// Admin Orders
Route::middleware(['auth:admin'])->prefix('orders')->group(function() { 
    Route::get('/all-transaction', [OrderController::class, 'AllTransaction'])->name('all.transaction');
    Route::get('/transaction/details/{order_id}', [OrderController::class, 'TransactionDetails'])->name('transaction.details');
    Route::post('/status/update', [OrderController::class, 'OrderStatusUpdate'])->name('order-status.update');
});