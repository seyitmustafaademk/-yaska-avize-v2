<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
use App\Http\Controllers\API\Products_Controller;

#DELETE ------
Route::post('/product/delete/', [Products_Controller::class, 'DeleteProduct']);
Route::post('/product-detail/delete/', [Products_Controller::class, 'DeleteProductDetail']);
Route::post('/product-media/delete/', [Products_Controller::class, 'DeleteProductMedia']);



