<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;
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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


route::get('/redirect', [HomeController::class, 'redirect']);

route::get('/', [HomeController::class, 'index']);

route::get('/aboutus', [HomeController::class, 'aboutus']);

route::get('/ourproducts', [HomeController::class, 'ourproducts']);

route::get('/contactus', [HomeController::class, 'contactus']);

route::get('/product', [AdminController::class, 'product']);

route::post('/uploadproduct', [AdminController::class, 'uploadproduct']);

route::get('/viewproduct', [AdminController::class, 'viewproduct']);

route::get('/deleteproduct/{id}', [AdminController::class, 'deleteproduct']);

route::get('/editproduct/{id}', [AdminController::class, 'editproduct']);

route::post('/updateproduct/{id}', [AdminController::class, 'updateproduct']);

route::get('/searchproduct', [HomeController::class, 'searchproduct']);

route::post('/addcart/{id}', [HomeController::class, 'addcart']);

route::get('/showcart', [HomeController::class, 'showcart']);

route::get('/deletecart/{id}', [HomeController::class, 'deletecart']);

route::post('/confirmorder', [HomeController::class, 'confirmorder']);

route::get('/showorders', [AdminController::class, 'showorders']);

route::get('/approveorderstatus/{id}', [AdminController::class, 'approveorderstatus']);

route::get('/unapproveorderstatus/{id}', [AdminController::class, 'unapproveorderstatus']);