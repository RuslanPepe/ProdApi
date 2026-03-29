<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ParseController;

Route::group(['namespace' => 'Api'], function () {
    Route::get('/sales', [ParseController::class, 'parseSales'])->name('api.sales');
    Route::get('/incomes', [ParseController::class, 'parseIncomes'])->name('api.incomes');
    Route::get('/orders', [ParseController::class, 'parseOrders'])->name('api.orders');
    Route::get('/stocks', [ParseController::class, 'parseStocks'])->name('api.stocks');
});
