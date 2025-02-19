<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/usedpages')->group(function(){
    Route::get('addcustomer',function(){return view('/usedpages/addcustomer');});
    Route::get('addproduct',function(){return view('/usedpages/addproduct');});
    Route::get('createorder',function(){return view('/usedpages/createorder');});
    Route::get('viewcustomers',function(){return view('/usedpages/viewcustomers');});
    Route::get('vieworders',function(){return view('/usedpages/vieworders');});
    Route::get('viewproducts',function(){return view('/usedpages/viewproducts');});
});