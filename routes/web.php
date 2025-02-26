<?php

use App\Http\Controllers\AutoComplete;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Database\Factories\ProductFactory;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/usedpages')->group(function(){
    Route::get('addcustomer',[AutoComplete::class,'autoComplete']);
    Route::get('addproduct',function(){return view('/usedpages/addproduct');});
    Route::get('createorder',function(){return view('/usedpages/createorder');});
    Route::get('viewcustomers',[CustomerController::class,'index'])->name('viewcustomers');
    Route::get('vieworders',[OrderController::class,'index'])->name('vieworders');
    Route::get('viewproducts',[ProductController::class,'index'])->name('viewproducts');
});

Route::prefix('/usedpages')->group(function(){
    Route::get('viewcustomers/{customer_id}/editcustomer',[CustomerController::class,'edit'])->name('editcustomer');
    Route::get('viewproducts/{product_id}/editproduct',[ProductController::class,'edit'])->name('editproduct');
    Route::get('vieworders/{order_id}/editorder',[OrderController::class,'edit'])->name('editorder');
});

Route::prefix('/usedpages')->group(function(){
    Route::delete('viewcustomers/{customer_id}',[CustomerController::class,'destroy'])->name('deletecustomer');
    Route::delete('viewproducts/{product_id}',[ProductController::class,'destroy'])->name('deleteproduct');
    Route::delete('vieworder/{order_id}',[OrderController::class,'destroy'])->name('deleteorder');
});

Route::get('/usedpages/createorder',[OrderController::class,'create'])->name('createorder');   

Route::prefix('/usedpages')->group(function(){
    Route::post('addcustomer',[CustomerController::class,'store'])->name('addcustomer');
    Route::post('addproduct',[ProductController::class,'store'])->name('addproduct');
    Route::post('createorder',[OrderController::class,'store'])->name('orderstore');   
});

Route::prefix('/usedpages')->group(function(){
    Route::put('/viewcustomers/{customer_id}',[CustomerController::class,'update'])->name('updatecustomer');
    Route::put('/viewproducts/{product_id}',[ProductController::class,'update'])->name('updateproduct');
    Route::put('/vieworders/{order_id}',[OrderController::class,'update'])->name('updateorder');
});

Route::get('/usedpages/dashboard', [DashboardController::class, 'viewAllStats']);

Route::get('/searchcustomers',[CustomerController::class,'search'])->name('searchCustomers');
Route::get('/searchproducts',[ProductController::class,'search'])->name('searchProducts');
Route::get('/searchorders',[OrderController::class,'search'])->name('searchOrders');