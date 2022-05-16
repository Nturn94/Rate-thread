<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageUploadController;

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



//For adding an image
Route::get('/add-image',[ImageUploadController::class,'addImage'])->name('images.add');

//For storing an image
Route::post('/store-image',[ImageUploadController::class,'storeImage'])
->name('images.store');

//For storing an image
Route::post('/store-comment',[ImageUploadController::class,'storeComment'])
->name('comments.store');

//For storing an image
Route::delete('/delete',[ImageUploadController::class,'DeleteComment'])
->name('comments.delete');

//For storing an image
Route::delete('/delete_image',[ImageUploadController::class,'DeleteImage'])
->name('images.delete');


//For showing an image
Route::get('/',[ImageUploadController::class,'viewImage'])->name('images.view');
