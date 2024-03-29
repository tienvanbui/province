<?php

use Illuminate\Support\Facades\Route;
use TienVanBui\Province\Http\Controllers\GetAllProvinceJapanController;

Route::group(['prefix' => 'api'] , function () {
    Route::get('/japan-provinces', [GetAllProvinceJapanController::class, 'allProvinces'])->name('japan-provinces.all');
    Route::get('/japan-provinces-paginate', [GetAllProvinceJapanController::class, 'paginateProvinces'])->name('japan-provinces.paginate');
    Route::get('/japan-provinces/{id}', [GetAllProvinceJapanController::class, 'getProvinceById'])->name('japan-provinces.find-by-id');
});

