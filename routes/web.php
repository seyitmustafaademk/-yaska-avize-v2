<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Http\Controllers\Dashboard\Homepage_Controller;
use App\Http\Controllers\Dashboard\Contact_Controller;
use App\Http\Controllers\Dashboard\Product\Products_Controller;
use App\Http\Controllers\Dashboard\Product\AddProduct_Controller;
use App\Http\Controllers\Dashboard\Product\AddProductDetail_Controller;
use App\Http\Controllers\Dashboard\Product\Category_Controller;
use App\Http\Controllers\Dashboard\Orders_Controller;
use App\Http\Controllers\Dashboard\EditPages\EditHomepage_Controller;
use App\Http\Controllers\Dashboard\EditPages\EditAboutUs_Controller;
use App\Http\Controllers\Dashboard\EditPages\EditSpecial_Controller;
use App\Http\Controllers\Dashboard\Blog\AddContent_Controller;
use App\Http\Controllers\Dashboard\Blog\EditContent_Controller;
use App\Http\Controllers\Dashboard\Blog\Category_Controller as BlogCategory_Controller;
use App\Http\Controllers\Dashboard\Blog\BlogList_Controller;
use App\Http\Controllers\Dashboard\Product\ProductDetails_Controller;
use App\Http\Controllers\Dashboard\Product\Color_Controller;
use App\Http\Controllers\Dashboard\Gallery_Controller;
use App\Http\Controllers\Dashboard\EditPages\EditShop_Controller;

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [Homepage_Controller::class, 'ShowPage'])->name('admin.homepage');

    Route::get('/gallery', [Gallery_Controller::class, 'ShowPage'])->name('admin.gallery');
    Route::post('/gallery', [Gallery_Controller::class, 'AddGalleryItem']);
    Route::get('/gallery/{id}', [Gallery_Controller::class, 'DeleteGalleryItem'])->name('admin.gallery-delete');

    Route::get('/contact', [Contact_Controller::class, 'ShowPage'])->name('admin.contact');
    Route::put('/contact', [Contact_Controller::class, 'UpdateRead']);
    Route::delete('/contact', [Contact_Controller::class, 'Delete']);

    Route::get('/categories', [Category_Controller::class, 'ShowPage'])->name('admin.product.categories'); // Kategori Listeleme
    Route::put('/categories', [Category_Controller::class, 'InsertCategory'])->name('admin.product.add-category'); // Kategori Ekleme
    Route::delete('/categories', [Category_Controller::class, 'DeleteCategory'])->name('admin.product.delete-category'); // Kategori Silme

    Route::get('/product-colors', [Color_Controller::class, 'ShowPage'])->name('admin.product.colors'); // Color Listeleme
    Route::put('/product-colors', [Color_Controller::class, 'InsertColor'])->name('admin.product.add-color'); // Color Ekleme
    Route::delete('/product-colors', [Color_Controller::class, 'DeleteColor'])->name('admin.product.delete-color'); // Color Silme


    Route::get('/products', [Products_Controller::class, 'ShowPage'])->name('admin.products'); // Ürünler listesi
    Route::get('/add-product', [AddProduct_Controller::class, 'ShowPage'])->name('admin.add-product'); // ürün ekleme sayfası
    Route::post('/add-product', [AddProduct_Controller::class, 'AddProduct'])->name('admin.add-product-post'); // ürün ekleme
    Route::get('/delete-product/{id}', [Products_Controller::class, 'DeleteProduct'])->name('admin.delete-product'); // ürün silme
    Route::post('/update-product/', [Products_Controller::class, 'UpdateProduct'])->name('admin.update-product'); // ürün listesi ürün güncelleme
    Route::get('/update-full-product/{id}', [Products_Controller::class, 'UpdateFullProductPage'])->whereNumber('id', )->name('admin.full-product-update'); // ürün güncelleme sayfası
    Route::post('/update-full-product', [Products_Controller::class, 'UpdateFullProduct'])->name('admin.update-full-product'); // ürün güncelleme sayfası ürün güncelleme


    Route::get('/product-detail/{id}', [ProductDetails_Controller::class, 'ShowPage'])->name('admin.product-detail'); // Ürün detay listesi
    Route::get('/delete-product-detail/{pid}/{id}', [ProductDetails_Controller::class, 'DeleteProductDetail'])->name('admin.delete-product-detail'); // ürün detay silme
    Route::post('/product-detail-update/', [ProductDetails_Controller::class, 'ProductDetailUpdate'])->name('admin.product-detail-update-inline'); // Ürün detay listesi

    Route::get('/update-product-detail', [AddProductDetail_Controller::class, 'UpdatePage'])->name('admin.update-product-detail');
    Route::post('/update-product-detail', [AddProductDetail_Controller::class, 'UpdateProductDetail'])->name('admin.update-product-detail-post');





    // Ürün Detay Ekleme
    Route::get('/add-product-detail/{pid?}', [AddProductDetail_Controller::class, 'ShowPage'])->name('admin.add-product-detail');
    Route::post('/add-product-detail', [AddProductDetail_Controller::class, 'AddDetail']);

    Route::get('/orders', [Orders_Controller::class, 'ShowPage'])->name('admin.orders');
    Route::get('/order-detail/{order_id?}', [Orders_Controller::class, 'ShowDetail'])->name('admin.order-detail');

    // SAYFA DÜZENLEMELERİ

    #region Homepage
    Route::get('/edit-pages/homepage/section-1', [EditHomepage_Controller::class, 'ShowSection1'])->name('edit-pages.homepage.section1');
    Route::post('/edit-pages/homepage/section-1', [EditHomepage_Controller::class, 'EditSection1']);

    Route::get('/edit-pages/homepage/section-2', [EditHomepage_Controller::class, 'ShowSection2'])->name('edit-pages.homepage.section2');
    Route::post('/edit-pages/homepage/section-2', [EditHomepage_Controller::class, 'EditSection2']);

    Route::get('/edit-pages/homepage/section-3', [EditHomepage_Controller::class, 'ShowSection3'])->name('edit-pages.homepage.section3');
    Route::post('/edit-pages/homepage/section-3', [EditHomepage_Controller::class, 'EditSection3']);
    Route::get('/edit-pages/homepage/section-3/delete/{id}', [EditHomepage_Controller::class, 'DeleteSection3'])->name('delete.edit-page.section3');

    Route::get('/edit-pages/homepage/section-4', [EditHomepage_Controller::class, 'ShowSection4'])->name('edit-pages.homepage.section4');
    Route::post('/edit-pages/homepage/section-4', [EditHomepage_Controller::class, 'EditSection4']);
    Route::get('/edit-pages/homepage/section-4/delete/{id}', [EditHomepage_Controller::class, 'DeleteSection4'])->name('delete.edit-page.section4');

    Route::get('/edit-pages/homepage/section-5', [EditHomepage_Controller::class, 'ShowSection5'])->name('edit-pages.homepage.section5');
    Route::post('/edit-pages/homepage/section-5', [EditHomepage_Controller::class, 'EditSection5']);

    Route::get('/edit-pages/homepage/section-6', [EditHomepage_Controller::class, 'ShowSection6'])->name('edit-pages.homepage.section6');
    Route::post('/edit-pages/homepage/section-6', [EditHomepage_Controller::class, 'EditSection6']);
    Route::get('/edit-pages/homepage/section-6/delete/{id}', [EditHomepage_Controller::class, 'DeleteSection6'])->name('delete.edit-page.homepage.section6');

    Route::get('/edit-pages/homepage/section-7', [EditHomepage_Controller::class, 'ShowSection7'])->name('edit-pages.homepage.section7');
    Route::post('/edit-pages/homepage/section-7', [EditHomepage_Controller::class, 'EditSection7']);

    Route::get('/edit-pages/homepage/section-8', [EditHomepage_Controller::class, 'ShowSection8'])->name('edit-pages.homepage.section8');
    Route::post('/edit-pages/homepage/section-8', [EditHomepage_Controller::class, 'EditSection8']);
    Route::get('/edit-pages/homepage/section-8/delete/{id}', [EditHomepage_Controller::class, 'DeleteSection8'])->name('delete.edit-page.section8');

    Route::get('/edit-pages/homepage/section-9', [EditHomepage_Controller::class, 'ShowSection9'])->name('edit-pages.homepage.section9');
    Route::post('/edit-pages/homepage/section-9', [EditHomepage_Controller::class, 'EditSection9']);
    Route::get('/edit-pages/homepage/section-9/delete/{id}', [EditHomepage_Controller::class, 'DeleteSection9'])->name('delete.edit-page.homepage.section9');
    #endregion

    #region AboutUs
    Route::get('/edit-pages/about-us/section-1', [EditAboutUs_Controller::class, 'ShowSection1'])->name('edit-pages.about-us.section1');
    Route::post('/edit-pages/about-us/section-1', [EditAboutUs_Controller::class, 'EditSection1']);
    Route::get('/edit-pages/about-us/section-1/delete/{id}', [EditAboutUs_Controller::class, 'DeleteSection1'])->name('delete.edit-page.about-us.section1');

    Route::get('/edit-pages/edit-about-us-content/{id}', [EditAboutUs_Controller::class, 'ShowEdit'])->name('admin.edit-page.about-us.edit-content');
    Route::post('/edit-pages/edit-about-us-content', [EditAboutUs_Controller::class, 'EditContent'])->name('admin.edit-page.about-us.edit-content-post');

    Route::get('/edit-pages/about-us/section-2', [EditAboutUs_Controller::class, 'ShowSection2'])->name('edit-pages.about-us.section2');
    Route::post('/edit-pages/about-us/section-2', [EditAboutUs_Controller::class, 'EditSection2']);
    #endregion

    #region Services
    //    Route::get('/edit-pages/services/section-1', [EditSpecial_Controller::class, 'ShowSection1'])->name('edit-pages.services.section1');
    //    Route::post('/edit-pages/services/section-1', [EditSpecial_Controller::class, 'EditSection1']);
    //    Route::get('/edit-pages/services/section-1/delete/{id}', [EditSpecial_Controller::class, 'DeleteSection1'])->name('delete.edit-page.services.section1');

    Route::get('/edit-pages/services/section-1', [EditSpecial_Controller::class, 'ShowSection1'])->name('edit-pages.services.section1');
    Route::post('/edit-pages/services/section-1', [EditSpecial_Controller::class, 'EditSection1']);

    Route::get('/edit-pages/services/section-2', [EditSpecial_Controller::class, 'ShowSection2'])->name('edit-pages.services.section2');
    Route::post('/edit-pages/services/section-2', [EditSpecial_Controller::class, 'EditSection2']);

    Route::get('/edit-pages/services/section-3', [EditSpecial_Controller::class, 'ShowSection3'])->name('edit-pages.services.section3');
    Route::post('/edit-pages/services/section-3', [EditSpecial_Controller::class, 'EditSection3']);

    Route::get('/edit-pages/services/section-4', [EditSpecial_Controller::class, 'ShowSection4'])->name('edit-pages.services.section4');
    Route::post('/edit-pages/services/section-4', [EditSpecial_Controller::class, 'EditSection4']);

    Route::get('/edit-pages/services/section-5', [EditSpecial_Controller::class, 'ShowSection5'])->name('edit-pages.services.section5');
    Route::post('/edit-pages/services/section-5', [EditSpecial_Controller::class, 'EditSection5']);
    Route::get('/edit-pages/services/section-5/delete/{id}', [EditSpecial_Controller::class, 'DeleteSection5'])->name('delete.edit-page.services.section5');

    Route::get('/edit-pages/services/section-6', [EditSpecial_Controller::class, 'ShowSection6'])->name('edit-pages.services.section6');
    Route::post('/edit-pages/services/section-6', [EditSpecial_Controller::class, 'EditSection6']);
    Route::get('/edit-pages/services/section-6/delete/{id}', [EditSpecial_Controller::class, 'DeleteSection6'])->name('delete.edit-page.services.section6');
    #endregion

    #region Blog
    Route::get('/blog/list', [BlogList_Controller::class, 'ShowPage'])->name('admin.blog.list');
    Route::get('/blog/delete-content/{id}', [BlogList_Controller::class, 'DeleteContent'])->name('admin.blog.delete-content');

    Route::get('/blog/edit-content/{id}', [EditContent_Controller::class, 'ShowEdit'])->name('admin.blog.edit-content');
    Route::post('/blog/edit-content/', [EditContent_Controller::class, 'EditContent'])->name('admin.blog.edit-content-post');

    Route::get('/blog/add-content/{id?}', [AddContent_Controller::class, 'ShowPage'])->name('admin.blog.add-content');
    Route::post('/blog/add-content', [AddContent_Controller::class, 'InsertPost']);
    Route::post('/blog/image-upload', [AddContent_Controller::class, 'ImageUpload'])->name('admin.blog.image-upload');

    Route::get('/blog/categories', [BlogCategory_Controller::class, 'ShowPage'])->name('admin.blog.categories');
    Route::post('/blog/categories/add', [BlogCategory_Controller::class, 'Insert'])->name('admin.blog.add-category');
    Route::post('/blog/categories/delete', [BlogCategory_Controller::class, 'Delete'])->name('admin.blog.delete-category');

    Route::get('/edit-pages/shop/section1', [EditShop_Controller::class, 'ShowPage'])->name('admin.edit-pages.shop.section-1');
    Route::post('/edit-pages/shop/section1', [EditShop_Controller::class, 'Insert']);

    Route::get('/edit-pages/about-us/section3', [EditAboutUs_Controller::class, 'ShowSection3'])->name('admin.edit-pages.about-us.section-3');
    Route::post('/edit-pages/about-us/section3', [EditAboutUs_Controller::class, 'EditSection3']);
    Route::get('/edit-pages/about-us/section3-delete/{id}', [EditAboutUs_Controller::class, 'DeleteSection3'])->name('admin.edit-pages.about-us.section-3-delete');
    #endregion
});



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
#region FRONT-END ROUTES
use App\Http\Controllers\Front\Homepage_Controller as Homepage_FController;
use App\Http\Controllers\Front\AboutUs_Controller as AboutUs_FController;
use App\Http\Controllers\Front\Contact_Controller as Contact_FController;
use App\Http\Controllers\Front\Blog_Controller as Blog_FController;
use App\Http\Controllers\Front\BlogDetail_Controller as BlogDetail_FController;
use App\Http\Controllers\Front\Shop_Controller as Shop_FController;
use App\Http\Controllers\Front\ProductDetail_Controller as ProductDetail_FController;
use App\Http\Controllers\Front\Special_Controller as Special_FController;

