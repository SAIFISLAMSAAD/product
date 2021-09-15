<?php

use App\Http\Controllers\editorcontroller;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\subcategorycontroller;

use App\Http\Controllers\profilecontroller;
use App\Http\Controllers\productcontroller;
use App\Models\subcategory;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about',[App\Http\Controllers\frontendcontroller::class, 'jalal']);
Route::get('/welcome',[App\Http\Controllers\frontendcontroller::class, 'welcome']);

//category

Route::get('/addcategory',[App\Http\Controllers\categorycontroller::class, 'index']);
Route::POST('/category/insert',[App\Http\Controllers\categorycontroller::class, 'insert']);
Route::get('/category/delete/{category_id}',[App\Http\Controllers\categorycontroller::class, 'delete']);

//subcategory
Route::get('/subcategory',[subcategorycontroller::class, 'index']);
Route::post('/subcategory/insert',[subcategorycontroller::class, 'insert']);
Route::get('/subcategory/delete/{subcategory_id}',[subcategorycontroller::class, 'delete']);
Route::get('/subcategory/edit/{subcategory_id}',[subcategorycontroller::class, 'edit']);
Route::POST('/subcategory/update',[subcategorycontroller::class, 'update']);
Route::get('/subcategory/restore/{deleted_subcategory_id}',[subcategorycontroller::class, 'restore']);
Route::get('/subcategory/perdelete/{deleted_subcategory_id}',[subcategorycontroller::class, 'perdelete']);
Route::post('/subcategory/markdel/',[subcategorycontroller::class, 'markdel']);
// Route::post('/subcategory/trashmarkdel/',[subcategorycontroller::class, 'trashmarkdel']);

//marked delete/ restore

Route::post('subcategory/marked_category_delete',[subcategorycontroller::class, 'marked_category_delete']);
Route::post('subcategory/delete_restore_item',[subcategorycontroller::class, 'delete_restore_item']);


//profile

Route::get('profile/edit',[profilecontroller::class, 'profileedit']);
Route::post('profile/namechange',[profilecontroller::class, 'namechange']);
Route::post('profile/passchange',[profilecontroller::class, 'passchange']);
Route::post('profile/photochange',[profilecontroller::class, 'photochange']);

//product
Route::get('/product',[productcontroller::class, 'index']);
Route::POST('/product/insert',[productcontroller::class, 'insert']);


