<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Database\Factories\ProductFactory;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/usedpages')->group(function(){
    Route::get('addcustomer',function(){return view('/usedpages/addcustomer');});
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

Route::prefix('/usedpages')->group(function(){
    Route::post('addcustomer',[CustomerController::class,'store'])->name('addcustomer');
    Route::post('addproduct',[ProductController::class,'store'])->name('addproduct');
    Route::post('createorder',[OrderController::class,'store'])->name('createorder');   
});