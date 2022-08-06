<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\layoutProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\NewsController;

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

Route::get('/index', [layoutProductController::class, 'index']);
//form
Route::get('/select-delivery-home', [layoutProductController::class, 'select_delivery_home']);
Route::get('/calculate-fee', [layoutProductController::class, 'calculate_fee']);
Route::get('/del-fee', [layoutProductController::class, 'del_fee']);
Route::get('/form', [layoutProductController::class, 'form']);
Route::post('/confirm-order', [layoutProductController::class, 'confirm_order']);

//cart
Route::get('/addCart/{id}', [AccountController::class, 'cart']);
Route::get('/delete/{id}', [AccountController::class, 'DeleteItemCart']);
Route::get('/list', [AccountController::class, 'ListCart']);
Route::get('/delete-cart/{id}', [AccountController::class, 'DeleteListItemCart']);
Route::get('/save-cart/{id}/{quanty}', [AccountController::class, 'SaveListItemCart']);

//signup
Route::get('/login', [layoutProductController::class, 'login']);
Route::post('/checkLogin', [AccountController::class, 'checkLogin']);
//admin
Route::get('/admin', [AdminController::class, 'admin']);

//delivery
Route::get('/delivery', [DeliveryController::class, 'delivery']);
Route::post('/select-delivery', [DeliveryController::class, 'select_delivery']);
Route::post('/insert-delivery', [DeliveryController::class, 'insert_delivery']);
Route::post('/select-feeship', [DeliveryController::class, 'select_feeship']);
Route::post('/update-delivery', [DeliveryController::class, 'update_delivery']);

//checkout
Route::post('/confirm-order', [layoutProductController::class, 'confirm_order']);

//order
Route::get('/manage-order', [OrderController::class, 'manage_order']);
Route::get('/view-order/{order_code}', [OrderController::class, 'view_order']);

//news
Route::get('/index/news', [NewsController::class, 'index']);
Route::get('/create/news', [NewsController::class, 'create']);
Route::post('news/createPost', [NewsController::class, 'createPost']);
Route::get('news/update/{id}', [NewsController::class, 'update']);
Route::post('news/updatePost/{id}',[NewsController::class, 'updatePost']);
Route::get('news/delete/{id}',[NewsController::class, 'delete']);