use App\Http\Controllers\Front\Cart_Controller as Cart_FController;
use App\Http\Controllers\Front\Payment\FirstStep_Controller as FirstStep_FController;
use App\Http\Controllers\Front\Payment\SecondStep_Controller as SecondStep_FController;
use App\Http\Controllers\Front\Payment\ThirdStep_Controller as ThirdStep_FController;
use App\Http\Controllers\Front\Payment\FourthStep_Controller as FourthStep_FController;

use App\Http\Controllers\Front\Gallery_Controller as Gallery_FController;

Route::prefix('/')->group(function () {
    Route::get('/', [Homepage_FController::class, 'ShowPage'])->name('front.homepage');
    Route::get('/uber-uns/{tab_panel?}', [AboutUs_FController::class, 'ShowPage'])->name('front.about-us');

    Route::get('/kontakt/{slug?}', [Contact_FController::class, 'ShowPage'])->name('front.contact');

    Route::post('/kontakt', [Contact_FController::class, 'InsertContact']);
    Route::get('/services', [Special_FController::class, 'ShowPage'])->name('front.special');

    Route::get('/stories', [Blog_FController::class, 'ShowPage'])->name('front.blog');
    Route::get('/stories/category/{category}', [Blog_FController::class, 'ShowCategory'])->name('front.show-category');
    Route::get('/blog-detail/{slug}', [BlogDetail_FController::class, 'ShowPage'])->name('front.blog-detail');

    #region Sepet Sistemi
    Route::post('/get-popup-data', [Cart_FController::class, 'GetPopupData'])->name('cart.get-popup-data');
    Route::match(['get', 'post'], '/set-cart/{pd_id?}', [Cart_FController::class, 'SetCartItem'])->name('cart.set-cart');
    Route::get('/decrease-item/{id}', [Cart_FController::class, 'DecreaseCart'])->name('cart.decrease-item');
    Route::get('/delete-item/{id}', [Cart_FController::class, 'DeleteCart'])->name('cart.delete-item');
//    Route::post('/add-product/', [Cart_FController::class, 'GetProductDetail'])->name('get-product-detail');
    #endregion

    Route::get('/produkte/{category?}', [Shop_FController::class, 'ShowPage'])->name('front.shop');
    Route::get('/produktdetail/{slug?}', [ProductDetail_FController::class, 'ShowPage'])->name('front.product-detail');
    Route::post('/produktdetail/{pid}/{pdid}', [ProductDetail_FController::class, 'GetImages']);

    // Sepet verilerini alınıp iletişim verilerinin kontrol edildiği sayfa
    Route::get('/basket', [FirstStep_FController::class, 'ShowPage'])->name('front.payment.first-step');
    Route::match(['get', 'post'], '/kargo-Adresse', [SecondStep_FController::class, 'ShowPage'])->name('front.payment.second-step');

    // Kredi kartı bilgilerinin alındığı ve önceki sayfadan gelen iletişim bilgilerinin aktarıldığı sayfa
    Route::post('/credit-card', [ThirdStep_FController::class, 'ShowPage'])->name('front.payment.third-step');

    // Ödeme Kontrol ve teşekkür/hata sayfası
    Route::get('/danke', [FourthStep_FController::class, 'ShowPage'])->name('front.payment.fourth-step');
    Route::post('/danke', [FourthStep_FController::class, 'Payment'])->name('payment.post');
    Route::post('/3ds-callback', [FourthStep_FController::class, 'Callback3DS'])->name('callback-3ds');

    // Gallery Sayfası
    Route::get('/gallerie', [Gallery_FController::class, 'ShowPage'])->name('front.gallery');
});
#endregion

use Illuminate\Support\Facades\Artisan;

Route::get('/migrate', function () {
    return Artisan::call('migrate');
});
Route::get('/migrate-reset', function () {
    return Artisan::call('migrate:reset');
});
Route::get('/db-seed', function () {
    return Artisan::call('db:seed');
});

Route::get('reset-app', function () {
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
});
