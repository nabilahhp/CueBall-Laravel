<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.index')->middleware(['auth','admin']);
Route::get('category', [AdminController::class, 'category'])-> middleware(['auth','admin']);
Route::post('addcategory', [AdminController::class, 'addcategory'])-> middleware(['auth','admin']);
Route::get('deletecategory/{id}', [AdminController::class, 'deletecategory'])-> middleware(['auth','admin']);
Route::get('editcategory/{id}', [AdminController::class, 'editcategory'])-> middleware(['auth','admin']);
Route::post('updatecategory/{id}', [AdminController::class, 'updatecategory'])-> middleware(['auth','admin']);

Route::get('product', [AdminController::class, 'product'])-> middleware(['auth','admin']);
Route::get('addproduct', [AdminController::class, 'addproduct'])-> middleware(['auth','admin']);
Route::post('uploadproduct', [AdminController::class, 'uploadproduct'])-> middleware(['auth','admin']);
Route::get('deleteproduct/{id}', [AdminController::class, 'deleteproduct'])-> middleware(['auth','admin']);
Route::get('editproduct/{id}', [AdminController::class, 'editproduct'])-> middleware(['auth','admin']);
Route::post('updateproduct/{id}', [AdminController::class, 'updateproduct'])-> middleware(['auth','admin']);

Route::get('table', [AdminController::class, 'table'])-> middleware(['auth','admin']);
Route::get('addtable', [AdminController::class, 'addtable'])-> middleware(['auth','admin']);
Route::post('uploadtable', [AdminController::class, 'uploadtable'])-> middleware(['auth','admin']);
Route::get('edittable/{id}', [AdminController::class, 'edittable'])-> middleware(['auth','admin']);
Route::post('updatetable/{id}', [AdminController::class, 'updatetable'])-> middleware(['auth','admin']);
Route::get('deletetable/{id}', [AdminController::class, 'deletetable'])-> middleware(['auth','admin']);

Route::get('user', [AdminController::class, 'user'])-> middleware(['auth','admin']);
Route::get('edituser/{id}', [AdminController::class, 'edituser'])-> middleware(['auth','admin']);
Route::post('updateuser/{id}', [AdminController::class, 'updateuser'])-> middleware(['auth','admin']);
Route::get('deleteuser/{id}', [AdminController::class, 'deleteuser'])-> middleware(['auth','admin']);

Route::get('customer', [AdminController::class, 'customer'])-> middleware(['auth','admin']);
Route::get('editcustomer/{id}', [AdminController::class, 'editcustomer'])-> middleware(['auth','admin']);
Route::post('updatecustomer/{id}', [AdminController::class, 'updatecustomer'])-> middleware(['auth','admin']);
Route::get('deletecustomer/{id}', [AdminController::class, 'deletecustomer'])-> middleware(['auth','admin']);

Route::get('orderproduct', [AdminController::class, 'orderproduct'])-> middleware(['auth','admin']);
Route::get('addorderproduct', [AdminController::class, 'addorderproduct'])-> middleware(['auth','admin']);
Route::post('uploadorderproduct', [AdminController::class, 'uploadorderproduct'])-> middleware(['auth','admin']);
Route::get('editorderproduct/{id}', [AdminController::class, 'editorderproduct'])-> middleware(['auth','admin']);
Route::post('updateorderproduct/{id}', [AdminController::class, 'updateorderproduct'])-> middleware(['auth','admin']);
Route::get('deleteorderproduct/{id}', [AdminController::class, 'deleteorderproduct'])-> middleware(['auth','admin']);

Route::get('booking', [AdminController::class, 'booking'])-> middleware(['auth','admin']);
Route::get('addbooking', [AdminController::class, 'addbooking'])-> middleware(['auth','admin']);
Route::post('uploadbooking', [AdminController::class, 'uploadbooking'])-> middleware(['auth','admin']);
Route::get('editbooking/{id}', [AdminController::class, 'editbooking'])-> middleware(['auth','admin']);
Route::get('editjamsewa/{id}', [AdminController::class, 'editjamsewa'])-> middleware(['auth','admin']);
Route::post('updatebooking/{id}', [AdminController::class, 'updatebooking'])-> middleware(['auth','admin']);
Route::post('updatejamsewa/{id}', [AdminController::class, 'updatejamsewa'])-> middleware(['auth','admin']);
Route::get('deletebooking/{id}', [AdminController::class, 'deletebooking'])-> middleware(['auth','admin']);
Route::get('deletejamsewa/{id}', [AdminController::class, 'deletejamsewa'])-> middleware(['auth','admin']);

Route::get('bayar', [AdminController::class, 'bayar'])-> middleware(['auth','admin']);
Route::get('editbayar/{id}', [AdminController::class, 'editbayar'])-> middleware(['auth','admin']);
Route::post('updatebayar/{id}', [AdminController::class, 'updatebayar'])-> middleware(['auth','admin']);
Route::get('deletebayar/{id}', [AdminController::class, 'deletebayar'])-> middleware(['auth','admin']);

Route::get('bayarmkn', [AdminController::class, 'bayarmkn'])-> middleware(['auth','admin']);
Route::get('editbayarmkn/{id}', [AdminController::class, 'editbayarmkn'])-> middleware(['auth','admin']);
Route::post('updatebayarmkn/{id}', [AdminController::class, 'updatebayarmkn'])-> middleware(['auth','admin']);
Route::get('deletebayarmkn/{id}', [AdminController::class, 'deletebayarmkn'])-> middleware(['auth','admin']);

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('income', [AdminController::class, 'income'])-> middleware(['auth','admin']);
Route::get('addincome', [AdminController::class, 'addincome'])-> middleware(['auth','admin']);
Route::post('uploadincome', [AdminController::class, 'uploadincome'])-> middleware(['auth','admin']);
Route::get('editincome/{id}', [AdminController::class, 'editincome'])-> middleware(['auth','admin']);
Route::post('updateincome/{id}', [AdminController::class, 'updateincome'])-> middleware(['auth','admin']);
Route::get('deleteincome/{id}', [AdminController::class, 'deleteincome'])-> middleware(['auth','admin']);

Route::get('expenses', [AdminController::class, 'expenses'])-> middleware(['auth','admin']);
Route::get('addexpenses', [AdminController::class, 'addexpenses'])-> middleware(['auth','admin']);
Route::post('uploadexpenses', [AdminController::class, 'uploadexpenses'])-> middleware(['auth','admin']);
Route::get('editexpenses/{id}', [AdminController::class, 'editexpenses'])-> middleware(['auth','admin']);
Route::post('updateexpenses/{id}', [AdminController::class, 'updateexpenses'])-> middleware(['auth','admin']);
Route::get('deleteexpenses/{id}', [AdminController::class, 'deleteexpenses'])-> middleware(['auth','admin']);